<?php
/* 
 * Project: Nathan MVC
 * File: /models/home.php
 * Purpose: model for the home controller.
 * Author: Nathan Davison
 */

class BlogModel extends BaseModel
{
    //data passed to the home index view
    public function index()
    {   
        $this->viewModel->set("pageTitle","Blog MVC");
        return $this->viewModel;
    }
	
	public static function getData(){
        return "Das Model gibt diese Daten an den Controller zur&uuml;ck :)";
	}    
}

?>
