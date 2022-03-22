<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MY_Controller extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('geoip_lib');
        date_default_timezone_set('Asia/Colombo');
        $this->company_name = 'HexStyle | ';
        
        /*if ($_SERVER["HTTP_CF_IPCOUNTRY"]){
            $this->data['curCode'] = $_SERVER["HTTP_CF_IPCOUNTRY"];
        }else{
            $this->data['curCode'] = $this->geoip_lib->result_country_code();
        }
        
        $this->data['cur'] = 0.0058;
        $this->data['symbol'] = '$';
        $this->load->vars($this->data);*/
    }

    // function get_encrypted_password($password) {
    //     $options = [
    //             'cost' => 10
    //         ];
    //         return password_hash($password, PASSWORD_BCRYPT, $options);
    // }
}

