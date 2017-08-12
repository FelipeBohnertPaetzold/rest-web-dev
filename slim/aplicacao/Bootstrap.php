<?php

class Bootstrap {

    public static $entityManager = null;
    public static $memcache = null;

    /**
     * @return Memcache
     */
    public static function getMemcache() {
        if (Bootstrap::$memcache == null) {
            Bootstrap::$memcache = new Memcache();
            Bootstrap::$memcache->addServer("localhost");
        }
        return Bootstrap::$memcache;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public static function getEntityManager() {

        if (Bootstrap::$entityManager == null) {

            $paths = array("./Entity");
            $isDevMode = false;

            $dbParams = array(
                'host' => 'localhost',
                'driver' => 'pdo_mysql',
                'user' => 'root',
                'password' => '',
                'dbname' => 'webdev',
            );

            $config = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
            $config->setAutoGenerateProxyClasses(true);
            $config->setProxyDir("./Proxy/");
            Bootstrap::$entityManager = Doctrine\ORM\EntityManager::create($dbParams, $config);
        }

        return Bootstrap::$entityManager;
    }

}
