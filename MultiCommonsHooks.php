<?php
use MediaWiki\RepoGroup\ForeignAPIRepo;

class MultiCommonsHooks {
    public static function onBeforeInitialize() {
        global $wgForeignFileRepos, $wgUploadDirectory, $wgFileBackends, $IP;

        // $IPを定義する
        if (!isset($IP)) {
            $IP = dirname(__DIR__, 2); // MediaWikiインストールディレクトリ
        }


        $wgFileBackends[] = [
            'name' => 'ysmwikicommons-backend',
            'class' => 'ForeignAPIRepo',
            'lockManager' => 'nullLockManager',
            'containerPath' => "{$IP}/images",
            'directoryMode' => 0777
        ];

        $wgFileBackends[] = [
            'name' => 'skypediacommons-backend',
            'class' => 'ForeignAPIRepo',
            'lockManager' => 'nullLockManager',
            'containerPath' => "{$IP}/images",
            'directoryMode' => 0777
        ];


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
            'backend' => 'ysmwikicommons-backend',
            'directory' => $wgUploadDirectory
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
            'backend' => 'skypediacommons-backend',
            'directory' => $wgUploadDirectory
        ];

        return true;
    }
}
