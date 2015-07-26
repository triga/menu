<?php namespace Triga\Menu\Item;

use Triga\Menu\Menu;

/**
 * Root menu item. Used as an aggregate and base item for other menu items.
 *
 * @package Triga\Menu\Item
 */
class RootMenuItem
{

    /**
     * Registered items (children).
     *
     * @var MenuItem[]
     */
    protected $items = [];

    /**
     * Base view path for an item without children.
     *
     * @var string
     */
    protected $viewPath = 'triga.menu::item';

    /**
     * View path for an item which has children.
     *
     * @var string
     */
    protected $viewPathWithChildren = 'triga.menu::itemWithChildren';

    /**
     * @var Menu
     */
    protected $container;

    /**
     * Registers a route based on its name.
     *
     * @param string $routeName
     * @param string $label
     * @param array $routeParams
     * @param string|null $icon
     * @return MenuItem
     */
    public function addRoute($routeName, $label, array $routeParams = [], $icon = null)
    {
        $container = $this->getContainer();
        $route = $container->getUrlGenerator()->route($routeName, $routeParams);

        $this->items[$routeName] = (new MenuItem($route, $label, $icon))
            ->setContainer($container);

        return $this->items[$routeName];
    }

    /**
     * Registers an URL.
     *
     * @param string $name
     * @param string $url
     * @param string $label
     * @param string|null $icon
     * @return MenuItem
     */
    public function addUrl($name, $url, $label, $icon = null)
    {
        $this->items[$name] = (new MenuItem($url, $label, $icon))
            ->setContainer($this->getContainer());

        return $this->items[$name];
    }

    /**
     * Returns true if the menu item has sub-items.
     *
     * @return bool
     */
    public function hasItems()
    {
        return (bool)count($this->items);
    }

    /**
     * Returns sub-items.
     *
     * @return MenuItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Renders the item's view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $viewPath = $this->viewPath;

        if (true === $this->hasItems()) {
            $viewPath = $this->viewPathWithChildren;
        }

        return view($viewPath, ['item' => $this]);
    }

    /**
     * Container setter.
     *
     * @param Menu $container
     * @return $this
     */
    public function setContainer(Menu $container)
    {
        $this->container = $container;

        return $this;
    }

    /**
     * Returns the container.
     *
     * @return Menu
     */
    public function getContainer()
    {
        return $this->container;
    }
}
