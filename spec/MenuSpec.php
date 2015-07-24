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
        $rootMenuItem->addRoute($routeName = 'foo', $label = 'label', $params = ['foo' => 'bar'], null)->shouldBeCalled();

        $this->addRoute($routeName, $label, $params, null);
    }

    function it_should_add_url(RootMenuItem $rootMenuItem)
    {
        $rootMenuItem->addUrl($routeName = 'foo', $url = 'http://lol.wut', $label = 'label', null)->shouldBeCalled();

        $this->addUrl($routeName, $url, $label, null);
    }

    function it_should_return_items(RootMenuItem $rootMenuItem)
    {
        $rootMenuItem->getItems()->shouldBeCalled()->willReturn($expected = ['foo' => 'bar']);

        $this->getItems()->shouldBe($expected);
    }
}
