<?php

return [
    /**
     * Json placeholder base url.
     */
    'json_placeholder_base_url' => env('JSON_PLACEHOLDER_BASE_URL', 'https://jsonplaceholder.typicode.com'),

    /**
     * Pagination size for resources.
     */
    'pagination_size' => 10,

    /**
     * Template engine used to render views.
     * Right now only blade supported.
     */
    'template_engine' => 'blade',

    /**
     * Should display random background color in resource pages except for landing page.
     */
    'randomize_background_color' => true,

    /**
     * Resources settings.
     */
    'resources' => [
        'posts' => [
            // This maps to local uri.
            'uri' => 'posts',
            // This maps to api path to be called on json placeholder.
            'api_path' => '/posts',
            'svg_icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                </svg>',
            // This is the page that will be used to render this resource page which lives under /blade/resources/index.
            'index-page' => 'posts',
            // This is the page that will be used to render this resource page which lives under /blade/resources/show.
            'show-page' => 'post'
        ],
        'comments' => [
            'uri' => 'comments',
            'api_path' => '/comments',
            'svg_icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z"/>
                </svg>',
            'index-page' => 'comments',
            'show-page' => 'comment'
        ],
        'albums' => [
            'uri' => 'albums',
            'api_path' => '/albums',
            'svg_icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M14 4v3a1 1 0 0 1-1 1h-3m4 10v1a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2m11-3v10a1 1 0 0 1-1 1h-7a1 1 0 0 1-1-1V7.87a1 1 0 0 1 .24-.65l2.46-2.87a1 1 0 0 1 .76-.35H18a1 1 0 0 1 1 1Z"/>
                </svg>',
            'index-page' => 'albums',
            'show-page' => 'album'
        ],
        'photos' => [
            'uri' => 'photos',
            'api_path' => '/photos',
            'svg_icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 16 5-7 6 6.5m6.5 2.5L16 13l-4.286 6M14 10h.01M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                </svg>',
            'index-page' => 'photos',
            'show-page' => 'photo'
        ],
        'todos' => [
            'uri' => 'todos',
            'api_path' => '/todos',
            'svg_icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z"/>
            </svg>',
            'index-page' => 'todos',
            'show-page' => 'todo'
        ],
        'users' => [
            'uri' => 'users',
            'api_path' => '/users',
            'svg_icon' => '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
            </svg>',
            'index-page' => 'users',
            'show-page' => 'user'
        ],
    ],

    /**
     * Background colors to be used on resource pages.
     */
    'background_colors' => [
        'bg-amber-400',
        'bg-indigo-400',
        'bg-yellow-400',
        'bg-lime-400',
        'bg-emerald-400',
        'bg-sky-400',
        'bg-rose-400',
        'bg-teal-400',
        'bg-green-400',
        'bg-zinc-400',
    ]
];
