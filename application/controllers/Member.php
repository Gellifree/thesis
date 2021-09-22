<?php

/*
* Description of county: A megyéket kezelő kontroller
*
* @author Kovács Norbert
*/

class Member extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model('member_model');
    $this->load->helper('url');
  }

  public function index() {
    echo "index page";
  }

  public function list($member_id = NULL) {
    if($member_id == null) {
      $view_params = [
        'title'     => 'Tagok listája',
        'records'   => $this->member_model->get_list()
      ];

      $this->load->view('member/list', $view_params);
    }
    else {
      echo 'else';
    }


  }


}
