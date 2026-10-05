<?php
/**
 * @package     Webmarka.Plugin
 * @subpackage  Sampledata.wmarka
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use Webmarka\Plugin\Sampledata\Wmarka\Extension\Wmarka;

return new class () implements ServiceProviderInterface {
    public function register(Container $container): void
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {
                $plugin = new Wmarka(
                    $container->get(DispatcherInterface::class),
                    (array) PluginHelper::getPlugin('sampledata', 'wmarka')
                );
                $plugin->setApplication(Factory::getApplication());

                return $plugin;
            }
        );
    }
};
