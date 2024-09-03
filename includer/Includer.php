<?php
namespace Includer;
/**
 * Can be used to import the correct versions of d3 and c3
 */
class Includer {
    private $selfDir = __DIR__ . '/../../vendor/wayeet/c3js-php';
    public function __construct(){}

    /**
     * Imports required CSS files
     * @return void This injects the imports directly to html
     */
    public function includeCSS(){
        echo '
        <link href="'.$this->selfDir.'/c3-0.7.20/c3.css" rel="stylesheet">
        <script src="'.$this->selfDir.'/d3v5/d3.min.js" charset="utf-8"></script>
        ';
    }
    /**
     * Imports required JS files
     * @return void This injects the imports directly to html
    */
    public function includeJS(){
        echo '
        <script src="'.$this->selfDir.'/c3-0.7.20/c3.min.js"></script>
        ';
    }
    /**
     * Imports all required files at once
     * @return void This injects the imports directly to html
    */
    public function includeALL(){
        $this->includeCSS();
        $this->includeJS();
    }
}
?>