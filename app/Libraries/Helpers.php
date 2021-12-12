<?php

use Carbon\Carbon;
use Rap2hpoutre\FastExcel\FastExcel;

function dateConvertFormtoDB($date)
{
    if (!empty($date)) {
        return Carbon::parse($date)->format('Y-m-d');
    }
}

function dateConvertDBtoForm($date)
{
    if (!empty($date)) {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}

function dateConvertDBtoFormDM($date)
{
    if (!empty($date)) {
        return \Carbon\Carbon::parse($date)->format('d M');
    }
}

function dateConvertDBtoFormDFCY($date)
{
    if (!empty($date)) {
        return \Carbon\Carbon::parse($date)->format('d F, Y');
    }
}

function dateTimeConvertDBtoForm($date)
{
    if (!empty($date)) {
        return \Carbon\Carbon::parse($date)->format('d-m-Y H:i:s');
    }
}

if (!function_exists('dbDate')) {
    function dbDate($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }
}


if (!function_exists('dbDateTime')) {
    function dbDateTime($date)
    {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
}

if (!function_exists('removeArrayValues')) {
    function removeArrayValues($originalArray, $removeValueArray)
    {
        return array_diff($originalArray, $removeValueArray);
    }
}

if (!function_exists('calculateAchievements')) {
    function calculateAchievements($target, $sales)
    {
        if ($target <= 0) {
            return $achievement = 0;
        }
        $achievement = ($sales / $target) * 100;

        return number_format($achievement, 2, '.', '');
    }
}


if (!function_exists('writeToLog')) {
    function writeToLog($logMessage, $logType = 'error')
    {
        try {
            $allLogTypes = ['alert', 'critical', 'debug', 'emergency', 'error', 'info'];

            $logType = strtolower($logType);

            if (in_array($logType, $allLogTypes)) {
                \Log::$logType($logMessage);
            }
        } catch (\Exception $exception) {
            //
        }
    }
}

if (!function_exists('exportErrorsFile')) {
    function exportErrorsFile($errors, $userId)
    {
        $filePath = errorListFilePath($userId);

        if (isset($filePath) && file_exists(storage_path($filePath))) {
            unlink(storage_path($filePath));
        }

        $errorCollection = collect($errors);
        (new FastExcel($errorCollection))->export(storage_path($filePath));

    }
}

if (!function_exists('formatCommonErrorLogMessage')) {
    function formatCommonErrorLogMessage($exception)
    {
        $logMessage = 'Error occured on File: ' . $exception->getFile() . ' on Line: ' . $exception->getLine() . ' due to: ' . $exception->getMessage();

        return $logMessage;
    }
}


if (!function_exists('csvExport')) {
    function csvExport($data, $filename)
    {
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename=' . $filename);

        $fp = fopen('php://output', 'w');

        function prettyString($string)
        {
            $val = str_replace("_", " ", $string);
            return ucwords($val);
        }

        $header = array_keys($data[0]);
        $header = array_map('prettyString', $header);

        fputcsv($fp, $header);
        foreach ($data as $row) {
            //$fp = fopen('php://output', 'a');
            fputcsv($fp, $row);
        }
        fclose($fp);
        exit;
    }
}

function msisdn($mobile_no, $with880 = true)
{
    if ($with880) {
        return '880' . substr($mobile_no, -10);
    } else {
        return substr($mobile_no, -11);
    }
}

if (!function_exists('calculateAchievements')) {
    function calculateAchievements($target, $sales)
    {
        if ($target <= 0) {
            return $achievement = 0;
        }
        $achievement = ($sales / $target) * 100;

        return number_format($achievement, 2, '.', '');
    }
}


if (!function_exists('calculateStringTimeToMiliseconds')) {
    function calculateStringTimeToMiliseconds($startDate, $endDate)
    {

        $date1 = new DateTime($startDate);
        $date2 = new DateTime($endDate);
        $interval = $date1->diff($date2);
        //$startTime = new \DateTime($startDate);
        //var_dump($startTime);
        //$endDate = new \DateTime($endDate);
//var_dump($endDate);
        //$interval = $startTime->diff($endDate);

        $totalMiliseconds = 0;
        $totalMiliseconds += $interval->m * 2630000000;
        $totalMiliseconds += $interval->d * 86400000;
        $totalMiliseconds += $interval->h * 3600000;
        $totalMiliseconds += $interval->i * 60000;
        $totalMiliseconds += $interval->s * 1000;

        return $totalMiliseconds;
    }

}

if (!function_exists('bn2en')) {
    function bn2en($number)
    {
        $bn = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];
        $en = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];

        return str_replace($bn, $en, $number);
    }
}


