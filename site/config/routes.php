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
    'action' => function ($slug) {
      // Define el ID de la página de Notion que deseas recuperar
      $notionPageId = 'Ciclo-de-vida-de-software-1754e2b34628803b9557cd1d9d07370a';
    
      // Configura los encabezados necesarios para la API de Notion
      $headers = [
        'Authorization' =>  'Bearer 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',
        'Notion-Version' => '2021-08-16',
      ];
    
      // Realiza la solicitud GET a la API de Notion
      $response = Remote::get("https://api.notion.com/v1/pages/{$notionPageId}", [
        'headers' => $headers
      ]);
    
      // Verifica si la respuesta es exitosa
      if ($response->code() === 200) {
        $content = json_decode($response->content(), true);
    
        // Procesa el contenido según la estructura de tu página en Notion
        return Page::factory([
          'slug' => $slug,
          'template' => 'article',
          'content' => [
            'title' => $content['properties']['title']['title'][0]['text']['content'],
            'subtitle' => $content['properties']['subtitle']['rich_text'][0]['text']['content'],
            'published_at' => $content['properties']['published_at']['date']['start'],
            'blocks' => $content['properties']['content']['rich_text'][0]['text']['content'],
          ]
        ]);
      } else {
        // Maneja el error en caso de que la solicitud falle
        return 'Error al obtener datos de Notion';
      }
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
