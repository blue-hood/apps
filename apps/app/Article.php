<?php

namespace App;

use Carbon\Carbon;
use cebe\markdown\Markdown;
use Hyn\Frontmatter\Parser;
use Hyn\Frontmatter\Frontmatters\YamlFrontmatter;

class Article
{
    public static function get(string $id): array
    {
        $articlesPath = base_path('apps-articles');
        $articlePath = "${articlesPath}/${id}/index.md";

        $parser = new Parser(new Markdown());
        $parser->setFrontmatter(YamlFrontmatter::class);

        $article = $parser->parse(file_get_contents($articlePath));
        $article['meta']['id'] = $id;
        $article['meta']['updated_at'] = (new Carbon(filemtime($articlePath)))->format('Y-m-d');

        return $article;
    }

    public static function getMetas(): array
    {
        $articlesPath = base_path('apps-articles');
        $articlePaths = glob("${articlesPath}/*/index.md");
        usort($articlePaths, function ($a, $b) {
            return filemtime($a) - filemtime($b);
        });

        $articles = [];
        foreach ($articlePaths as $articlePath) {
            $parser = new Parser(new Markdown());
            $parser->setFrontmatter(YamlFrontmatter::class);

            $article = $parser->parse(file_get_contents($articlePath));
            $meta = $article['meta'];
            $meta['id'] = str_replace('/index.md', '', str_replace($articlesPath . '/', "", $articlePath));
            $meta['updated_at'] = (new Carbon(filemtime($articlePath)))->format('Y-m-d');

            $articles[] = $meta;
        }

        return $articles;
    }
}
