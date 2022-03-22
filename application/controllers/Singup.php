<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Singup extends Account_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model("Common_modal");
    }
    
    function clear_cache(){
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

    public function index(){
        echo json_encode("working");
    }

}