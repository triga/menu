<?php namespace Triga\Menu;

use Triga\Menu\Item\RootMenuItem;

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
    protected $viewPath = 'triga.menu::menu';

    public function __construct(RootMenuItem $rootMenuItem)
    {
        $this->rootMenuItem = $rootMenuItem;
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

    /**
     * Sets the view path.
     *
     * @param string $viewPath
     */
    public function setViewPath($viewPath)
    {
        $this->viewPath = $viewPath;
    }

    /**
     * Renders the view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view($this->viewPath, [
            'items' => $this->rootMenuItem->getItems(),
        ]);
    }
}
