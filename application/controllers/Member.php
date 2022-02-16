<?php

/*
* Description of members: A tagokat kezelő kontroller
*
* @author Kovács Norbert
*/

class Member extends CI_Controller {
  public function __construct() {
    parent::__construct();

    if (!$this->ion_auth->logged_in()) {
      redirect(base_url());
    }

    $this->load->model('member_model');
    $this->load->model('status_model');
    $this->load->model('presentation_model');
    $this->load->model('holds_model');
    $this->lang->load('member');
  }

  public function index() {
    echo "index page of member";
  }

  public function list($member_id = NULL) {

    if(!$this->ion_auth->logged_in()) {
      redirect(base_url());
    }

    $this->load->helper('form');
    if($member_id == null) {
      $view_params = [
        'title'     => lang('member_list_title'),
        'records'   => $this->member_model->get_list(),
      ];

      $this->load->view('member/list', $view_params);
    }
    else {

      if(!is_numeric($member_id)) {
          show_error('Nem megfelelő paramétertípus!');
      }

      $record = $this->member_model->get_one($member_id);

      if($record == NULL || empty($record)) {
          show_error('Az ID-vel nem létezik aktív rekort');
      }





      $this->load->library('form_validation');
      $this->form_validation->set_rules('eloadasok', 'Előadás', 'required');
      if($this->form_validation->run() == TRUE) {
        if($this->holds_model->add_presentation_to_user($this->input->post('eloadasok'), $member_id)) {
          redirect(base_url('member/list'));
        } else {
          // TODO: redundancia eltávolítása
          $presentations = [];
          $list = $this->presentation_model->get_list();
          foreach($list as &$item) {
            $presentations[$item->id] = $item->nev;
          }

          $view_params = [
              'title'               => 'Részletes rekordadatok',
              'record'              => $record,
              'has_presentations'   => $this->holds_model->get_presentation_list($member_id),
              'presentations'       => $presentations,
          ];

          $this->load->view('member/show', $view_params);
        }
      } else {

        $presentations = [];
        $list = $this->presentation_model->get_list();
        foreach($list as &$item) {
          $presentations[$item->id] = $item->nev;
        }

        $view_params = [
            'title'               => 'Részletes rekordadatok',
            'record'              => $record,
            'has_presentations'   => $this->holds_model->get_presentation_list($member_id),
            'presentations'       => $presentations,
        ];

        $this->load->view('member/show', $view_params);
      }

    }
  }

  public function insert() {
    if(!$this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) {
      redirect(base_url('member/list'));
    }


    $this->load->library('form_validation');

    $this->form_validation->set_rules('nev', lang('member_name'), 'required');
    $this->form_validation->set_rules('osztondij', lang('member_scholarship'), 'required|greater_than[0]');
    $this->form_validation->set_rules('email', 'E-mail', 'required');
    $this->form_validation->set_rules('aktiv', 'Aktivitás', 'required');
    $this->form_validation->set_rules('status_id', lang('status'), 'required');

    if($this->form_validation->run() == TRUE) {
      if(
        $this->member_model->insert(
        $this->input->post('nev'),
        $this->input->post('osztondij'),
        $this->input->post('email'),
        empty($this->input->post('tagsag_kezdete')) ? NULL : $this->input->post('tagsag_kezdete'),
        $this->input->post('status_id'),
        $this->input->post('aktiv')
      )) {
        redirect(base_url('member/list'));
      }
    }
    else {
      $this->load->helper('form');


      $list = $this->status_model->get_list();
      $statuses = [];
      foreach($list as &$item) {
        $statuses[$item->id] = $item->nev;
      }

      $view_params = [
        'title'     => lang('member_add_title'),
        'aktiv'     => [1 => lang('member_active'), 0 => lang('member_in_active')],
        'statuses'  => $statuses
      ];

      $this->load->view('member/add', $view_params);
    }
  }

  public function update($member_id = NULL) {
    if(!$this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) {
      redirect(base_url('member/list'));
    }


      if($member_id == NULL) {
        redirect(base_url('member/list'));
      }

      if(!is_numeric($member_id)) {
        redirect(base_url('member/list'));
      }

      $record = $this->member_model->get_one($member_id);
      if($record == NULL || empty($record)) {
        redirect(base_url('member/list'));
      }

      $this->load->library('form_validation');
      $this->form_validation->set_rules('nev', lang('member_name'), 'required|min_length[2]');

      if($this->form_validation->run() == TRUE) {
        $nev = $this->input->post('nev');
        $osztondij = $this->input->post('osztondij');
        $email = $this->input->post('email');
        $tagsag_kezdete = $this->input->post('tagsag_kezdete');
        $status_id = $this->input->post('status_id');
        $aktiv = $this->input->post('aktiv');

        if($this->member_model->update($member_id, $nev, $osztondij, $email, $tagsag_kezdete, $status_id, $aktiv)) {
          redirect(base_url('member/list'));
        }
        else {
          show_error(lang('unsuccesfull_edit'));
        }
      }
      else {

        $list = $this->status_model->get_list();
        $statuses = [];
        foreach($list as &$item) {
          $statuses[$item->id] = $item->nev;
        }


        $view_params = [
          'title'     => lang('member_add_title'),
          'record'    => $record,
          'aktiv'     => [1 => lang('member_active'), 0 => lang('member_in_active')],
          'statuses'  => $statuses
        ];
        $this->load->helper('form');
        $this->load->view('member/edit', $view_params);
      }
    }

    public function delete($member_id = NULL) {
      //TODO: hibaüzenetek

      if(!$this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) {
        redirect(base_url('member/list'));
      }


        if (!$this->ion_auth->is_admin()) {
          redirect(base_url());
        }
        // TODO: Jogosultsági csoportok megtervezése
        if($member_id == NULL) {
            redirect(base_url('member/list'));
        }

        if(!is_numeric($member_id)) {
            redirect(base_url('member/list'));
        }

        $record = $this->member_model->get_one($member_id);

        if($record == NULL || empty($record)) {
            redirect(base_url('member/list'));
        }

        if($this->member_model->delete($member_id)) {
            redirect(base_url('member/list'));
        }
        else {
            show_error('A törlés sikertelen!');
        }
    }

}
