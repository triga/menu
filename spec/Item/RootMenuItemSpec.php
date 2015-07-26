<?php namespace spec\Triga\Menu\Item;

use Triga\Menu\Menu;
use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use Illuminate\Routing\UrlGenerator;

class RootMenuItemSpec extends ObjectBehavior
{
    function let(Menu $container, UrlGenerator $urlGenerator)
    {
        $container->getUrlGenerator()->willReturn($urlGenerator);

        $this->setContainer($container);
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

        $menuItem = $this->addRoute('foo', 'label');

        $expected = [
            'foo' => $menuItem,
        ];

        $this->getItems()->shouldBe($expected);
    }

    function it_should_register_routes_with_params(UrlGenerator $urlGenerator)
    {
        $urlGenerator->route('foo', ['name' => 'fen'])->willReturn('http://foo.com/fen');

        $menuItem = $this->addRoute('foo', 'label', ['name' => 'fen']);

        $expected = [
            'foo' => $menuItem,
        ];

        $this->getItems()->shouldBeLike($expected);
    }

    function it_should_register_urls()
    {
        $menuItem = $this->addUrl('bar', 'http://bar.com', 'label');

        $expected = [
            'bar' => $menuItem,
        ];

        $this->getItems()->shouldBeLike($expected);
    }
}
