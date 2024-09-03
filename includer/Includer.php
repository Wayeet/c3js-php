<?php
namespace Util;
/**
 * Can be used to import the correct versions of d3 and c3
 */
class Includer {
    private $dir;

    /**
     * @param string $dir Pass the __DIR__ global
     */
    public function __construct(string $dir){
        $this->dir = $dir;
    }

    private function getCWD(){
        return $this->dir.'/vendor/wayeet/c3js-php/includer';
    }
    /**
     * Imports required CSS files
     * @return void This injects the imports directly to html
     */
    public function includeCSS(){
        echo '
        <link href="'.$this->getCWD().'/c3-0.7.20/c3.css" rel="stylesheet">
        ';
    }
    /**
     * Imports required JS files
     * @return void This injects the imports directly to html
    */
    public function includeJS(){
        echo '
        <script src="'.$this->getCWD().'/c3-0.7.20/c3.min.js"></script>
        <script src="'.$this->getCWD().'/d3v5/d3.min.js" charset="utf-8"></script>
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