<?php

class MultiCommonsHooks {
    public static function onSetupAfterCache() {
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
    }
}
