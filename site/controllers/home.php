<?php
use Kirby\Cms\App;

return function (App $kirby, $site) {
    // Get all articles
    $articles = $site
        ->children()
        ->listed()
        ->filterBy('template', 'article')
        ->flip();
    // Filtrar por categoría si está definida
    if ($category = get('category')) {
        $articles = $articles->filterBy('categories', '==', $category, ',');
    }
    // Pasar categorías y artículos a la plantilla
    $categories = $site->categories()->split(',');

    return [
        'articles' => $articles,
        'categories' => $categories,
    ];
};

