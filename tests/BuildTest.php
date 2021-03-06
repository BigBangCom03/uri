<?php

declare(strict_types=1);

namespace Sabre\Uri;

class BuildTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider buildUriData
     */
    public function testBuild($value)
    {
        $this->assertEquals(
            $value,
            build(parse_url($value))
        );
    }

    public function buildUriData()
    {
        return [
            ['http://example.org/'],
            ['http://example.org/foo/bar'],
            ['//example.org/foo/bar'],
            ['/foo/bar'],
            ['http://example.org:81/'],
            ['http://user@example.org:81/'],
            ['http://example.org:81/hi?a=b'],
            ['http://example.org:81/hi?a=b#c=d'],
            // [ '//example.org:81/hi?a=b#c=d'], // Currently fails due to a
            // PHP bug.
            ['/hi?a=b#c=d'],
            ['?a=b#c=d'],
            ['#c=d'],
            ['file:///etc/hosts'],
            ['file://localhost/etc/hosts'],
        ];
    }
}
