<?php

use PHPUnit\Framework\TestCase;
use Habib\Translator\Translator;

class TranslatorTest extends TestCase {
    private $translator;

    protected function setUp(): void {
        $this->translator = new Translator();
    }

    public function testGetHexCodeValidColor() {
        $color = 'red';
        $expectedHex = '#FF0000';
        
        // Print out the color and hex code being tested
        echo "Testing color: $color with expected hex code: $expectedHex\n";

        $this->assertEquals($expectedHex, $this->translator->getHexCode($color));
    }

    public function testGetHexCodeInvalidColor() {
        $color = 'invalidcolor';
        $expectedResult = 'Color not found!';
        
        // Print out the invalid color being tested
        echo "Testing invalid color: $color\n";

        $this->assertEquals($expectedResult, $this->translator->getHexCode($color));
    }

    // Optional added tests
    public function testGetHexCodeEmptyColor() {
        $color = '';
        $expectedResult = 'Color not found!';
        
        // Print out the empty color input being tested
        echo "Testing empty color input: '$color'\n";

        $this->assertEquals($expectedResult, $this->translator->getHexCode($color));
    }

    public function testGetHexCodeCaseInsensitive() {
        $color = 'RED';
        $expectedHex = '#FF0000';
        
        // Print out the case-insensitive test being tested
        echo "Testing color: $color with expected hex code: $expectedHex (case-insensitive)\n";

        $this->assertEquals($expectedHex, $this->translator->getHexCode($color));
    }

    public function testGetHexCodeWithSpaces() {
        $color = '  red  ';
        $expectedHex = '#FF0000';
        
        // Print out the color with spaces being tested
        echo "Testing color: '$color' with expected hex code: $expectedHex (with spaces)\n";

        $this->assertEquals($expectedHex, $this->translator->getHexCode($color));
    }
}
