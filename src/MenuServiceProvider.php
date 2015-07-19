<?php namespace Triga\Menu;

use Illuminate\Support\ServiceProvider;

/**
 * TrigaBackend service provider.
 *
 * Class TrigaBackendServiceProvider
 * @package TrigaBackend
 */
class MenuServiceProvider extends ServiceProvider
{

    public function register()
    {
    }

    public function boot()
    {
        $this->loadViewsFrom(realpath(__DIR__ . '/../resources/views'), 'triga.menu');
    }

}
