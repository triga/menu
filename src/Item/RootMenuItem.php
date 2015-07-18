<?php namespace Triga\Menu\Item;

use Illuminate\Routing\UrlGenerator;

class RootMenuItem
{

    /**
     * @var UrlGenerator
     */
    protected $urlGenerator;

    /**
     * @var MenuItem[]
     */
    protected $items = [];

    public function __construct(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function addRoute($routeName, array $params = [])
    {
        $this->items[$routeName] = new MenuItem($this->urlGenerator->route($routeName, $params));

        return $this->items[$routeName];
    }

    public function addUrl($name, $url)
    {
        $this->items[$name] = new MenuItem($url);

        return $this->items[$name];
    }

    public function getItems()
    {
        return $this->items;
    }
}
