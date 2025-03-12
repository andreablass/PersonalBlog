<?php
use Kirby\Cms\App;

return function (App $kirby, $site, $page) {
    $data = [
        'title' => $page->title()->value(),
        'subtitle' => $page->subtitle()->value(),
    ];

    return [
        'data' => $data,
    ];
};