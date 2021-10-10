<?php

/*
* Description of Status: A státuszokat kezelő kontroller
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
      $this->load->library('form_validation');

      $this->form_validation->set_rules('status_name', 'Státusz neve', 'required|min_length[2]');



      if ($this->form_validation->run() == TRUE) {
        $nev = $this->input->post('status_name');
        $this->status_model->insert($nev);
        // eredmény ellenőrzése
        redirect(base_url('status/list'));
      }
      else {
        $this->load->helper('form');
        $this->load->view('status/add');
      }
  }

  public function update($status_id = NULL) {
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

      $this->load->library('form_validation');
      $this->form_validation->set_rules('status_name', 'Státusz neve', 'required|min_length[2]');

      if($this->form_validation->run() == TRUE) {
        $nev = $this->input->post('status_name');

        if($this->status_model->update($status_id, $nev)) {
          redirect(base_url('status/list'));
        }
        else {
          show_error('Sikertelen módosítás');
        }
      }
      else {
        $view_params = [
          'record' => $record
        ];
        $this->load->helper('form');
        $this->load->view('status/edit', $view_params);
      }


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
