<?php namespace spec\Triga\Menu\Item;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;

class RootMenuItemSpec extends ObjectBehavior
{

    function it_should_register_nested_routes()
    {
        $this->addUrl('foo', 'http://foo.bar');
        $this->addUrl('bar', 'http://bar.baz')
            ->addUrl('nested', 'http://lol.wat');

        $this->getItems()->shouldHaveCount(2);
    }
}
