<?php

if (!function_exists('get_segment_url')) {
    function get_segment_url()
    {
        $segment = [];
        $current_url = explode('/', url()->current());
        foreach ($current_url as $key => $value) {
            if ($key > 2) {
                $segment[] = $value;
            }
        }
        return $segment;
    }
}

if (!function_exists('ch_lang')) {
    function ch_lang($idn, $en)
    {
        return session()->get('applocale') == 'id' ? $idn : $en;
    }
}

if (!function_exists('ch_currency')) {
    function ch_currency($idr, $usd = false)
    {
        if ($usd == false) {
            return 'IDR ' . number_format($idr, 0, ".", ",");
        }
        return (session()->get('appcurrency') == 'idr' ? 'IDR ' : '$ ') . number_format(session()->get('appcurrency') == 'idr' ? $idr : $usd, 0, ".", ",");
    }
}

if (!function_exists('asset')) {
    function asset($path)
    {
        return env('APP_URL') . $path;
    }
}