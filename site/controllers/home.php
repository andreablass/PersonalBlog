<?php
use Kirby\Cms\App;

return function (App $kirby, $site) {
    // Get all articles
    $articles = $site
        ->children()
        ->listed()
        ->filterBy('template', 'article')
        ->flip();
    return [
        'articles' => $articles
    ];
};

