<?php

/**
 * Project :            Terres
 * Class :              Pictures
 * Developer :          Timothée RAPIN
 * Creation date :      30.11.2021
 * Modification date :  02.12.2021
 * Version :            0.1
 */

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
    /**
     * This function is the constructor
     * @param $name
     * @param $size
     * @param $tag
     * @param $space
     * @param $users
     * @param $releaseDate
     */
    public function Pictures($name, $size, $tag, $space, $users, $releaseDate){
        $_name = $name;
        $_size = $size;
        $_tage = $tag;
        $_space = $space;
        $_users = $users;
        $_releaseDate = $releaseDate;
    }

    /**
     *
     */
    public function IfExist(){

    }
    //</editor-fold>

    //<editor-fold desc="private methods">

    //</editor-fold>
}