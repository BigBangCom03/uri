<?php

declare(strict_types=1);

namespace Sabre\Uri;

class SplitTest extends \PHPUnit\Framework\TestCase
{
    public function testSplit()
    {
        $strings = [
            // input                    // expected result
            '/foo/bar' => ['/foo', 'bar'],
            '/foo/bar/' => ['/foo', 'bar'],
            'foo/bar/' => ['foo', 'bar'],
            'foo/bar' => ['foo', 'bar'],
            'foo/bar/baz' => ['foo/bar', 'baz'],
            'foo/bar/baz/' => ['foo/bar', 'baz'],
            'foo' => ['', 'foo'],
            'foo/' => ['', 'foo'],
            '/foo/' => ['', 'foo'],
            '/foo' => ['', 'foo'],
            '' => [null, null],

            // UTF-8
            "/\xC3\xA0fo\xC3\xB3/bar" => ["/\xC3\xA0fo\xC3\xB3", 'bar'],
            "/\xC3\xA0foo/b\xC3\xBCr/" => ["/\xC3\xA0foo", "b\xC3\xBCr"],
            "foo/\xC3\xA0\xC3\xBCr" => ['foo', "\xC3\xA0\xC3\xBCr"],
        ];

        foreach ($strings as $input => $expected) {
            $output = split($input);
            $this->assertEquals($expected, $output, 'The expected output for \''.$input.'\' was incorrect');
        }
    }
}
