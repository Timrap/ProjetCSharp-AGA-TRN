<?php

class Pictures
{


private string $name;
private int $size;
private string $accessPath;
private string $imageFormat;
private string $tag;
private string $description;
private string $space;
private DateTime $releasedate;
private int $deleted;
private array $users = array();

public function  __construct(string $name,int $size,string $accessPath,string $imageFormat,string $tag,string $description,string $space, $users, DateTime $releasedate,int $deleted)
{
    $this->name = $name;
    $this->size = $size;
    $this->accessPath = $accessPath;
    $this->imageFormat = $imageFormat;
    $this->tag = $tag;
    $this->description = $description;
    $this->space = $space;
    $this->releasedate = $releasedate;
    $this->deleted = $deleted;
    $this->users = $users;
}


public function GetName()
{
    return $this->name;
}


public  function GetSize()
{
    return $this->size;
}

public function GetAccessPath()
{
    return $this->accessPath;
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

public function GetUsers()
{
    return $this->users;
}

public  function  SetReleasedate()
{
    return  $this->releasedate;
}


    public function SetAttributes($description, $imgPath)
    {
        $this->description = $description;
        $this->imgPath = $imgPath;
    }

}