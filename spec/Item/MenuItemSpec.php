<?php namespace spec\Triga\Menu\Item;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MenuItemSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Triga\Menu\Item\MenuItem');
    }

    function it_should_have_working_getters()
    {
        /**
         * @todo Test URL, label and icon. What about the "active" class? Think about nested items.
         */
    }
}
