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
    public function registerCon($data){
        return $this->register($data);
    }
    public function addToFavorite($watch_list_data){
        return $this->addFavorite($watch_list_data);
    }
    public function getWathlists($id){
        $user_id =$id->user_id;
        return $this->movieWathlists($user_id);
    }
}
