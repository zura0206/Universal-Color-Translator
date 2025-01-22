<?php

namespace Habib\Translator;

class Translator {
    private $colors;

    public function __construct() {
        $this->colors = include 'colors.php'; 
    }

    public function getHexCode($colorName) {
        return $this->colors[strtolower(trim($colorName))] ?? 'Color not found!';
    }
}
