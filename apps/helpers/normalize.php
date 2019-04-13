<?php

function normalize($url)
{
    $parsedUrl = parse_url($url);
    if (isset($parsedUrl['scheme'])) {
        $parsedUrl['scheme'] .= '://';
    }
    if (!isset($parsedUrl['path'])) {
        $parsedUrl['path'] = '';
    }

    # パス末尾に / を追加
    if (preg_match('/\/$/', $parsedUrl['path']) !== 1) {
        $parsedUrl['path'] .= '/';
    }

    $url = '';
    foreach ($parsedUrl as $component) {
        $url .= $component;
    }
    return $url;
}
