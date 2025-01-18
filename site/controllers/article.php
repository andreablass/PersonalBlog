<?php
use Kirby\Cms\App;

return function (App $kirby, $site, $page) {
    $about = $site->children()->listed()->filterBy('template', 'about')->first();

    $publishedAt = $page->published_at()->value();
    $formattedDate = date('M d, Y', strtotime($publishedAt));

    return [
        'about' => $about,
        'formattedDate' => $formattedDate,
    ];
};

