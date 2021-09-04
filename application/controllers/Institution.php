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

    public function list($institution_id = NULL) {
        $this->load->helper('url');
        if($institution_id == null) {
            $view_params = [
                'title'      => 'Intézmények listája',
                'records'    => $this->institution_model->get_list()
            ];



            $this->load->view('institution/list', $view_params);
       }
       else {

           if(!is_numeric($institution_id)) {
               show_error('Nem megfelelő paramétertípus!');
           }

           $record = $this->institution_model->get_one($institution_id);

           if($record == NULL || empty($record)) {
               show_error('Az ID-vel nem létezik aktív rekort');
           }

           $view_params = [
               'title'  => 'Részletes rekordadatok',
               'record' => $record
           ];


           $this->load->view('institution/show', $view_params);
       }
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
