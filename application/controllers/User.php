<?php
/**
 * Description of User
 *
 * @author nayosx
 */
class User extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        show_404();
    }

    public function viewAdd(){
        $this->load->view('forms/add');
    }
    
    public function viewUsers(){
        $this->load->view('forms/list');
    }
}
