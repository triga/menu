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
     * @param string $routeName
     * @param string $label
     * @param array $params
     * @param null $icon
     * @return Item\MenuItem
     */
    public function addRoute($routeName, $label, array $params = [], $icon = null)
    {
        return $this->rootMenuItem->addRoute($routeName, $label, $params, $icon);
    }

    /**
     * Registers a menu item using a URL.
     *
     * @param string $name
     * @param string $url
     * @param string $label
     * @param null $icon
     * @return Item\MenuItem
     */
    public function addUrl($name, $url, $label, $icon = null)
    {
        return $this->rootMenuItem->addUrl($name, $url, $label, $icon);
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
