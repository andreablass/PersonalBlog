<?php

return function ($page) {
    $searchQuery = get('q');
    $results = site()->index() // Busca en todas las páginas del sitio.
        ->listed() // Solo páginas visibles.
        ->filter(function ($page) use ($searchQuery) {
            return strpos(strtolower($page->text()->kirbytext()->value()), strtolower($searchQuery)) !== false;
        });
        //Filtra las páginas donde el campo text (convertido a texto plano) contiene la consulta de búsqueda.
        //Se realiza una comparación insensible a mayúsculas/minúsculas.

    return [
        'query' => $searchQuery,
        'results' => $results,
    ];
};
