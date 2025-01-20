<?php

namespace Habib\Translator\Tests;

use PHPUnit\Framework\TestCase;
use Habib\Translator\Translator;

class TranslatorTest extends TestCase
{
    public function testValidColors()
    {
        $translator = new Translator(); // Create an instance of the Translator

        // Use reflection to get access to the private $colors property
        $reflection = new \ReflectionClass($translator);
        $colorsProperty = $reflection->getProperty('colors');
        $colorsProperty->setAccessible(true); // Allow access to private property
        $colors = $colorsProperty->getValue($translator); // Get the value of the $colors property

        // Loop through each color and verify the hex code
        foreach ($colors as $color => $hex) {
            $this->assertEquals($hex, $translator->getHexColor($color), "Failed for color: $color");
        }
    }

    public function testInvalidColor()
    {
        $translator = new Translator(); // Create an instance of the Translator

        // Test an invalid color name
        $this->assertEquals('Color not found!', $translator->getHexColor('invalidColor'));
    }
}
