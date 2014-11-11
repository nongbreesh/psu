<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('tis_to_utf8')) {

    function tis_to_utf8($value) {
        $result = iconv('TIS-620', 'UTF-8', $value);
        return $result;
    }

}

if (!function_exists('thai_date')) {

    function thai_date($datetime, $format, $clock) {
        list($date) = explode(' ', $datetime);
        list($Y, $m, $d) = explode('-', $date);
        $Y = $Y + 543;

        $month = array(
            '0' => array('01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม', '04' => 'เมษายน', '05' => 'พฤษภาคม', '06' => 'มิถุนายน', '07' => 'กรกฏาคม', '08' => 'สิงหาคม', '09' => 'กันยายน', '10' => 'ตุลาคม', '11' => 'พฤษจิกายน', '12' => 'ธันวาคม'),
            '1' => array('01' => 'ม.ค.', '02' => 'ก.พ.', '03' => 'มี.ค.', '04' => 'เม.ย.', '05' => 'พ.ค.', '06' => 'มิ.ย.', '07' => 'ก.ค.', '08' => 'ส.ค.', '09' => 'ก.ย.', '10' => 'ต.ค.', '11' => 'พ.ย.', '12' => 'ธ.ค.')
        );
        if ($clock == false)
            return $d . ' ' . $month[$format][$m] . ' ' . $Y;
        else
            return $d . ' ' . $month[$format][$m] . ' ' . $time;
    }

}