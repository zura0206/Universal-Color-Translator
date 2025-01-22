<?php

namespace Habib\Translator\Tests;

// Import PHPUnit's TestCase class so we can write tests
use PHPUnit\Framework\TestCase;
// Import the AdminTranslator class, which contains the logic we want to test
use Habib\AdminTranslator\AdminTranslator;

class AdminTranslatorTest extends TestCase
{
    /**
     * Test case to verify that valid colors return the correct hex code.
     */
    public function testValidColors()
    {
        // Create an instance of the AdminTranslator class.
        $adminTranslator = new AdminTranslator(); 

        // Use reflection to access the private $colors property in the AdminTranslator class.
        $reflection = new \ReflectionClass($adminTranslator);
        
        // Get the private 'colors' property from the AdminTranslator class using reflection
        $colorsProperty = $reflection->getProperty('colors');
        
        // Make the 'colors' property accessible, even though it's private
        $colorsProperty->setAccessible(true); 
        
        // Get the actual value of the 'colors' property (which contains color names and their hex codes)
        $colors = $colorsProperty->getValue($adminTranslator); 

        // Loop through each color and its corresponding hex code
        foreach ($colors as $color => $hex) {
            // Print out the color and hex code being tested
            echo "Testing color: $color with expected hex code: $hex\n";

            // For each color, use PHPUnit's assertEquals method to check if the expected hex code
            // matches the actual hex code returned by the getHexColor method.
            // If the test fails, the message will show which color failed.
            $this->assertEquals($hex, $adminTranslator->getHexColor($color), "Failed for color: $color");
        }
    }

    /**
     * Test case to check if an invalid color name returns the correct error message.
     */
    public function testInvalidColor()
    {
        // Create an instance of the AdminTranslator class.
        $adminTranslator = new AdminTranslator(); 

        // Testing an invalid color name
        $colorName = 'invalidColor';
        echo "Testing invalid color: $colorName\n";

        // Test with a color name that doesn't exist in the JSON file.
        // We expect the method to return 'Color not found!' in this case.
        $this->assertEquals('Color not found!', $adminTranslator->getHexColor($colorName));
    }

    /**
     * Test case to check how the translator handles an empty color input.
     */
    public function testEmptyColor()
    {
        // Create an instance of the AdminTranslator class.
        $adminTranslator = new AdminTranslator();

        // Testing with an empty color input
        $colorName = '';
        echo "Testing empty color input: '$colorName'\n";

        // Test with an empty color string.
        // The translator should return 'Color not found!' when no color is provided.
        $this->assertEquals('Color not found!', $adminTranslator->getHexColor($colorName));
    }
}
