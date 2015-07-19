<?php namespace Triga\Menu\Item;

/**
 * Menu item.
 *
 * @package Triga\Menu\Item
 */
class MenuItem extends RootMenuItem
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
