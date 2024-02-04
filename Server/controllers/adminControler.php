<?php
include_once("../../models/Admin.php");
class adminController extends Admin
{
    

    //pass username and password to creator model
    public function adminLoginCont($data)
    {
        
        return $this->adminLogin($data);
    }
}