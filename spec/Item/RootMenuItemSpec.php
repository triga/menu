<?php namespace spec\Triga\Menu\Item;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use Illuminate\Routing\UrlGenerator;

class RootMenuItemSpec extends ObjectBehavior
{
    function let(UrlGenerator $urlGenerator)
    {
        $this->beConstructedWith($urlGenerator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Triga\Menu\Item\RootMenuItem');
    }

    function it_should_register_nested_routes()
    {

    }
}
