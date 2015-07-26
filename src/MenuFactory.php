<?php namespace Triga\Menu;

use Illuminate\Http\Request;
use Triga\Menu\Item\RootMenuItem;
use Illuminate\Routing\UrlGenerator;

/**
 * Menu factory. Responsible for instantiating new instances of Menus.
 *
 * @package Triga\Menu
 */
class MenuFactory
{

    /**
     * @var UrlGenerator
     */
    protected $urlGenerator;

    /**
     * @var Request
     */
    protected $request;

    public function __construct(UrlGenerator $urlGenerator, Request $request)
    {
        $this->urlGenerator = $urlGenerator;
        $this->request = $request;
    }

    /**
     * Creates a new Menu instance.
     *
     * @return Menu
     */
    public function make()
    {
        $rootMenuItem = new RootMenuItem;

        $menu = (new Menu($rootMenuItem))
            ->setUrlGenerator($this->urlGenerator)
            ->setCurrentUrl($this->request->url());

        $rootMenuItem->setContainer($menu);

        return $menu;
    }
}
