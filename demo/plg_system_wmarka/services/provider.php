<?php

/**
 * @package     Wmarka
 * @subpackage  plg_system_wmarka
 * @copyright   (C) 2026 Webmarka
 * @license     GNU General Public License version 2 or later
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use Webmarka\Plugin\System\Wmarka\Extension\Wmarka;

return new class () implements ServiceProviderInterface {
    public function register(Container $container): void
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {
                $plugin = new Wmarka(
                    $container->get(DispatcherInterface::class),
                    (array) PluginHelper::getPlugin('system', 'wmarka')
                );
                $plugin->setApplication(Factory::getApplication());

                return $plugin;
            }
        );
    }
};
