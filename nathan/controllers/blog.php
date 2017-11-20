<?php
/* 
 * Project: Nathan MVC
 * File: /controllers/home.php
 * Purpose: controller for the home of the app.
 * Author: Nathan Davison
 */

class BlogController extends BaseController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        //create the model object
        require("models/blog.php");
        $this->model = new BlogModel();
    }
    
    //default method
    protected function index()
    {
        $this->view->output($this->model->index());
    }
}

?>
