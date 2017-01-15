<?php
/**
 * Description of MY_Controller
 *
 * @author nayosx
 */
class MY_Controller extends CI_Controller{
    //put your code here
    const STATUS = "status";
    const MSG = "msg";
    const ERROR = "error";
    protected $response = array();
    protected $isNeedEncryptId;
    protected $data = array();
    
    protected $update = array();
    protected $create = array();
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/El_Salvador");
        $this->response = array(self::STATUS => FALSE, self::MSG => "", self::ERROR => FALSE);
        $this->isNeedEncryptId = FALSE;
//        if(!$this->session->valid){
//            redirect();
//        }
    }
    
    protected function setResponseOK($msg = ''){
        $this->response[self::STATUS] = TRUE;
        $this->response[self::MSG] = $msg;
    }
    
    protected function setResponseFail($msg = ''){
        $this->response[self::MSG] = $msg;
    }
}