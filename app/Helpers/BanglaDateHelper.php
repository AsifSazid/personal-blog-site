<?php

namespace App\Helpers;

class BanglaDateHelper
{
    // ইংরেজি মাসের নাম থেকে বাংলা মাসের নাম
    private static $bnMonths = [
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
        'December' => 'ডিসেম্বর',
    ];

    // ইংরেজি দিনের নাম থেকে বাংলা দিনের নাম
    private static $bnDays = [
        'Saturday' => 'শনিবার',
        'Sunday' => 'রবিবার',
        'Monday' => 'সোমবার',
        'Tuesday' => 'মঙ্গলবার',
        'Wednesday' => 'বুধবার',
        'Thursday' => 'বৃহস্পতিবার',
        'Friday' => 'শুক্রবার',
    ];

    // ইংরেজি সংখ্যা থেকে বাংলা সংখ্যা
    private static $bnDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

    /**
     * ইংরেজি তারিখকে বাংলা তারিখে রূপান্তর
     *
     * @param string|\DateTime $date
     * @param bool $showTime
     * @param bool $showDay
     * @return string
     */
    public static function toBanglaDate($date, $showTime = false, $showDay = false): string
    {
        if (is_string($date)) {
            $date = new \DateTime($date, new \DateTimeZone('UTC'));
        }

        $date->setTimezone(new \DateTimeZone('Asia/Dhaka'));

        // ইংরেজি তারিখ পুনরুদ্ধার
        $enMonth = $date->format('F');
        $enDayName = $date->format('l');
        $enDay = $date->format('d');
        $enYear = $date->format('Y');
        $enHour = $date->format('h');
        $enMinute = $date->format('i');
        $enSecond = $date->format('s');
        $ampm = $date->format('A') == 'AM' ? 'সকাল' : 'বিকাল';

        // বাংলায় রূপান্তর
        $bnMonth = self::$bnMonths[$enMonth] ?? $enMonth;
        $bnDayName = self::$bnDays[$enDayName] ?? $enDayName;
        $bnDay = self::enToBnNumber($enDay);
        $bnYear = self::enToBnNumber($enYear);
        $bnHour = self::enToBnNumber($enHour);
        $bnMinute = self::enToBnNumber($enMinute);
        $bnSecond = self::enToBnNumber($enSecond);

        // তারিখ ফর্মেটিং
        $formattedDate = "{$bnDay} {$bnMonth}, {$bnYear}";

        if ($showDay) {
            $formattedDate = "{$bnDayName}, {$formattedDate}";
        }

        if ($showTime) {
            $formattedDate .= " {$bnHour}:{$bnMinute} {$ampm}";
        }

        return $formattedDate;
    }

    /**
     * রিলেটিভ টাইম বাংলায় (যেমন: "২ দিন আগে", "১ ঘণ্টা পূর্বে")
     *
     * @param string|\DateTime $date
     * @return string
     */
    public static function toBanglaRelativeTime($date): string
    {
        if (is_string($date)) {
            $date = new \DateTime($date);
        }

        $now = new \DateTime();
        $diff = $now->diff($date);

        if ($diff->y > 0) {
            $years = self::enToBnNumber($diff->y);
            return "{$years} বছর আগে";
        } elseif ($diff->m > 0) {
            $months = self::enToBnNumber($diff->m);
            return "{$months} মাস আগে";
        } elseif ($diff->d > 0) {
            $days = self::enToBnNumber($diff->d);
            return "{$days} দিন আগে";
        } elseif ($diff->h > 0) {
            $hours = self::enToBnNumber($diff->h);
            return "{$hours} ঘণ্টা আগে";
        } elseif ($diff->i > 0) {
            $minutes = self::enToBnNumber($diff->i);
            return "{$minutes} মিনিট আগে";
        } else {
            return "কিছুক্ষণ আগে";
        }
    }

    /**
     * ইংরেজি সংখ্যাকে বাংলা সংখ্যায় রূপান্তর
     *
     * @param string|int $number
     * @return string
     */
    public static function enToBnNumber($number): string
    {
        $number = (string) $number;
        $bnNumber = '';

        for ($i = 0; $i < strlen($number); $i++) {
            if (is_numeric($number[$i])) {
                $bnNumber .= self::$bnDigits[$number[$i]];
            } else {
                $bnNumber .= $number[$i];
            }
        }

        return $bnNumber;
    }

    /**
     * বাংলা ক্যালেন্ডার তারিখ (সংক্ষিপ্ত ভার্সন)
     *
     * @param string|\DateTime $date
     * @return string
     */
    public static function shortBanglaDate($date): string
    {
        if (is_string($date)) {
            $date = new \DateTime($date);
        }

        $enDay = $date->format('d');
        $enMonth = $date->format('m');
        $enYear = $date->format('Y');

        $bnDay = self::enToBnNumber($enDay);
        $bnMonth = self::enToBnNumber($enMonth);
        $bnYear = self::enToBnNumber($enYear);

        return "{$bnDay}/{$bnMonth}/{$bnYear}";
    }
}
