<?php

/*
* Description of presentation: Az előadásokat kezelő kontroller
*
* @author Kovács Norbert
*/

class Presentation extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model('presentation_model');
    $this->load->model('institution_model');
    $this->lang->load('presentation');
  }

  public function index() {
    echo "index page of presentation";
  }

  public function list($presentation_id = NULL) {
    if($presentation_id == null) {
      $view_params = [
        'title'     => lang('presentation_title'),
        'records'   => $this->presentation_model->get_list()
      ];

      $this->load->view('presentation/list', $view_params);
    }
    else {
      if(!is_numeric($presentation_id)) {
          show_error('Nem megfelelő paramétertípus!');
      }
      $record = $this->presentation_model->get_one($presentation_id);

      if($record == NULL || empty($record)) {
        show_error('Az ID-vel nem létezik aktív rekort');
      }

      $view_params = [
          'title'  => 'Részletes rekordadatok',
          'record' => $record
      ];

      $this->load->view('presentation/show', $view_params);

    }
  }

  public function insert() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nev', 'Előadás neve', 'required');
    $this->form_validation->set_rules('idopont', 'Időpont', 'required');
    $this->form_validation->set_rules('allapot', 'Állapot (allapot)', 'required');
    $this->form_validation->set_rules('iskola', 'Intézmény', 'required');
    if($this->form_validation->run() == TRUE) {
      $nev = $this->input->post('nev');
      $idopont = $this->input->post('idopont');
      $allapot = $this->input->post('allapot');
      $iskola = $this->input->post('iskola');
      if($this->presentation_model->insert($nev, $idopont, $allapot, $iskola)) {
        redirect(base_url('presentation/list'));
      }
    }
    else {
      $this->load->helper('form');

      $list = $this->institution_model->get_list();
      $institutions = [];
      foreach($list as &$item) {
        $institutions[$item->id] = $item->nev;
      }

      $view_params = [
        'title'         => 'Előadás hozzáadása',
        'institutions'  => $institutions,
        'reconciled'    => [0 => 'Eggyeztetett', 1 => 'Még nem eggyeztetett', 2 => 'Sikeresen teljesített', 3 => 'Sikertelen']
      ];

      $this->load->view('presentation/add', $view_params);
    }
  }

  public function update($presentation_id = NULL) {
    if($presentation_id == NULL) {
      redirect(base_url('presentation/list'));
    }

    if(!is_numeric($presentation_id)) {
      redirect(base_url('presentation/list'));
    }

    $record = $this->presentation_model->get_one($presentation_id);
    if($record == NULL || empty($record)) {
      redirect(base_url('presentation/list'));
    }

    $this->load->library('form_validation');

    $this->form_validation->set_rules('nev', 'Előadás neve', 'required');
    $this->form_validation->set_rules('idopont', 'Időpont', 'required');
    $this->form_validation->set_rules('allapot', 'Állapot (allapot)', 'required');
    $this->form_validation->set_rules('iskola', 'Intézmény', 'required');

    if($this->form_validation->run() == TRUE) {
      $nev = $this->input->post('nev');
      $idopont = $this->input->post('idopont');
      $allapot = $this->input->post('allapot');
      $iskola = $this->input->post('iskola');
      if($this->presentation_model->update($presentation_id, $nev, $idopont, $allapot, $iskola)) {
        redirect(base_url('presentation/list'));
      }
      else {
        show_error(lang('unsuccesfull_edit'));
      }
    }
    else {

      $list = $this->institution_model->get_list();
      $institutions = [];
      foreach($list as &$item) {
        $institutions[$item->id] = $item->nev;
      }

      $view_params = [
        'title'         => 'Előadás módosítása',
        'record'        => $record,
        'institutions'  => $institutions,
        'reconciled'    => [0 => 'Eggyeztetett', 1 => 'Még nem eggyeztetett', 2 => 'Sikeresen teljesített', 3 => 'Sikertelen']
      ];

      $this->load->helper('form');
      $this->load->view('presentation/edit', $view_params);
    }

  }

  public function delete($presentation_id = NULL) {
    if($presentation_id == NULL) {
        redirect(base_url('presentation/list'));
    }

    if(!is_numeric($presentation_id)) {
        redirect(base_url('presentation/list'));
    }

    $record = $this->presentation_model->get_one($presentation_id);

    if($record == NULL || empty($record)) {
        redirect(base_url('presentation/list'));
    }

    if($this->presentation_model->delete($presentation_id)) {
        redirect(base_url('presentation/list'));
    }
    else {
        show_error('A törlés sikertelen!');
    }
  }


}
