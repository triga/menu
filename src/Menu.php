<?php namespace Triga\Menu;

use Illuminate\Routing\UrlGenerator;

class Menu
{

    /**
     * @var array
     */
    protected $items;

    /**
     * @var UrlGenerator
     */
    protected $urlGenerator;

    public function __construct(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function addRoute($routeName, array $params = [])
    {
        $this->items[$routeName] = $this->urlGenerator->route($routeName, $params);
    }

    public function addUrl($name, $url)
    {
        $this->items[$name] = $url;
    }

    public function getParsedUrls()
    {
        return $this->items;
    }
}
