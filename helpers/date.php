<?php

class Date {

    public static function convertStringToTime($str)
    {
        if (empty($str)) return '';
        $str = str_replace(',', '.', $str);
        $dtime = DateTime::createFromFormat("d.m.y", $str);
        return $dtime->getTimestamp();
    }
    
    public static function replaceLongYearForShort($date)
    {
        $year_long = date('Y');
        $year_short = date('y');
        return str_replace($year_long, $year_short, $date);
    }


    public static function convertRusDateToEng($date_str)
    {
        $date = self::splitTheRusDateIntoParts($date_str);
        if (!$date) throw new Exception('Нет даты.');
        $year = self::getLongYear($date['year']);
        return $year.'-'.$date['month'].'-'.$date['day'];
    }

    private static function splitTheRusDateIntoParts($date_str)
    {
        if (!$date_str) throw new Exception('Нет даты.');
        $data = explode('.', $date_str);
        if (!$data) throw new Exception('Нет даты.');
        $date['day'] = $data[0];
        $date['month'] = $data[1];
        $date['year'] = $data[2];
        return $date;
    }

    public static function getNextMonth($month)
    {
        if ($month == '12') return '01';
        $next_month = strval($month + 1);
        $next_month = $next_month > '9' ? $next_month : '0'.$next_month;
        return $next_month;
    }

    private static function getLongYear($year)
    {
        if ($year == date('y')) return date('Y');
        else return $year;
    }

    public static function getNameMonthRus($number = null)
    {
        if (empty($number)) $number = date('m');
        $months = self::getArrayMonths();
        return $months[$number];
    }

    public static function getArrayMonths()
    {
        return ['01' => 'Январь', '02' => 'Февраль', '03' => 'Март', '04' => 'Апрель', '05' => 'Май',
            '06' => 'Июнь', '07' => 'Июль', '08' => 'Август', '09' => 'Сентябрь', '10' => 'Октябрь', '11' => 'Ноябрь', '12' => 'Декабрь'];
    }
}