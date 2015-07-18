<?php namespace Triga\Menu\Item;

class MenuItem
{

    /**
     * @var string
     */
    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }
}
