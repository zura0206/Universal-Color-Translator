<?php

namespace Habib\AdminTranslator;

class AdminTranslator
{
    private $colors = [];

    public function __construct()
    {
        // Load colors from a JSON file (or database)
        $this->colors = json_decode(file_get_contents('./admin/colors.json'), true);
    }

    // Function to get the hex code of a color name
    public function getHexColor($colorName)
    {
        return $this->colors[strtolower(trim($colorName))] ?? 'Color not found!';
    }
}
