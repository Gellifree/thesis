<?php

/*
* Description of presentation: Az előadásokat kezelő kontroller
*
* @author Kovács Norbert
*/

class Presentation extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model('Presentation_model');
    $this->load->helper('url');
  }

  public function index() {
    echo "index page of presentation";
  }

  public function list($member_id = NULL) {
    if($member_id == null) {
      $view_params = [
        'title'     => 'Előadások listája',
        'records'   => $this->member_model->get_list()
      ];

      $this->load->view('member/list', $view_params);
    }
    else {
      echo 'else';
    }


  }


}
