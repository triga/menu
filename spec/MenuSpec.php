<?php namespace spec\Triga\Menu;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use Triga\Menu\Item\MenuItem;
use Triga\Menu\Item\RootMenuItem;
use Illuminate\Routing\UrlGenerator;

class MenuSpec extends ObjectBehavior
{
    function let(UrlGenerator $urlGenerator)
    {
        $this->beConstructedWith($urlGenerator, new RootMenuItem($urlGenerator->getWrappedObject()));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Triga\Menu\Menu');
    }

    function it_should_register_routes_by_names(UrlGenerator $urlGenerator)
    {
        $urlGenerator->route('foo', [])->willReturn('http://foo.com');

        $this->addRoute('foo');

        $expected = [
            'foo' => new MenuItem('http://foo.com'),
        ];

        $this->getItems()->shouldBeLike($expected);
    }

    function it_should_register_routes_with_params(UrlGenerator $urlGenerator)
    {
        $urlGenerator->route('foo', ['name' => 'fen'])->willReturn('http://foo.com/fen');

        $this->addRoute('foo', ['name' => 'fen']);

        $expected = [
            'foo' => new MenuItem('http://foo.com/fen'),
        ];

        $this->getItems()->shouldBeLike($expected);
    }

    function it_should_register_urls()
    {
        $this->addUrl('bar', 'http://bar.com');

        $expected = [
            'bar' => new MenuItem('http://bar.com'),
        ];

        $this->getItems()->shouldBeLike($expected);
    }
}
