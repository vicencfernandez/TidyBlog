<?php

return [
    'production' => true,
    'baseUrl' => 'https://tidyblog.netlify.app',
    'site' => [
        'title' => 'The Tidy Blog for Business Analytics',
        'description' => 'Blog about Business Analytics of Vicenc Fernandez',
        'image' => 'default-share.png',
    ],
    'owner' => [
        'name' => 'Vicenc Fernandez',
        'twitter' => 'vicencfernandez',
        'github' => 'vicencfernandez',
    ],
    'services' => [
        'cmsVersion' => '2.10.111',
        'analytics' => 'UA-XXXXX-Y',
        'disqus' => 'artisanstatic',
        'formcarry' => 'XXXXXXXXXXXX',
        'cloudinary' => [
            'cloudName' => 'artisanstatic',
            'apiKey' => '365895137117119',
        ],
    ],
    'collections' => [
        'posts' => [
            'path' => 'posts/{filename}',
            'sort' => '-date',
            'extends' => '_layouts.post',
            'section' => 'postContent',
            'isPost' => true,
            'comments' => true,
            'tags' => [],
            'hasTag' => function ($page, $tag) {
                return collect($page->tags)->contains($tag);
            },
            'prettyDate' => function ($page, $format = 'M j, Y') {
                return date($format, $page->date);
            },
        ],
        'tags' => [
            'path' => 'tags/{filename}',
            'extends' => '_layouts.tag',
            'section' => '',
            'name' => function ($page) {
                return $page->getFilename();
            },
        ],
    ],
];
