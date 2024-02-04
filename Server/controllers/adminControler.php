<?php
include_once("../../models/Admin.php");
class adminController extends Admin
{
    private $creator;

    //pass username and password to creator model
    public function adminLoginCont($data)
    {
        
        return $this->adminLogin($data);
    }
}