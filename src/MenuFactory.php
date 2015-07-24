<?php namespace Triga\Menu;

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

    public function __construct(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * Creates a new Menu instance.
     *
     * @return Menu
     */
    public function make()
    {
        $rootMenuItem = new RootMenuItem;
        $rootMenuItem->setUrlGenerator($this->urlGenerator);

        return new Menu($rootMenuItem);
    }
}
