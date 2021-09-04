<?php

/*
* Description of Institution: Az intézményeket kezelő kontroller
*
* @author Kovács Norbert
*/

class Institution extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('institution_model');
    }

    public function list() {

       $view_params = [
           'title'      => 'Intézmények listája',
           'records'    => $this->institution_model->get_list()
       ];

      $this->load->view('institution/list', $view_params);
    }

    public function insert() {
        echo 'insert';
    }

    public function update() {
        echo 'update';
    }

    public function delete() {
        echo 'delete';
    }
}
