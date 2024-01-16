<?php
include_once("../models/Creator.php");
class CreatorController extends Creator
{
    private $creator;
    // create a new creator objectand pass connection
    public function __construct($db)
    {
        $this->creator = new Creator($db);
    }
    //pass username and password to creator model
    public function login($data)
    {
        
        return $this->creator->creatorLogin($data);
    }
}
