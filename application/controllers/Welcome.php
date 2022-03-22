<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends Front_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Front_modal");
        $this->load->model("Common_modal");
        $data['crops'] = $this->Common_modal->getAllMultipleWhere('crops','status',1);
        $this->load->vars($data);

    }
    function clear_cache(){
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
    public function index() {
        $data['page'] = 'home';
        $this->load->view('home', $data);
    }
    public function not_found() {
        $this->load->view('not_found');
    }
    public function marketplace()
    {
        $this->load->view('marketplace');
    }
    public function Singup(){
        try {
            $data['lang'] = $this->input->post('lang'); 
            $data['user_type'] = $this->input->post('type'); 
            $data['name'] = $this->input->post('name'); 
            $data['loc'] = $this->input->post('loc'); 
            $data['number_of_years'] = $this->input->post('number_of_years'); 
            $data['area'] = $this->input->post('area'); 
            $data['crops'] = $this->input->post('crops'); 
            $data['mobile'] = $this->input->post('phone'); 
            $data['pass'] = $this->input->post('pass');  
            $data['otp'] = $this->input->post('otp');
            $options = [
                'cost' => 10
            ];
            $data['password'] = password_hash(trim($data['pass']), PASSWORD_BCRYPT, $options);
            
            // verify user otp
            $verify_otp = $this->Front_modal->otp_verification($data['mobile'], $data['otp']);

            if ($verify_otp) {
                $insert_user = array(
                    "name" => $data['name'],
                    "mobile" => $data['mobile'],
                    "lang" => $data['lang'],
                    "password" => $data['password'],
                    "user_type" => $data['user_type'],
                    "years" => $data['number_of_years'],
                    "area" => $data['area'],
                    "crops" => $data['crops'],
                    "date" => date("Y-m-d h:i:sa")
                );
                if ($data['user_type'] == 1) {
                    $insert_user['status'] = 0;
                }else{
                    $insert_user['status'] = 1;
                }
                $signedUp = $this->Common_modal->insert('staff_users', $insert_user);
                if ($signedUp) {
                    $data['res'] = array("status"=>"success","message"=>"user added successfully");
                }else{
                    $data['res'] = array("status"=>"error","message"=>"User not added");
                }
                
            }else{
                $data['res'] = array("status"=>"error","message"=>"Invalid OTP number");
            }

        }catch(Exception $e){
            $data['res'] = array("status"=>"error","message"=>$e->getMessage());
        }

        echo json_encode($data);
    }  
    public function getOTP(){
        try {
            $data['phone'] = $this->input->post('phone'); 
            $data['otp'] = '';
            $data['date'] = date("Y-m-d h:i:sa");
            $data['status'] = 1;

            $result = $this->Front_modal->verify_mobile($data['phone']);
            if ($result) {
                throw new Exception("Enter valid number");
            }else {
                $opt = "1357902468";
                for ($i = 1; $i <= 5; $i++) {
                    $data['otp'] .= substr($opt, (rand()%(strlen($opt))), 1);
                }
                $insert_otp = $this->Front_modal->insert_otp($data['phone'], $data);
                if ($insert_otp) {
                    $data['res'] = array("status"=>"success","message"=>"OTP is sent to your number ");
                }else{
                    $data['res'] = array("status"=>"error","message"=>"New OTP sent to your number ");
                }
            }

        } catch (Exception $e) {
            $data['res'] = array("status"=>"error","message"=>$e->getMessage());
        }
        echo json_encode($data);
    }
}