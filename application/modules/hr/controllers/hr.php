<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Hr extends MX_Controller {
    public function __construct() {
        parent::__construct();
        
   if (!$this->ion_auth->logged_in()) {
       $this->load->module('user');
        redirect('user/login');
   } else {     
   }
         
        
    }
    public function add(){
        if($_POST){
            $data=array($this->input->post('employee'));
            $this->hr_model->insertEmployee($data);
            redirect('hr/view');
        }
        else{
        $this->load->view('addemployee');
        }
    }
	
        }

?>