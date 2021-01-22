<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shortenlink extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Shorten Link';
    $data['shorten_link'] = $this->db->get('shorten_link')->result_array();

    $this->form_validation->set_rules('namalink', 'Nama URL', 'required|trim');
    $this->form_validation->set_rules('shortenurl', 'Shorten Link', 'required|trim|alpha_numeric|is_unique[shorten_link.shortenurl]');
    $this->form_validation->set_rules('urllink', 'URL Asli', 'required|trim|valid_url');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('shortenlink/index', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'namalink' => $this->input->post('namalink'),
        'urllink' => $this->input->post('urllink'),
        'shortenurl' => $this->input->post('shortenurl'),
      ];
      $this->db->insert('shorten_link', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Shorten Link berhasil ditambahkan!</div>');
      redirect('shortenlink');
    }
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('shorten_link');
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Shorten Link berhasil dihapus!</div>');
    redirect('shortenlink');
  }

  public function editlink($id)
  {
    $data['title'] = 'Edit Shorten Link';
    $data['shorten_link'] = $this->db->get_where('shorten_link', ['id' => $id])->row_array();

    $this->form_validation->set_rules('namalink', 'Nama URL', 'required|trim');
    $this->form_validation->set_rules('shortenurl', 'Shorten Link', 'required|trim|alpha_numeric');
    $this->form_validation->set_rules('urllink', 'URL Asli', 'required|trim|valid_url');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('shortenlink/edit-link', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'namalink' => $this->input->post('namalink'),
        'urllink' => $this->input->post('urllink'),
        'shortenurl' => $this->input->post('shortenurl'),
      ];
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('shorten_link', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Shorten Link berhasil diubah!</div>');
      redirect('shortenlink');
    }
  }
}
