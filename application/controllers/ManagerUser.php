<?php
/**
 * Description of ManagerUser
 *
 * @author nayosx
 */
class ManagerUser extends MY_Controller{
    
    private $username = '';
    private $password = '';
    private $mail = '';
    private $idUsuario = 0;
    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }
    
    public function add(){
        $this->_setParamstToCreate();
        $this->idUsuario = $this->usuario_model->create($this->create);
        if($this->idUsuario > 0){
            $this->setResponseOK('Se creo el usuario correctamente');
        } else {
            $this->setResponseFail('No se a podido crear el usuario');
        }
        
        $this->output->set_content_type('application/json');
        echo json_encode($this->response);
    }
    
    public function users(){
        $this->data = $this->usuario_model->selectAll();
        $this->response['data'] = $this->data;
        
        $this->output->set_content_type('application/json');
        echo json_encode($this->response);
    }
    
    private function _setParamstToCreate(){
        $this->username = $this->input->post('username');
        $this->mail = $this->input->post('mail');
        $this->password = $this->input->post('password');
        
        $this->create = array(
            'nombre' => $this->username,
            'correo' => $this->mail,
            'contrasena' => $this->password,
            'date_crea' => date('Y-m-d H:i:s')
        );
    }
}
