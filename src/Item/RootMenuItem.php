<?php namespace Triga\Menu\Item;

use Illuminate\Routing\UrlGenerator;

/**
 * Root menu item. Used as an aggregate and base item for other menu items.
 *
 * @package Triga\Menu\Item
 */
class RootMenuItem
{

    /**
     * @var UrlGenerator
     */
    protected $urlGenerator;

    /**
     * Registered items (children).
     *
     * @var MenuItem[]
     */
    protected $items = [];

    protected $viewPath = 'triga.menu::item';

    /**
     * URL generator setter.
     *
     * @param UrlGenerator $urlGenerator
     */
    public function setUrlGenerator(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

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
        $this->items[$routeName] = new MenuItem($this->urlGenerator->route($routeName, $routeParams), $label, $icon);

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
        $this->items[$name] = new MenuItem($url, $label, $icon);

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
        if (false === $this->hasItems()) {
            return view($this->viewPath, ['item' => $this]);
        }

        /**
         * @todo Handle rendering sub-items
         */
    }
}
