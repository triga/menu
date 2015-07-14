<?php namespace spec\Triga\Menu;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use Illuminate\Routing\UrlGenerator;

class MenuSpec extends ObjectBehavior
{
    function let(UrlGenerator $urlGenerator)
    {
        $this->beConstructedWith($urlGenerator);
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
            'foo' => 'http://foo.com',
        ];

        $this->getParsedUrls()->shouldBe($expected);
    }

    function it_should_register_routes_with_params(UrlGenerator $urlGenerator)
    {
        $urlGenerator->route('foo', ['name' => 'fen'])->willReturn('http://foo.com/fen');

        $this->addRoute('foo', ['name' => 'fen']);

        $expected = [
            'foo' => 'http://foo.com/fen',
        ];

        $this->getParsedUrls()->shouldBe($expected);
    }

    function it_should_register_urls()
    {
        $this->addUrl('bar', 'http://bar.com');

        $expected = [
            'bar' => 'http://bar.com',
        ];

        $this->getParsedUrls()->shouldBe($expected);
    }
}
