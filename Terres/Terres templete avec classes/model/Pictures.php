<?php

class Pictures
{
private string $name;
private string $size;
private string $imgPath;
private string $tag;
private string $description;
private string $space;
private array $users = array();
private DateTime $releasedate;

public function  __construct($name)
{
    $this->name = $name;
}


public function GetName()
{
    return $this->name;
}


public  function GetSize()
{
    return $this->size;
}

public function GetImgPath()
{
    return $this->imgPath;
}

public function GetTag()
{
    return $this->tag;
}

public function GetDescription()
{
    $this->description;
}

public function GetSpace()
{
    return $this->space;
}

    public function SetAttributes($description, $imgPath)
    {
        $this->description = $description;
        $this->imgPath = $imgPath;
    }
}