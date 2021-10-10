<?php

/*
* Description of members: A tagokat kezelő kontroller
*
* @author Kovács Norbert
*/

class Member extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model('member_model');
  }

  public function index() {
    echo "index page of member";
  }

  public function list($member_id = NULL) {
    if($member_id == null) {
      $view_params = [
        'title'     => 'Tagok listája',
        'records'   => $this->member_model->get_list(),
      ];

      $this->load->view('member/list', $view_params);
    }
    else {
      echo 'else';
    }
  }

  public function insert() {
    $this->load->helper('form');
    $this->load->model('status_model');

    $list = $this->status_model->get_list();
    $statuses = [];
    foreach($list as &$item) {
      $statuses[$item->id] = $item->nev;
    }

    $view_params = [
      'title'     => 'Tag hozzáadása',
      'aktiv'     => [1 => 'Aktív', 0 => 'Inaktív'],
      'statuses'  => $statuses
    ];

    $this->load->view('member/add', $view_params);
  }


}
