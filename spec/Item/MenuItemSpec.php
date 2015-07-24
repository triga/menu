<?php namespace spec\Triga\Menu\Item;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MenuItemSpec extends ObjectBehavior
{
    function it_should_have_working_getters()
    {
        $this->beConstructedWith($url = 'http://foo.bar', $label = 'Label', $icon = 'fa-dashboard');

        $this->getUrl()->shouldBe($url);
        $this->getLabel()->shouldBe($label);
        $this->getIcon()->shouldBe($icon);

        /**
         * @todo What about the "active" class? Think about nested items.
         */
    }
}
