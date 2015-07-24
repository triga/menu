<?php namespace spec\Triga\Menu\Item;

use Illuminate\Routing\UrlGenerator;
use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use Triga\Menu\Item\MenuItem;

class RootMenuItemSpec extends ObjectBehavior
{
    function let(UrlGenerator $urlGenerator)
    {
        $this->setUrlGenerator($urlGenerator);
    }

    function it_should_register_nested_routes()
    {
        $this->addUrl('foo', 'http://foo.bar', 'foo');
        $this->addUrl('bar', 'http://bar.baz', 'bar')
            ->addUrl('nested', 'http://lol.wat', 'baz');

        $this->getItems()->shouldHaveCount(2);
    }

    function it_should_register_routes_by_names(UrlGenerator $urlGenerator)
    {
        $urlGenerator->route('foo', [])->willReturn('http://foo.com');

        $this->addRoute('foo', 'label');

        $expected = [
            'foo' => new MenuItem('http://foo.com', 'label'),
        ];

        $this->getItems()->shouldBeLike($expected);
    }

    function it_should_register_routes_with_params(UrlGenerator $urlGenerator)
    {
        $urlGenerator->route('foo', ['name' => 'fen'])->willReturn('http://foo.com/fen');

        $this->addRoute('foo', 'label', ['name' => 'fen']);

        $expected = [
            'foo' => new MenuItem('http://foo.com/fen', 'label'),
        ];

        $this->getItems()->shouldBeLike($expected);
    }

    function it_should_register_urls()
    {
        $this->addUrl('bar', 'http://bar.com', 'label');

        $expected = [
            'bar' => new MenuItem('http://bar.com', 'label'),
        ];

        $this->getItems()->shouldBeLike($expected);
    }
}
