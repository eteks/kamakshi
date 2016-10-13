<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 
class Oauth_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('index_model');
        // Load session library
        $this->load->library('session');
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));
        // Load pagination library
        $this->load->library('ajax_pagination');
        $this->perPage = 14;
        // Load facebook library and pass associative array which contains appId and secret key
        $this->load->library('facebook', array('appId' => '1047438518707100', 'secret' => '8495e9c0015d181c8a223cd5e3385d14'));

        // Get user's login information
        $this->user = $this->facebook->getUser();

    }

    public function facebook_login() {

        // echo "facebook_login";
        // $this->facebook();
        
        // Store users facebook login url
        $data['login_url'] = $this->facebook->getLoginUrl();
        // $data['login_url']="www.facebook.com";
        // $this->facebook->login_url();

        echo $data['login_url'];
        // $this->load->view('index', $data);
    

}
}