<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

     public function __construct()
     {
         parent::__construct();
         $this->load->model('presentation_model');
         $this->load->model('member_model');
         $this->load->model('institution_model');
     }


    public function index()
    {
        $view_params = [
          'successfull_presentations'           => $this->presentation_model->count_successfull(),
          'not_successfull_presentations'       => $this->presentation_model->count_not_successfull(),
          'waiting_presentations'               => $this->presentation_model->count_waiting(),
          'not_waiting_presentations'           => $this->presentation_model->count_not_waiting(),
          'number_of_members'                   => $this->member_model->get_list(),
          'sum_of_scholarship'                  => $this->member_model->count_full_scholarship_amount(),
          'number_of_institutions'              => $this->institution_model->get_list(),
        ];

        $this->load->view('welcome_message', $view_params);
    }
}
