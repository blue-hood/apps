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
        $parsedUrl = parse_url($url);
        if (isset($parsedUrl['scheme'])) {
            $parsedUrl['scheme'] .= '://';
        }
        if (!isset($parsedUrl['path'])) {
            $parsedUrl['path'] = '';
        }

        # パス末尾に / を追加
        if (mb_strpos(basename($parsedUrl['path']), '.') === false && preg_match('/\/$/', $parsedUrl['path']) !== 1) {
            $parsedUrl['path'] .= '/';
        }

        $url = '';
        foreach ($parsedUrl as $component) {
            $url .= $component;
        }
        return $url;
    }
}
