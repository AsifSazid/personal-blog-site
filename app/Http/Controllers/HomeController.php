<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\PracticeArea;
use App\Models\Tag;
use App\Models\PageHit;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function dashboard()
    {
        $totalBlogs = Blog::count();
        $totalTags = Tag::count();
        $totalCategories = Category::count();
        $totalPracticeAreas = PracticeArea::count();

        // ১. গত ৭ দিনের তারিখগুলোর একটি অ্যারে তৈরি (Native PHP/Laravel style)
        $labels = [];
        $rawDays = [];
        for ($i = 6; $i >= 0; $i--) {
            // subDays ব্যবহার করা হয়েছে যা কার্বন ছাড়াও কাজ করবে কারণ now() একটি কার্বন অবজেক্ট রিটার্ন করে
            $date = now()->setTimezone('Asia/Dhaka')->subDays($i);
            $labels[] = $date->format('d M'); // গ্রাফের লেবেলের জন্য (১৭ Dec)
            $rawDays[] = $date->format('Y-m-d'); // ডাটাবেজ থেকে চেক করার জন্য
        }

        // ২. ডাটাবেজ থেকে গত ৭ দিনের হিট ডাটা আনা
        $hitData = PageHit::where('visit_day', '>=', $rawDays[0])
            ->selectRaw('visit_day, COUNT(*) as count')
            ->groupBy('visit_day')
            ->pluck('count', 'visit_day');

        // ৩. প্রতিটি দিনের জন্য কাউন্ট সেট করা (ডাটা না থাকলে ০ বসবে)
        $counts = [];
        foreach ($rawDays as $day) {
            $counts[] = $hitData[$day] ?? 0;
        }

        return view('dashboard', compact(
            'totalBlogs',
            'totalTags',
            'totalCategories',
            'totalPracticeAreas',
            'labels',
            'counts'
        ));
    }

    public function index()
    {
        $now = now()->setTimezone('Asia/Dhaka');
        $p_areas = PracticeArea::where('showing_at', '1')->get();
        $blogs = Blog::orderBy('created_at', 'desc')->limit(3)->get();
        $todaysVisit = $this->visitorLog($now);
        return view('welcome', compact('p_areas', 'blogs'));
    }

    private function visitorLog($now)
    {
        $ip = request()->ip();
        $visitDay = $now->toDateString(); // '2025-07-10'
        $userAgent = request()->userAgent();
        $visitFrom = request()->query('from', 'direct');

        // Device detection
        $device = $userAgent; // fallback
        if (class_exists(Agent::class)) {
            $agent = new Agent();
            $device = $agent->device() . ' - ' . $agent->platform() . ' - ' . $agent->browser();
        }

        // Check for existing visitor with same IP, same day, same browser
        $exists = PageHit::where('ip_address', $ip)
            ->where('visit_day', $visitDay)
            ->where('browser', $userAgent)
            ->exists();

        if (!$exists) {
            $country = null;
            $city = null;
            $lat = null;
            $lon = null;

            try {
                $response = Http::get("http://ip-api.com/json/{$ip}");
                if ($response->ok()) {
                    $country = $response['country'];
                    $city = $response['city'];
                    $lat = $response['lat'];
                    $lon = $response['lon'];
                }
            } catch (\Exception $e) {
                // Fail silently
            }

            PageHit::create([
                'uuid' => (string) \Str::uuid(),
                'ip_address' => $ip,
                'visit_date' => $now,
                'visit_day' => $visitDay,
                'country' => ($city && $country) ? "{$city}, {$country}" : ($city ?? $country),
                'browser' => $userAgent,
                'visit_from' => $visitFrom,
                'device' => $device,
                'latitude' => $lat,
                'longitude' => $lon,
            ]);
        }

        $todayVisits = PageHit::where('visit_day', $visitDay)->count();

        return $todayVisits;
    }

    public function blogs(Request $request)
    {
        $uuid = $request->query('uuid');
        $offset = $request->query('offset', 0); // কোথা থেকে ডাটা শুরু হবে
        $limit = $offset == 0 ? 12 : 6; // প্রথমে ১২টি, পরে ৬টি করে

        $query = Blog::where('status', '1')
            ->when($uuid, function ($q) use ($uuid) {
                return $q->where('practice_uuid', $uuid);
            })
            ->with('practiceArea') // Eager loading
            ->orderBy('created_at', 'desc');

        $blogs = $query->skip($offset)->take($limit)->get();
        $totalBlogs = $query->count();

        // যদি AJAX রিকোয়েস্ট হয়, শুধু HTML পার্ট টুকু রিটার্ন করবো
        if ($request->ajax()) {
            return response()->json([
                'html' => view('frontend.partials.blog_list', compact('blogs'))->render(),
                'hasMore' => ($offset + $limit) < $totalBlogs
            ]);
        }

        return view('blogs', compact('blogs', 'totalBlogs'));
    }
}
