<?php

function numericalOrder($index){
    $currPage = (isset($_REQUEST['page']) && $_REQUEST['page']) ?  $_REQUEST['page'] : 1;
    return ($index + 1) * $currPage;
}

/**
 * Chuyển đổi chuỗi kí tự thành dạng slug dùng cho việc tạo friendly url.
 * @access    public
 * @param string
 * @return    string
 */
if (!function_exists('createSlug')) {
    function createSlug($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
}
/**
 * @param string $image
 * @param string $direction
 * @return string
 */
function getUrlImageUpload($image, $direction = 'articles'){
    $no_photo = 'images/img/no_photo.jpg';
    $urlImage = 'images/uploads/'.$direction.'/'.$image;
    if($image){
        return asset($urlImage);
    }
    return $no_photo;
}

function convert_number_to_words($number) {

    $hyphen      = ' ';
    $conjunction = '  ';
    $separator   = ' ';
    $negative    = 'âm ';
    $decimal     = ' phẩy ';
    $dictionary  = array(
    0                   => 'Không',
    1                   => 'Một',
    2                   => 'Hai',
    3                   => 'Ba',
    4                   => 'Bốn',
    5                   => 'Năm',
    6                   => 'Sáu',
    7                   => 'Bảy',
    8                   => 'Tám',
    9                   => 'Chín',
    10                  => 'Mười',
    11                  => 'Mười một',
    12                  => 'Mười hai',
    13                  => 'Mười ba',
    14                  => 'Mười bốn',
    15                  => 'Mười năm',
    16                  => 'Mười sáu',
    17                  => 'Mười bảy',
    18                  => 'Mười tám',
    19                  => 'Mười chín',
    20                  => 'Hai mươi',
    30                  => 'Ba mươi',
    40                  => 'Bốn mươi',
    50                  => 'Năm mươi',
    60                  => 'Sáu mươi',
    70                  => 'Bảy mươi',
    80                  => 'Tám mươi',
    90                  => 'Chín mươi',
    100                 => 'trăm',
    1000                => 'nghìn',
    1000000             => 'triệu',
    1000000000          => 'tỷ',
    1000000000000       => 'nghìn tỷ',
    1000000000000000    => 'nghìn triệu triệu',
    1000000000000000000 => 'tỷ tỷ'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 1000:
            $string = $number;
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

function convert_words_to_numbers($words){
    $dictionary = [
        'nghin'            => 1000,
        'trieu'            => 1000000,
        'ty'               => 1000000000,
    ];
    $words = strtolower($words);

    $arr = explode(' ', $words);
    $number = 0;
    foreach($arr as $v){
        if (!is_numeric($v)) {
            $number *= isset($dictionary[$v]) ? (int)$dictionary[$v] : 1;
        }
        $number += (int)$v;
    }
    return $number;
}

/**
 *
 * @access    public
 * @param    string
 * @return    string
 */
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}


function unit_price($price, $acreage = 1){
    // echo pow(1000, floor(log($number, 1000))).',';
    switch ($price) {
        case $price < 10000:
            return '~ '.number_format(round((float)($price/$acreage), 2), 0, ",", ".").' nghìn';
            break;
        default:
            return '~ '.convert_number_to_words(round((float)($price/$acreage), -3));
            break;
    }
}
function total_price($price, $acreage){
    switch ($price) {
        case $price < 10000:
            return number_format(round((float)($price*$acreage), 2), 0, ",", ".").' nghìn';
            break;
        default:
            return convert_number_to_words(round((float)($price*$acreage), -3));
            break;
    }
}

function price_project($price, $acreage, $type_unit){
    $price_result = [
        'total_price' => null,
        'unit_price' => null
    ];
    switch($type_unit) {
        case '/ m²':
            $price_result = [
                'total_price' => total_price($price, $acreage),
                'unit_price' => number_format($price, 0, ",", ".").' nghìn / m²'
            ];
            return $price_result;
            break;
        case 'VNĐ':
            $price_result = [
                'total_price' =>  convert_number_to_words($price),
                'unit_price' => unit_price($price, $acreage).' / m²'
            ];
            return $price_result;
            break;
        default:
            $price_result = [
                'total_price' => 'Giá thỏa thuận',
                'unit_price' => null
            ];
            return $price_result;
            break;
    }
}
