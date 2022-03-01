<?php

/*
* Description of presentation: Az előadásokat kezelő kontroller
*
* @author Kovács Norbert
*/

class Presentation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('presentation_model');
        $this->load->model('institution_model');
        $this->load->model('member_model');
        $this->load->model('holds_model');
        $this->lang->load('presentation');
    }

    public function index()
    {
        echo "index page of presentation";
    }

    public function check_holds_user($member, $presentation_id) {
      $record = $this->holds_model->get_one($presentation_id, $member);
      if($record == null || empty($record)) {
        return true;
      } else {
        $this->form_validation->set_message('check_holds_user', '<div class="alert alert-danger">Ez a felhasználó egyszer már hozzá lett rendelve ehhez az előadáshoz!</div>');
        return false;
      }
    }

    public function list($presentation_id = null)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect(base_url());
        }


        if ($presentation_id == null) {
            $view_params = [
              'title'     => lang('presentation_title'),
              'records'   => $this->presentation_model->get_list()
            ];

            $this->load->view('presentation/list', $view_params);
        } else {
            if (!is_numeric($presentation_id)) {
                show_error('Nem megfelelő paramétertípus!');
            }
            $record = $this->presentation_model->get_one($presentation_id);

            if ($record == null || empty($record)) {
                show_error('Az ID-vel nem létezik aktív rekort');
            }

            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('tagok', 'Tagok', 'required|callback_check_holds_user['.$presentation_id.']');


            if ($this->form_validation->run() == true) {
                if ($this->holds_model->add_user_to_presentation($this->input->post('tagok'), $presentation_id)) {
                    redirect(base_url('presentation/list'));
                } else {
                    // TODO: redundancia eltávolítása

                    $members = [];
                    $list = $this->member_model->get_list();
                    foreach ($list as &$item) {
                        $members[$item->id] = $item->nev;
                    }

                    $view_params = [
                      'title'               => lang('presentation_show_title'),
                      'record'              => $record,
                      'has_members'         => $this->holds_model->get_user_list($presentation_id),
                      'members'             => $members,
                    ];

                    $this->load->view('presentation/show', $view_params);
                }
            } else {

                $members = [];
                $list = $this->member_model->get_list();
                foreach ($list as &$item) {
                    $members[$item->id] = $item->nev;
                }

                $view_params = [
                  'title'               => lang('presentation_show_title'),
                  'record'              => $record,
                  'has_members'         => $this->holds_model->get_user_list($presentation_id),
                  'members'             => $members,
                ];

                $this->load->view('presentation/show', $view_params);
            }
        }
    }

    public function insert()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nev', 'Előadás neve', 'required|min_length[3]');
        $this->form_validation->set_rules('idopont', 'Időpont', 'required');
        $this->form_validation->set_rules('allapot', 'Állapot (allapot)', 'required');
        $this->form_validation->set_rules('iskola', 'Intézmény', 'required');
        if ($this->form_validation->run() == true) {
            $nev = $this->input->post('nev');
            $idopont = $this->input->post('idopont');
            $allapot = $this->input->post('allapot');
            $iskola = $this->input->post('iskola');
            if ($this->presentation_model->insert($nev, $idopont, $allapot, $iskola)) {
                redirect(base_url('presentation/list'));
            }
        } else {
            $this->load->helper('form');

            $list = $this->institution_model->get_list();
            $institutions = [];
            foreach ($list as &$item) {
                $institutions[$item->id] = $item->nev;
            }

            $view_params = [
              'title'         => lang('add_presentation'),
              'institutions'  => $institutions,
              'reconciled'    => [0 => lang('presentation_agreed'), 1 => lang('presentation_not_yet_aggreed'), 2 => lang('presentation_successful'), 3 => lang('presentation_unsuccessful')]
            ];

            $this->load->view('presentation/add', $view_params);
        }
    }

    public function update($presentation_id = null)
    {
        if ($presentation_id == null) {
            redirect(base_url('presentation/list'));
        }

        if (!is_numeric($presentation_id)) {
            redirect(base_url('presentation/list'));
        }

        $record = $this->presentation_model->get_one($presentation_id);
        if ($record == null || empty($record)) {
            redirect(base_url('presentation/list'));
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nev', 'Előadás neve', 'required|min_length[3]');
        $this->form_validation->set_rules('idopont', 'Időpont', 'required');
        $this->form_validation->set_rules('allapot', 'Állapot (allapot)', 'required');
        $this->form_validation->set_rules('iskola', 'Intézmény', 'required');

        if ($this->form_validation->run() == true) {
            $nev = $this->input->post('nev');
            $idopont = $this->input->post('idopont');
            $allapot = $this->input->post('allapot');
            $iskola = $this->input->post('iskola');
            if ($this->presentation_model->update($presentation_id, $nev, $idopont, $allapot, $iskola)) {
                redirect(base_url('presentation/list'));
            } else {
                show_error(lang('unsuccesfull_edit'));
            }
        } else {
            $list = $this->institution_model->get_list();
            $institutions = [];
            foreach ($list as &$item) {
                $institutions[$item->id] = $item->nev;
            }

            $view_params = [
              'title'         => lang('edit_presentation'),
              'record'        => $record,
              'institutions'  => $institutions,
              'reconciled'    => [0 => lang('presentation_agreed'), 1 => lang('presentation_not_yet_aggreed'), 2 => lang('presentation_successful'), 3 => lang('presentation_unsuccessful')]
            ];

            $this->load->helper('form');
            $this->load->view('presentation/edit', $view_params);
        }
    }

    public function delete($presentation_id = null)
    {
        if ($presentation_id == null) {
            redirect(base_url('presentation/list'));
        }

        if (!is_numeric($presentation_id)) {
            redirect(base_url('presentation/list'));
        }

        $record = $this->presentation_model->get_one($presentation_id);

        if ($record == null || empty($record)) {
            redirect(base_url('presentation/list'));
        }

        if ($this->presentation_model->delete($presentation_id)) {
            redirect(base_url('presentation/list'));
        } else {
            show_error('A törlés sikertelen!');
        }
    }


    public function delete_member($member_id = null, $presentation_id = null)
    {
        //TODO: hibaüzenetek

        if (!$this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) {
            redirect(base_url('member/list'));
        }

        if ($member_id == null) {
            redirect(base_url('member/list'));
        }

        if (!is_numeric($member_id)) {
            redirect(base_url('member/list'));
        }

        if ($presentation_id == null) {
            redirect(base_url('member/list'));
        }

        if (!is_numeric($presentation_id)) {
            redirect(base_url('member/list'));
        }

        $record = $this->holds_model->get_one($presentation_id, $member_id);

        if ($record == null || empty($record)) {
            redirect(base_url('member/list'));
        }

        if ($this->holds_model->delete($presentation_id, $member_id)) {
            redirect(base_url('presentation/list/'.$presentation_id));
        } else {
            show_error('A törlés sikertelen!');
        }
    }
}
