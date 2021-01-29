<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin2021 extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/dashboard/index');
    $this->load->view('admin/templates/footer');
  }
}
