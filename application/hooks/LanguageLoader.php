<?php
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        $ci->load->helper('language');

        $site_lang = $ci->session->userdata('site_lang');
        if ($site_lang) {
            $ci->lang->load('common',$ci->session->userdata('site_lang'));
            $ci->lang->load('auth',$ci->session->userdata('site_lang'));
            $ci->lang->load('ion_auth',$ci->session->userdata('site_lang'));
            $ci->lang->load('county',$ci->session->userdata('site_lang'));
            $ci->lang->load('member',$ci->session->userdata('site_lang'));
            $ci->lang->load('presentation',$ci->session->userdata('site_lang'));
            $ci->lang->load('status',$ci->session->userdata('site_lang'));
        } else {
            $ci->lang->load('common','english');
            $ci->lang->load('auth','english');
            $ci->lang->load('ion_auth','english');
            $ci->lang->load('county','english');
            $ci->lang->load('member','english');
            $ci->lang->load('presentation','english');
            $ci->lang->load('status','english');
        }
    }
}
