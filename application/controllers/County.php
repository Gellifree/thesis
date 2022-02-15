<?php

/*
* Description of county: A megyéket kezelő kontroller
*
* @author Kovács Norbert
*/

class County extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('county_model');
        $this->lang->load('county');
    }

    public function index() {
        echo "index page of county";
    }

    public function list($county_id = NULL) {
        if(!$this->ion_auth->logged_in()) {
          redirect(base_url())
        }
        if($county_id == null) {
            $view_params = [
                'title'      => lang('county_list_title'),
                'records'    => $this->county_model->get_list()
            ];

            $this->load->view('county/list', $view_params);
       }
       else {

           if(!is_numeric($county_id)) {
               show_error('Nem megfelelő paramétertípus!');
           }

           $record = $this->county_model->get_one($county_id);

           if($record == NULL || empty($record)) {
               show_error('Az ID-vel nem létezik aktív rekort');
           }

           $view_params = [
               'title'  => 'Részletes rekordadatok',
               'record' => $record
           ];

           $this->load->view('county/show', $view_params);
       }
    }

    public function insert() {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('nev', 'Megye nev', 'required|min_length[2]');

      if ($this->form_validation->run() == TRUE) {
        $nev = $this->input->post('nev');
        $this->county_model->insert($nev);
        redirect(base_url('county/list'));
      } else {
        $view_params = [
          'title'   => 'Megye hozzáadása'
        ];

        $this->load->helper('form');
        $this->load->view('county/add', $view_params);
      }


    }

    public function update() {
        echo 'update';
    }

    public function delete($county_id = NULL) {
        if($county_id == NULL) {
            redirect(base_url('county/list'));
        }

        if(!is_numeric($county_id)) {
            redirect(base_url('county/list'));
        }

        $record = $this->county_model->get_one($county_id);

        if($record == NULL || empty($record)) {
            redirect(base_url('county/list'));
        }

        if($this->county_model->delete($county_id)) {
            redirect(base_url('county/list'));
        }
        else {
            show_error('A törlés sikertelen!');
        }
    }
}
