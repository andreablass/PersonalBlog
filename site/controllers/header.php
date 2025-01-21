<?php

return function ($page) {
    $searchQuery = get('q');
    $results = site()->index() // Busca en todas las páginas del sitio.
        ->listed() // Solo páginas visibles.
        ->filter(function ($page) use ($searchQuery) {
            return strpos(strtolower($page->text()->kirbytext()->value()), strtolower($searchQuery)) !== false;
        });

    return [
        'query' => $searchQuery,
        'results' => $results,
    ];
};
