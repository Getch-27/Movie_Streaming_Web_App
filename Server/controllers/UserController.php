<?php

include('../../models/User.php');
class UserController extends User 
{
    private $creator;
    //pass username and password to creator model
    public function userlogin($data){
         $data = $this->login($data);
         return $data;
    }
}
?>