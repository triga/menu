<?php namespace Triga\Menu;

use Triga\Menu\Item\RootMenuItem;
use Illuminate\Routing\UrlGenerator;

/**
 * Class responsible for building menu's.
 *
 * @package Triga\Menu
 */
class Menu
{

    /**
     * @var array
     */
    protected $items;

    /**
     * @var Item\MenuItem
     */
    protected $rootMenuItem;

    /**
     * Path to the main view file.
     *
     * @var string
     */
    protected $viewPath = 'triga';

    public function __construct(UrlGenerator $urlGenerator, RootMenuItem $rootMenuItem)
    {
        $this->rootMenuItem = $rootMenuItem;
        $this->rootMenuItem->setUrlGenerator($urlGenerator);
    }

    /**
     * Registers a menu item a route name.
     *
     * @param $routeName
     * @param array $params
     * @return Item\MenuItem
     */
    public function addRoute($routeName, array $params = [])
    {
        return $this->rootMenuItem->addRoute($routeName, $params);
    }

    /**
     * Registers a menu item using a URL.
     *
     * @param $name
     * @param $url
     * @return Item\MenuItem
     */
    public function addUrl($name, $url)
    {
        return $this->rootMenuItem->addUrl($name, $url);
    }

    /**
     * Returns registered menu items.
     *
     * @return Item\MenuItem[]
     */
    public function getItems()
    {
        return $this->rootMenuItem->getItems();
    }
}
