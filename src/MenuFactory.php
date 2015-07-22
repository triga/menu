<?php namespace Triga\Menu;

use Triga\Menu\Item\RootMenuItem;
use Illuminate\Routing\UrlGenerator;

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

    public function make()
    {
        $rootMenuItem = new RootMenuItem;
        $rootMenuItem->setUrlGenerator($this->urlGenerator);

        return new Menu($rootMenuItem);
    }
}
