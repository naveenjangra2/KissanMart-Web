<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonControl extends Front_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Common_modal");
    }

    function getRegion()
    {
        $country = $this->input->post('country');
        $result = $this->Common_modal->getRegion($country);
        echo json_encode($result);
    }

    function getCities()
    {
        $region= $this->input->post('region');
        $result = $this->Common_modal->getCities($region);
        echo json_encode($result);
    }

    function checkDBfields(){
        $input = $_GET['input'];
        $result = $this->Common_modal->checkField($_GET['table'],$_GET['data'],$_GET[$input]);
        if($result){ 
            echo http_response_code(418);
        }else{ 
            echo http_response_code(200);
        }
    }
    
    function checkDBfieldOpt(){
        $input = $_GET['input'];
        $result = $this->Common_modal->checkField($_GET['table'],$_GET['data'],$_GET[$input]);
        if($result){ 
            echo http_response_code(200);
        }else{ 
            echo http_response_code(418);
        }
    }
}
