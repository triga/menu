<?php namespace Triga\Menu\Item;

/**
 * Menu item.
 *
 * @package Triga\Menu\Item
 */
class MenuItem extends RootMenuItem
{

    /**
     * URL of the item.
     *
     * @var string
     */
    protected $url;

    /**
     * Item's label (title).
     *
     * @var
     */
    protected $label;

    /**
     * Item's icon (Font Awesome icons are used by default template).
     *
     * @var null
     */
    protected $icon;

    /**
     * Item's identifier. Used by the template's JS to toggle nested menu items.
     *
     * @var string
     */
    protected $id;

    public function __construct($url, $label, $icon = null)
    {
        $this->url = $url;
        $this->label = $label;
        $this->icon = $icon;
        $this->id = md5($url);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string|null
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    public function isActive()
    {
        return $this->getContainer()->getCurrentUrl() === $this->url;
    }
}
