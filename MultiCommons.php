<?php
if ( !defined( 'MEDIAWIKI' ) ) {
    die( 'Not an entry point.' );
}

// 拡張機能情報
$wgExtensionCredits['other'][] = [
    'path' => __FILE__,
    'name' => 'MultiForeignRepo',
    'author' => 'Ysmservice',
    'url' => 'https://ysmserv.com',
    'description' => 'Adds multiple Commons Project Repo.',
    'version' => '1.0.0',
];

// フックを利用して設定を追加
$wgHooks['SetupAfterCache'][] = function () {
    global $wgForeignFileRepos;

    $wgForeignFileRepos[] = [
        'class' => ForeignAPIRepo::class,
        'name' => 'ysmwikicommons',
        'apibase' => 'https://commons.ysmwiki.net/api.php',
        'url' => 'https://commons.ysmwiki.net/images',
        'thumbUrl' => 'https://commons.ysmwiki.net/images/thumb',
        'hashLevels' => 2,
        'transformVia404' => true,
        'fetchDescription' => true,
        'descriptionCacheExpiry' => 43200,
        'apiThumbCacheExpiry' => 0,
    ];

    $wgForeignFileRepos[] = [
        'class' => ForeignAPIRepo::class,
        'name' => 'skypediacommons',
        'apibase' => 'https://commons.skypedia.jp/api.php',
        'url' => 'https://commons.skypedia.jp/images',
        'thumbUrl' => 'https://commons.skypedia.jp/images/thumb',
        'hashLevels' => 2,
        'transformVia404' => true,
        'fetchDescription' => true,
        'descriptionCacheExpiry' => 43200,
        'apiThumbCacheExpiry' => 0,
    ];

    return true;
};
