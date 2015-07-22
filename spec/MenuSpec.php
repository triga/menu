<?php namespace spec\Triga\Menu;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use Triga\Menu\Item\RootMenuItem;

class MenuSpec extends ObjectBehavior
{
    function let(RootMenuItem $rootMenuItem)
    {
        $this->beConstructedWith($rootMenuItem);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Triga\Menu\Menu');
    }

    function it_should_add_route(RootMenuItem $rootMenuItem)
    {
        $rootMenuItem->addRoute($routeName = 'foo', $params = ['foo' => 'bar'])->shouldBeCalled();

        $this->addRoute($routeName, $params);
    }

    function it_should_add_url(RootMenuItem $rootMenuItem)
    {
        $rootMenuItem->addUrl($routeName = 'foo', $url = 'http://lol.wut')->shouldBeCalled();

        $this->addUrl($routeName, $url);
    }

    function it_should_return_items(RootMenuItem $rootMenuItem)
    {
        $rootMenuItem->getItems()->shouldBeCalled()->willReturn($expected = ['foo' => 'bar']);

        $this->getItems()->shouldBe($expected);
    }
}
