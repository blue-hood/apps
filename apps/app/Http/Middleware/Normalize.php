<?php

namespace App\Http\Middleware;

use Closure;

class Normalize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = $_SERVER['REQUEST_URI']; // PHP 標準のリクエストを使用
        $normalized = $this->normalize($url);
        if ($url != $normalized) {
            header('Location: ' . $normalized, true, 301); // PHP 標準のリダイレクトを使用
            exit();
        }

        $response = $next($request);
        $content = $response->getContent();

        // 参考: http://piyopiyocs.blog115.fc2.com/blog-entry-636.html
        $regex = '(' . preg_quote(config('app.url'), "/") . '[-_.!~*\'()a-zA-Z0-9;/?:@&=+$,%#]*)';
        $content = preg_replace_callback(
            $regex,
            function ($url) {
                return $this->normalize($url[0]);
            },
            $content
        );

        $response->setContent($content);
        return $response;
    }

    private function normalize($url)
    {
        $isHtmlEncoded = $url !== htmlspecialchars_decode($url);
        $url = htmlspecialchars_decode($url);
        $parsedUrl = parse_url($url);
        $parsedUrl['scheme'] = $parsedUrl['scheme'] ?? '';
        $parsedUrl['host'] = $parsedUrl['host'] ?? '';
        $parsedUrl['path'] = $parsedUrl['path'] ?? '';
        $parsedUrl['query'] = $parsedUrl['query'] ?? '';
        $parsedUrl['fragment'] = $parsedUrl['fragment'] ?? '';
        parse_str($parsedUrl['query'], $params);
        // パスを正確に dirname と basename に分離する。
        preg_match('/(.*)\/(.*)/', $parsedUrl['path'], $matches);
        $dirname = $matches[1] ?? '';
        $dirname .= '/';
        $basename = $matches[2] ?? '';

        // パス末尾に / を追加
        if ($basename !== '' && mb_strpos($basename, '.') === false) {
            $dirname .= $basename . '/';
            $basename = '';
        }
        // index.* を削除
        $basename = preg_replace('/^index\.(.*)/', '', $basename);
        // パスの // -> / 置き換え
        $dirname = preg_replace('/\/\/+/', '/', $dirname);
        // クエリ並び替え
        ksort($params);

        if ($parsedUrl['scheme'] != '') {
            $parsedUrl['scheme'] .= '://';
        }
        if (!empty($params)) {
            $parsedUrl['query'] = '?' . http_build_query($params);
        }
        if ($parsedUrl['fragment'] != '') {
            $parsedUrl['fragment'] = '#' . $parsedUrl['fragment'];
        }
        $parsedUrl['path'] = $dirname . $basename;
        $url =
            $parsedUrl['scheme'] .
            $parsedUrl['host'] .
            $parsedUrl['path'] .
            $parsedUrl['query'] .
            $parsedUrl['fragment'];
        if ($isHtmlEncoded) {
            $url = htmlspecialchars($url);
        }
        return $url;
    }
}
