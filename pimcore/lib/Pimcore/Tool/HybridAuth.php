<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) 2009-2016 pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Tool;

use Pimcore\Logger;

class HybridAuth
{

    /**
     * @throws \Zend_Loader_Exception
     */
    public static function init()
    {
        // register HybridAuth
        $autoloader = \Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('Hybrid');

        // disable output-cache
        $front = \Zend_Controller_Front::getInstance();
        $front->unregisterPlugin("Pimcore\\Controller\\Plugin\\Cache");
    }

    /**
     * @return mixed|null
     * @throws \Exception
     */
    public static function getConfiguration()
    {
        $config = null;
        $configFile = \Pimcore\Config::locateConfigFile("hybridauth.php");
        if (is_file($configFile)) {
            $config = include($configFile);
            $config["base_url"] = \Pimcore\Tool::getHostUrl() . "/hybridauth/endpoint";
        } else {
            throw new \Exception("HybridAuth configuration not found. Please place it into this file: $configFile");
        }

        return $config;
    }

    /**
     * @param $provider
     * @return \Hybrid_Provider_Adapter
     */
    public static function authenticate($provider)
    {
        self::init();

        $adapter = null;
        try {
            $hybridauth = new \Hybrid_Auth(self::getConfiguration());
            $provider = @trim(strip_tags($provider));
            $adapter = $hybridauth->authenticate($provider);
        } catch (\Exception $e) {
            Logger::info($e);
        }

        return $adapter;
    }

    /**
     *
     */
    public static function process()
    {
        self::init();

        \Hybrid_Endpoint::process();
        exit;
    }
}
