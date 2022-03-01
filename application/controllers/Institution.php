<?php

/*
* Description of Institution: Az intézményeket kezelő kontroller
*
* @author Kovács Norbert
*/

class Institution extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('institution_model');
        $this->load->model('county_model');
    }

    public function index()
    {
        echo "index page of institution";
    }

    public function list($institution_id = null)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect(base_url());
        }

        if ($institution_id == null) {
            $view_params = [
                'title'      => 'Intézmények listája',
                'records'    => $this->institution_model->get_list()
            ];



            $this->load->view('institution/list', $view_params);
        } else {
            if (!is_numeric($institution_id)) {
                show_error('Nem megfelelő paramétertípus!');
            }

            $record = $this->institution_model->get_one($institution_id);

            if ($record == null || empty($record)) {
                show_error('Az ID-vel nem létezik aktív rekort');
            }

            $view_params = [
               'title'        => 'Részletes rekordadatok',
               'record'       => $record,
               'institutions' => $this->institution_model->get_presentations($institution_id)
           ];


            $this->load->view('institution/show', $view_params);
        }
    }

    public function insert()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nev', 'Intézmény neve', 'required|min_length[3]');
        $this->form_validation->set_rules('cim', 'Cím', 'required|min_length[3]');
        $this->form_validation->set_rules('igazgato_neve', 'Igazgató neve', 'required|min_length[3]');
        $this->form_validation->set_rules('megye', 'Megye', 'required');

        if ($this->form_validation->run() == true) {
            $nev = $this->input->post('nev');
            $megye = $this->input->post('megye');
            $cim = $this->input->post('cim');
            $igazgato_neve = $this->input->post('igazgato_neve');
            $email = $this->input->post('e_mail');
            $telefon = $this->input->post('telefon');
            $weboldal = $this->input->post('weboldal');

            if ($this->institution_model->insert($nev, $megye, $cim, $igazgato_neve, $email, $telefon, $weboldal)) {
                redirect(base_url('institution/list'));
            }
        } else {
            $counties = [];
            $list = $this->county_model->get_list();
            foreach ($list as &$item) {
                $counties[$item->id] = $item->nev;
            }

            $view_params = [
          'title'     => 'Intézmény hozzáadása',
          'counties'  => $counties
        ];



            $this->load->helper('form');
            $this->load->view('institution/add', $view_params);
        }
    }

    public function update($institution_id = null)
    {
        if ($institution_id == null) {
            redirect(base_url('institution/list'));
        }

        if (!is_numeric($institution_id)) {
            redirect(base_url('institution/list'));
        }

        $record = $this->institution_model->get_one($institution_id);

        if ($record == null || empty($record)) {
            redirect(base_url('institution/list'));
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nev', 'Intézmény neve', 'required');
        $this->form_validation->set_rules('cim', 'Cím', 'required');
        $this->form_validation->set_rules('igazgato_neve', 'Igazgató neve', 'required');

        if ($this->form_validation->run() == true) {
            $nev = $this->input->post('nev');
            $megye = $this->input->post('megye');
            $cim = $this->input->post('cim');
            $igazgato_neve = $this->input->post('igazgato_neve');
            $email = $this->input->post('e_mail');
            $telefon = $this->input->post('telefon');
            $weboldal = $this->input->post('weboldal');

            if ($this->institution_model->update($institution_id, $nev, $megye, $cim, $igazgato_neve, $email, $telefon, $weboldal)) {
                redirect(base_url('institution/list'));
            } else {
                show_error(lang('unsuccesfull_edit'));
            }
        } else {
            $counties = [];
            $list = $this->county_model->get_list();
            foreach ($list as &$item) {
                $counties[$item->id] = $item->nev;
            }

            $view_params = [
          'title'     => 'Intézmény szerkesztése',
          'record'    => $record,
          'counties'  => $counties
        ];

            $this->load->helper('form');
            $this->load->view('institution/edit', $view_params);
        }
    }

    public function delete($institution_id = null)
    {
        if (!$this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) {
            redirect(base_url());
        }

        if ($institution_id == null) {
            redirect(base_url('institution/list'));
        }

        if (!is_numeric($institution_id)) {
            redirect(base_url('institution/list'));
        }

        $record = $this->institution_model->get_one($institution_id);

        if ($record == null || empty($record)) {
            redirect(base_url('institution/list'));
        }

        if ($this->institution_model->delete($institution_id)) {
            redirect(base_url('institution/list'));
        } else {
            show_error('A törlés sikertelen!');
        }
    }
}
