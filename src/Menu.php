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
    protected $viewPath = 'triga.menu::menu';

    /**
     * @var UrlGenerator
     */
    protected $urlGenerator;

    /**
     * Current url.
     *
     * @var string
     */
    protected $currentUrl;

    /**
     * Menu's ID.
     *
     * @var string
     */
    protected $id;

    public function __construct(RootMenuItem $rootMenuItem)
    {
        $this->rootMenuItem = $rootMenuItem;
        $this->id = 'triga_menu_' . md5(microtime());
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
            'id' => $this->getId(),
            'items' => $this->rootMenuItem->getItems(),
        ]);
    }

    /**
     * URL generator setter.
     *
     * @param UrlGenerator $urlGenerator
     * @return $this
     */
    public function setUrlGenerator(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;

        return $this;
    }

    /**
     * Returns the URL generator.
     *
     * @return UrlGenerator
     */
    public function getUrlGenerator()
    {
        return $this->urlGenerator;
    }

    /**
     * Sets the current URL.
     *
     * @param $currentUrl
     * @return $this
     */
    public function setCurrentUrl($currentUrl)
    {
        $this->currentUrl = $currentUrl;

        return $this;
    }

    /**
     * Returns the current URL.
     *
     * @return string
     */
    public function getCurrentUrl()
    {
        return $this->currentUrl;
    }

    /**
     * Returns the menu's ID.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
