<?php

/*
* Description of county: A megyéket kezelő kontroller
*
* @author Kovács Norbert
*/

class Status extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model('status_model');
    $this->load->helper('url');
  }

  public function index() {
    echo 'index page of status';
  }


  public function list() {
    $view_params = [
      'title'      => 'Státuszok listája',
      'records'    => $this->status_model->get_list()
    ];
    $this->load->view('status/list', $view_params);
  }

  public function insert() {
      if ($this->input->post()) {
        echo 'feldolgozás';
      }
      else {
        $this->load->helper('form');
        $this->load->view('status/add');
      }


  }

  public function update() {
      echo 'update';
  }

  public function delete($status_id = NULL) {
      if($status_id == NULL) {
          redirect(base_url('status/list'));
      }

      if(!is_numeric($status_id)) {
          redirect(base_url('status/list'));
      }

      $record = $this->status_model->get_one($status_id);

      if($record == NULL || empty($record)) {
          redirect(base_url('status/list'));
      }

      if($this->status_model->delete($status_id)) {
          redirect(base_url('status/list'));
      }
      else {
          show_error('A törlés sikertelen!');
      }
  }



}
