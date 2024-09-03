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

    /**
     * Imports all required files at once
     * @return void This injects the content directly to html
    */
    public function includeALL(){
        $this->openStyleTag();
        include_once __DIR__ . "/c3-0.7.20/c3.css";
        $this->closeStyleTag();
        $this->openScriptTag();
        include_once __DIR__ . "/c3-0.7.20/c3.min.js";
        $this->closeScriptTag();
        $this->openScriptTag();
        include_once __DIR__ . "/d3v5/d3.min.js";
        $this->closeScriptTag();
        echo '
        ';
    }
    
    private function openStyleTag(){
        echo "<style>";
    }

    private function closeStyleTag(){
        echo "</style>";
    }

    private function openScriptTag(){
        echo "<script>";
    }

    private function closeScriptTag(){
        echo "</script>";
    }
}
?>