if (!function_exists('en2bn')) {
    function en2bn($string)
    {
        $en = [
                "1", "2", "3", "4", "5", "6", "7", "8", "9", "0",
                "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
            ];
        $bn = [
                "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০",
                "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "অগাস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর"
            ];

        return str_replace($en, $bn, $string);
    }
}





function getCurrentYear()
{
    return now()->year;
}




function strip_except_english($str)
{

    // $str = preg_replace('/[^0-9A-Za-z\-]/', '', $str);
    $str = preg_replace('/\p{Han}+/u', '', $str);  // strip chinese
    $str = preg_replace('/[\x{0410}-\x{042F}]+.*[\x{0410}-\x{042F}]+/iu', '', $str);  // strip russian
    return $str;
}

function cacheRemove()
{
    try {
        \Artisan::call('cache:clear');
        \Artisan::call('config:cache');
    } catch (\Throwable $th) {
    }
}



function getToday()
{
    return date('Y-m-d');
}

function getTodayWStartTime()
{
    return date('Y-m-d') . ' 00:00:00';
}

function getTodayWEndTime()
{
    return date('Y-m-d') . ' 23:59:59';
}

function getThisWeekFirstDay()
{
    return \Carbon\Carbon::now('+06:00')->subDays(6)->format('Y-m-d');
}

function getThisWeekFirstDayWStartTime()
{
    return \Carbon\Carbon::now('+06:00')->subDays(6)->format('Y-m-d') . ' 00:00:00';
}

function getThisMonthFirstDay()
{
    return \Carbon\Carbon::now('+06:00')->subDays(30)->format('Y-m-d');
}

function getThisMonthFirstDayWStartTime()
{
    return \Carbon\Carbon::now('+06:00')->subDays(30)->format('Y-m-d') . ' 00:00:00';
}


function getTodayDateTime()
{
    return date('Y-m-d H:i:s');
}

function getNow()
{
    return \Carbon\Carbon::now('+06:00');
}

function getYesterday()
{
    return \Carbon\Carbon::yesterday()->format('Y-m-d');
}









// paginate
// paginate

function paginate($items, $perPage = 10, $page = null, $options = [])
{
    $page = $page ?: (Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Illuminate\Support\Collection ? $items : Illuminate\Support\Collection::make($items);

    $data = new Illuminate\Pagination\LengthAwarePaginator($items->forPage($page, $perPage)->values(), $items->count(), $perPage, $page, $options);

    return $data;
}

function getFormattedPaginatedArray($data)
{
    return (object)[
        'current_page' => $data->currentPage(),
        'total_pages' => $data->lastPage(),
        'previous_page_url' => $data->previousPageUrl(),
        'next_page_url' => $data->nextPageUrl(),
        'record_per_page' => $data->perPage(),
        'current_page_items_count' => $data->count(),
        'total_count' => $data->total(),
        'pagination_last_page' => $data->lastPage(),
    ];
}



function getPaginatedSerial($paginator, $index)
{
    return $paginator->current_page > 1 ? (($paginator->current_page - 1) * $paginator->record_per_page + $index + 1) : $index + 1;
}

function generate_all_req_to_query_params($arr)
{
    $additional_query_params = '&';
    foreach ($arr as $key => $value) {
        // dd($key);
        // dd($value);
        if ($key != 'page') {
            $additional_query_params = $additional_query_params . $key . '=' . $value . '&';
        }
    }
    // dd($additional_query_params);
    return $additional_query_params;
}

function processStatus($array = [])
{
    $selected_value=$array['selected'] ?? '';
    $status=$array['status'] ?? '';

    $selected_key='';

    foreach ($status as $key => $status_item)
    {
        if ($status_item['value']==$selected_value)
        {
            $selected_key=$status_item['key'];
        }
    }
    return $selected_key;
}

function getDatesFromARange($firstDay, $numberofdays)
{
    $dates = [];
    $currentDate = $firstDay;
    for ($i=0; $i < $numberofdays ; $i++)
    {
        $dates[$i] = $currentDate;
        $currentDate = date('Y-m-d', strtotime("+1 day", strtotime($dates[$i])));
    }
    return $dates;
}

function getDatesFromARangeSubtractDay($firstDay, $numberofdays)
{
    $dates = [];
    $currentDate = $firstDay;
    for ($i=$numberofdays; $i>0 ; $i--)
    {
        $dates[$i] = $currentDate;
        $currentDate = date('Y-m-d', strtotime("-1 day", strtotime($dates[$i])));
    }
    return $dates;
}


function getBGs()
{
    $arr = ['bg-orange-3', 'bg-blue-3', 'bg-green-3', 'bg-green-4'];
    return $arr;
}

?>
