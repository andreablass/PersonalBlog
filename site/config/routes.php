<?php

use Kirby\Cms\page;

return [
  [
    'pattern' => '/articles.json',
    'method' => 'get',
    'action' => function () {
      $articles = site()
        ->children()
        ->listed()
        ->filter('template', 'article')
        ->flip();

      return
        $articles->map(fn(Page $article) => [
          'title' => $article->title()->value(),
          'subtitle' => $article->subtitle()->value(),
        ])->data();
    }
  ],
  [
    'pattern' => '/first',
    'method' => 'get',
    'action' => function () {
      return Page::factory([
        'slug' => 'first',
        'template' => 'article',
        'content' => [
          'title' => 'Andrea\'s first virtual page',
          'subtitle' => 'Andrea\'s first virtual page',
          'published_at' => '2025-03-11',
        ]
      ]);
    }
  ],
  [
    'pattern' => '/andrea/url/(:any)',
    'method' => 'get',
    'action' => function () {
      $mock = Remote::get('https://jsonplaceholder.typicode.com/posts/1');

      $content = (object) json_decode($mock->content(), true);
      return Page::factory([
        'slug' => 'first',
        'template' => 'article',
        'content' => [
          'title' => $content->title,
          'subtitle' => $content->title,
          'published_at' => '2025-03-11',
          'blocks' => $content->body,
        ]
      ]);
    }
  ],
  [
    'pattern' => '/search',
    'method' => 'get',
    'action' => function () {
      return Page::factory([
        'slug' => 'buscador',
        'template' => 'search',
        'content' => []
      ]);
    }
  ]
];
