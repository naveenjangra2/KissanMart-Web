<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_access extends Front_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("AccountModal");
        $this->load->model("CommonModal");
    }

    public function custSignup() {
    	try{
			$acType=($this->input->post('acType'));
			$accName=($this->input->post('accName'));
			$accAddress=($this->input->post('accAddress'));
			$accDistrict=($this->input->post('accDistrict'));
			$accCity=($this->input->post('accCity'));
			$accMobile=($this->input->post('accMobile'));
			$accEmail=($this->input->post('accEmail'));
			$accUsername=($this->input->post('accUsername'));
			$accPass=$this->get_encrypted_password(trim($this->input->post('accPass')));
			$ip = $this->input->ip_address();
			$date = date("Y-m-d H:i:s");

			$cust_array = array(
				'account_type' => $acType,
				'cust_name' => $accName,
				'phone' => $accMobile,
				'email' => $accEmail,
				'username' => $accUsername,
				'password' => $accPass,
				'date' => $date,
				'ip_add' => $ip
			);
			$inserted_id = $this->CommonModal->insert('customers',$cust_array);
			
            if ($acType==0) {
                $acType='Personal';
            }else{
                $acType='Business';
            }
			$add_array = array(
				'cust_id' => $inserted_id,
				'name' => $accName,
				'address' => $accAddress,
				'district_id' => $accDistrict,
				'city_id' => $accCity,
				'phone' => $accMobile
			);
            $add_array['address_type'] = $acType;
			$this->CommonModal->insert('cust_address',$add_array);
            $add_array['address_type'] = "Billing";
            $this->CommonModal->insert('cust_address',$add_array);
            $add_array['address_type'] = "Pickup";
            $this->CommonModal->insert('cust_address',$add_array);

			echo json_encode('success');
		}catch(Exception $ex){
            $this->handle_error("500",$ex->getMessage());
        }
    }

    public function custSignin(){
    	$username= trim($this->input->post('logUsername'));
        $password= $this->input->post('logPass');
        try{
            $result = $this->CommonModal->getAllWhere('customers','username',$username);
            if($result){
            	if($result->status==1 && password_verify($password, $result->password)){
	        	 	$log_array = array();
			    	$log_array = array(
				        'id' => $result->cust_id,
				        'name' => $result->cust_name,
				        'image' => $result->image,
                        'acType' => $result->account_type,
                        'points' => $result->points,
				        'username' => $result->username,
                        'retUrl' => ''
			       	);
		    		$this->session->set_userdata('logged_in', $log_array);
                    $message = array("status" => "success","message" => "myaccount");
             	}else if(!password_verify($password, $result->password)){
	                $message = array("status" => "failed","message" => "Invalid Password. Try again.");
             	}else{
	                $message = array("status" => "failed","message" => "User blocked. Please contact Administrator.");
             	}
            }else{
                $message = array("status"=>"failed","message"=>"Invalid Username. User not exists.");
            }
            echo json_encode($message);
        }catch(Exception $ex){
            $this->handle_error("500",$ex->getMessage());
        }
    }

    public function checkDBfields(){
    	$input = $_GET['input'];
    	$result = $this->CommonModal->checkField($_GET['table'],$_GET['data'],$_GET[$input]);
    	if($result){ 
    		echo http_response_code(418);
    	}else{ 
    		echo http_response_code(200);
    	}
    }

    public function checkLogUsername(){
    	$input = $_GET['input'];
    	$result = $this->CommonModal->checkField($_GET['table'],$_GET['data'],$_GET[$input]);
    	if($result){ 
    		echo http_response_code(200);
    	}else{ 
    		echo http_response_code(418);
    	}
    }

    public function checkLogPass(){
    	$password = $_GET['currentPass'];
    	$id = $this->session->userdata['logged_in']['id'];
    	$result = $this->CommonModal->getSingleField('customers','password','cust_id', $id);
    	if(password_verify($password, $result->password)){ 
    		echo http_response_code(200);
    	}else{ 
    		echo http_response_code(418);
    	}
    }

    public function destroyLogin()
	{
		if($this->session->userdata('logged_in')!=null){
            if ($this->session->userdata['logged_in']['retUrl']=='back-office') {
                $sess_array = array(
                    'id' => '',
                    'name' => '',
                    'image' => '',
                    'acType' => '',
                    'username' => '',
                    'retUrl' => ''
                );
                $this->session->unset_userdata($sess_array);
                echo "<script>window.close();</script>";
            }else{
                $sess_array = array(
                    'id' => '',
                    'name' => '',
                    'image' => '',
                    'acType' => '',
                    'username' => '',
                    'retUrl' => ''
                );
                $this->session->unset_userdata($sess_array);
                $this->session->sess_destroy();
                $this->clear_cache();
                redirect(base_url()); 
            }
		}
	}

	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
}
