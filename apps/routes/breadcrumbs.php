<?php
use App\Article;

Breadcrumbs::for('index', function ($trail) {
    $trail->push('Hood', route('index'));
});

Breadcrumbs::for('privacy', function ($trail) {
    $trail->parent('index');
    $trail->push('プライバシーポリシー', route('privacy'));
});

Breadcrumbs::for('articles.index', function ($trail) {
    $trail->parent('index');
    $trail->push('記事一覧', route('articles.index'));
});

Breadcrumbs::for('articles.show', function ($trail, array $article) {
    $trail->parent('articles.index');
    $trail->push(htmlspecialchars_decode($article['meta']['title']), route('articles.show', $article['meta']['id']));
});
