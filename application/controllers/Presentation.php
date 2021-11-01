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
  }

  public function index() {
    echo "index page of presentation";
  }

  public function list($presentation_id = NULL) {
    if($presentation_id == null) {
      $view_params = [
        'title'     => 'Előadások listája',
        'records'   => $this->presentation_model->get_list()
      ];

      $this->load->view('presentation/list', $view_params);
    }
    else {
      echo 'else';
    }


  }


}
