<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function index()
  {
    if ($this->session->userdata('username')) {
      redirect('admin2021');
    }
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    if ($this->form_validation->run() == FALSE) {
      $data['title'] = 'Ini Lho ITS! Dashboard Login';
      $this->load->view('admin/templates/auth_header', $data);
      $this->load->view('admin/dashboard/login');
      $this->load->view('admin/templates/auth_footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if ($username == 'ilits2021' && $password == 'coronahilang') {
      $data = [
        'username' => $username
      ];
      $this->session->set_userdata($data);
      redirect('admin2021');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Salah username / password!</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
    redirect('auth');
  }
}
