<?php
/**
 * Created by PhpStorm.
 * User: khosro
 * Date: 11/10/2019
 * Time: 01:27 PM
 */


if (!function_exists('remove_http')) {
    function remove_http($url)
    {
        $disallowed = array('http://', 'https://');
        foreach ($disallowed as $d) {
            if (strpos($url, $d) === 0) {
                return str_replace($d, '', $url);
            }
        }
        return $url;
    }
}
if (!function_exists('remove_special_chars')) {
    function remove_special_chars($data)
    {
        $data = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $data);
        return $data;
    }
}

if (!function_exists('rand_color')) {
    function rand_color()
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
}
if (!function_exists('getEndDate')) {
    function getEndDate($month, $price)
    {
        $end_date = '';
        switch ($month) {
            case '1m':
                $end_date = \Carbon\Carbon::now()->addMonths(1);
                $price = $price * 1;
                break;
            case '2m':
                $end_date = \Carbon\Carbon::now()->addMonths(2);
                $price = $price * 2;
                break;
            case '3m':
                $end_date = \Carbon\Carbon::now()->addMonths(3);
                $price = $price * 3;
                break;
            case '4m':
                $end_date = \Carbon\Carbon::now()->addMonths(4);
                $price = $price * 4;
                break;
            case '5m':
                $end_date = \Carbon\Carbon::now()->addMonths(5);
                $price = $price * 5;
                break;
            case '6m':
                $end_date = \Carbon\Carbon::now()->addMonths(6);
                $price = $price * 6;
                break;
            case '7m':
                $end_date = \Carbon\Carbon::now()->addMonths(7);
                $price = $price * 7;
                break;
            case '8m':
                $end_date = \Carbon\Carbon::now()->addMonths(8);
                $price = $price * 8;
                break;
            case '9m':
                $end_date = \Carbon\Carbon::now()->addMonths(9);
                $price = $price * 9;
                break;
            case '10m':
                $end_date = \Carbon\Carbon::now()->addMonths(10);
                $price = $price * 10;
                break;
            case '11m':
                $end_date = \Carbon\Carbon::now()->addMonths(11);
                $price = $price * 11;
                break;
            case '12m':
                $end_date = \Carbon\Carbon::now()->addMonths(12);
                $price = $price * 12;
                break;
            case '13m':
                $end_date = \Carbon\Carbon::now()->addMonths(13);
                $price = $price * 13;
                break;
            case '14m':
                $end_date = \Carbon\Carbon::now()->addMonths(14);
                $price = $price * 14;
                break;
            case '15m':
                $end_date = \Carbon\Carbon::now()->addMonths(15);
                $price = $price * 15;
                break;
            case '16m':
                $end_date = \Carbon\Carbon::now()->addMonths(16);
                $price = $price * 16;
                break;
            case '17m':
                $end_date = \Carbon\Carbon::now()->addMonths(17);
                $price = $price * 17;
                break;
            case '18m':
                $end_date = \Carbon\Carbon::now()->addMonths(18);
                $price = $price * 18;
                break;
            case '19m':
                $end_date = \Carbon\Carbon::now()->addMonths(19);
                $price = $price * 19;
                break;
            case '20m':
                $end_date = \Carbon\Carbon::now()->addMonths(20);
                $price = $price * 20;
                break;
            case '21m':
                $end_date = \Carbon\Carbon::now()->addMonths(21);
                $price = $price * 21;
                break;
            case '22m':
                $end_date = \Carbon\Carbon::now()->addMonths(22);
                $price = $price * 22;
                break;
            case '23m':
                $end_date = \Carbon\Carbon::now()->addMonths(23);
                $price = $price * 23;
                break;
            case '24m':
                $end_date = \Carbon\Carbon::now()->addMonths(24);
                $price = $price * 24;
                break;

        }
        return ['end_date' => $end_date, 'price' => $price];
    }

    if (!function_exists('checkHostByOrderId')) {
        function checkHostByOrderId($hostid, $order_id, $from_date, $to_date)
        {
            if (!checkHostTimeByOrderId($hostid, $order_id, $from_date, $to_date)) {
                disableHost($hostid);
            }
            return null;
        }
    }

    if (!function_exists('checkHostTimeByOrderId')) {
        function checkHostTimeByOrderId($hostid, $order_id, $from_date, $to_date)
        {
            if (now()->between($from_date, $to_date)) {
                return true;
            } else {
                return true;
            }
        }
    }


    if (!function_exists('disableHost')) {
        function disableHost($hostid)
        {
            $this->zabbix = app('zabbix');
            $host = $this->zabbix->hostGet([
                'hostids' => [
                    $hostid
                ],
                'output' => 'extend'
            ]);

            if ($host !== null) {
                return $host;
            } else {
                return null;
            }
        }
    }


//    Verification Order
    if (!function_exists('verificationStatus')) {
        function verificationStatus($status)
        {
            $verify_status = '';
            switch ($status) {
                case \App\Enums\VerifiedType::owner_waite:
                    $verify_status = 'مالک';
                    break;
                case \App\Enums\VerifiedType::successor_waite:
                    $verify_status = 'مسئول مالک';
                    break;
                case \App\Enums\VerifiedType::master_waite:
                    $verify_status = 'کارشناس';
                    break;
                case \App\Enums\VerifiedType::protection_waite:
                    $verify_status = 'بازرس';
                    break;
                case \App\Enums\VerifiedType::financial_waite:
                    $verify_status = 'مالی';
                    break;
                case \App\Enums\VerifiedType::support_waite:
                    $verify_status = 'پشتیبانی';
                    break;
                case \App\Enums\VerifiedType::supplier_waite:
                    $verify_status = 'تامین کننده';
                    break;
            }
            return $verify_status;
        }
    }

    if (!function_exists('getVerificationStatusArray')) {
        function getVerificationStatusArray()
        {
            return [
                '1' => 'مالک',
                '2' => 'مسئول مالک',
                '3' => 'کارشناس',
                '4' => 'بازرس',
                '5' => 'مالی',
                '6' => 'پشتیبانی'
            ];
        }
    }

    if (!function_exists('change_status_wait')) {
        function change_status_wait($order, $user, $protection=false)
        {
            if ($user->isMaster()) {
                $order->verified = \App\Enums\VerifiedType::supplier_waite;
                $order->waite_status = \App\Enums\VerifiedWaiteStatus::waite;
            }
            if ($user->isOwner()) {
                // Successor
                if($protection){
                    $order->verified = \App\Enums\VerifiedType::protection_waite;
                    $order->waite_status = \App\Enums\VerifiedWaiteStatus::waite;
                } else {
                    $order->verified = \App\Enums\VerifiedType::successor_waite;
                    $order->waite_status = \App\Enums\VerifiedWaiteStatus::waite;
                }
            }
            if ($user->isFinancial()) {
                // Completed
                // Support and master and owner
                $order->verified = \App\Enums\VerifiedType::completed;
                $order->waite_status = \App\Enums\VerifiedWaiteStatus::waite;
            }
            if ($user->isProtection()) {
                // supplier
                $order->verified = \App\Enums\VerifiedType::successor_waite;
                $order->waite_status = \App\Enums\VerifiedWaiteStatus::waite;
            }
            if ($user->isSuccessor()) {
                // Master
                $order->verified = \App\Enums\VerifiedType::master_waite;
                $order->waite_status = \App\Enums\VerifiedWaiteStatus::waite;
            }

            return $order;
        }
    }
    if (!function_exists('change_status_block')) {
        function change_status_block($order, $user)
        {
            if ($user->isMaster()) {
                // owner and successor

                // for waite you must change two fields
                // 1 -> verified        (master_wait)
                // 2 -> waite_status    (block)

                $order->verified = \App\Enums\VerifiedType::master_waite;
                $order->waite_status = \App\Enums\VerifiedWaiteStatus::blocked;
            }
            if ($user->isOwner()) {
                // Successor
                $order->verified = \App\Enums\VerifiedType::owner_waite;
                $order->waite_status = \App\Enums\VerifiedWaiteStatus::blocked;
            }
            if ($user->isFinancial()) {
                // Completed
                // Support and master and owner
                $order->verified = \App\Enums\VerifiedType::financial_waite;
                $order->waite_status = \App\Enums\VerifiedWaiteStatus::blocked;
            }
            if ($user->isProtection()) {
                // supplier
                $order->verified = \App\Enums\VerifiedType::protection_waite;
                $order->waite_status = \App\Enums\VerifiedWaiteStatus::blocked;
            }
            if ($user->isSuccessor()) {
                // Master
                $order->verified = \App\Enums\VerifiedType::successor_waite;
                $order->waite_status = \App\Enums\VerifiedWaiteStatus::blocked;
            }

            return $order;
        }
    }


}







