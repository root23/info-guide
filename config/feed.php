<?php

return [
    'feeds' => [
        'main' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\RSS\OrganizationItem@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/turbo.rss',

            'title' => 'Инфо-гид RSS',
            'description' => 'Инфо-гид - актуальный справочник компаний в городах России',
            'language' => 'ru-RU',

            /*
             * The view that will render the feed.
             */
            'view' => 'feed::atom',

            /*
             * The type to be used in the <link> tag
             */
            'type' => 'application/atom+xml',
        ],
    ],
];
