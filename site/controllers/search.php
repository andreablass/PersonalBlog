<?php

return function ($site) {
    $searchQuery = get('q');
    $results = site()->search($searchQuery, 'title|subtitle|blocks') ;

    return [
        'query' => $searchQuery,
        'results' => $results,
    ];
};
