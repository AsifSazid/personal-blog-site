<?php

function companyName()
{
    return "SazUmme Technology";
}

function clientCompanyName()
{
    return "গাজী নাজমুল হোসেন";
}

if (!function_exists('banglaDate')) {
    function banglaDate($date)
    {
        $bn_numbers = ['0' => '০', '1' => '১', '2' => '২', '3' => '৩', '4' => '৪', '5' => '৫', '6' => '৬', '7' => '৭', '8' => '৮', '9' => '৯'];
        $bn_months = [
            'January' => 'জানুয়ারি',
            'February' => 'ফেব্রুয়ারি',
            'March' => 'মার্চ',
            'April' => 'এপ্রিল',
            'May' => 'মে',
            'June' => 'জুন',
            'July' => 'জুলাই',
            'August' => 'আগস্ট',
            'September' => 'সেপ্টেম্বর',
            'October' => 'অক্টোবর',
            'November' => 'নভেম্বর',
            'December' => 'ডিসেম্বর'
        ];

        $timestamp = strtotime($date);
        $day = strtr(date('d', $timestamp), $bn_numbers);
        $month = $bn_months[date('F', $timestamp)];
        $year = strtr(date('Y', $timestamp), $bn_numbers);

        return "{$day}শে {$month}, {$year}";
    }
}

if (!function_exists('shortContent')) {
    function shortContent($content, $limit = 80)
    {
        // HTML ট্যাগ রিমুভ
        $text = strip_tags($content);

        // শব্দগুলো explode করে array বানানো
        $words = preg_split('/\s+/', $text);

        // যদি শব্দের সংখ্যা লিমিটের চেয়ে বেশি হয়
        if (count($words) > $limit) {
            $words = array_slice($words, 0, $limit);
            $text = implode(' ', $words) . '...';
        } else {
            $text = implode(' ', $words);
        }

        return $text;
    }
}

if (!function_exists('readingTime')) {
    function readingTime($content)
    {
        // বাংলা সংখ্যার ম্যাপ
        $bn_numbers = ['0' => '০', '1' => '১', '2' => '২', '3' => '৩', '4' => '৪', '5' => '৫', '6' => '৬', '7' => '৭', '8' => '৮', '9' => '৯'];

        // শব্দ গণনা
        $word_count = str_word_count(strip_tags($content));

        // মিনিট হিসাব
        $minutes = ceil($word_count / 200); // প্রতি মিনিটে 200 শব্দ ধরে

        // বাংলায় সংখ্যা রূপান্তর
        $bn_minutes = strtr($minutes, $bn_numbers);

        return "{$bn_minutes} মিনিটে পড়া যাবে";
    }
}
