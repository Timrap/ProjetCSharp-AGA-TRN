<?php

namespace Pictures;

class Pictures
{
    //<editor-fold desc="private attributes">
    private $_name;
    private $_size;
    private $_tag;
    private $_space;
    private $_users;
    private $_releaseDate;
    //</editor-fold>

    //<editor-fold desc="public methods">
    public function Pictures($name, $size, $tag, $space, $users, $releaseDate){
        $_name = $name;
        $_size = $size;
        $_tage = $tag;
        $_space = $space;
        $_users = $users;
        $_releaseDate = $releaseDate;
    }
    //</editor-fold>

    //<editor-fold desc="private methods">

    //</editor-fold>
}