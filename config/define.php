<?php
return [
    'app' => [
        'home_sider_archives_counts' => 10,
    ],
    'cache' => [
        'home_nav_cates'        => ['key' => 'home.index.navCates', 'minutes' => 30],
        'home_sider_cates'      => ['key' => 'home.index.siderCates', 'minutes' => 30],
        'home_sider_archives'   => ['key' => 'home.index.siderArchives', 'minutes' => 30],
        'home_sider_tags'       => ['key' => 'home.index.siderTags', 'minutes' => 30],
        'home_footer_blogrolls' => ['key' => 'home.index.footerBlogrolls', 'minutes' => 30],
    ],
    'article' => [
        'is_hidden' => [
            'false' => ['value' => 0, 'desc' => '否'],
            'true'  => ['value' => 1, 'desc' => '是'],
        ],
    ],
];
