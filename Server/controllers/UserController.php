<?php
include_once("../models/user.php");
class UserController  extends User
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
        $username = $data->username;
        $password = $data->password;
        return $this->creator->login($username, $password);
    }
}
