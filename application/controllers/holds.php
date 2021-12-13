<?php

/*
* Description of holds: A 'tartja' kontroller
*
* @author Kovács Norbert
*/

class Member extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model('holds_model');
  }
}
