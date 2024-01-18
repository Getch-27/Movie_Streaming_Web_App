<?php
include_once("../models/Creator.php");
class CreatorController extends Creator
{
    private $creator;

    //pass username and password to creator model
    public function controllogin($data)
    {
        
        return $this->creator->creatorLogin($data);
    }
}
