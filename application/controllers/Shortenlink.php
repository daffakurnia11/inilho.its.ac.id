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
    $data['title'] = 'Add Shorten Link';

    $this->form_validation->set_rules('namalink', 'Nama URL', 'required|trim');
    $this->form_validation->set_rules('shortenurl', 'Shorten Link', 'required|trim|alpha_numeric|is_unique[shorten_link.shortenurl]');
    $this->form_validation->set_rules('urllink', 'URL Asli', 'required|trim|valid_url');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/shortenlink/index', $data);
      $this->load->view('admin/templates/footer');
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
    redirect('shortenlink/list');
  }

  public function editlink($id)
  {
    $data['title'] = 'Edit Shorten Link';
    $data['shorten_link'] = $this->db->get_where('shorten_link', ['id' => $id])->row_array();

    $this->form_validation->set_rules('namalink', 'Nama URL', 'required|trim');
    $this->form_validation->set_rules('shortenurl', 'Shorten Link', 'required|trim|alpha_numeric');
    $this->form_validation->set_rules('urllink', 'URL Asli', 'required|trim|valid_url');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/shortenlink/edit-link', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $data = [
        'namalink' => $this->input->post('namalink'),
        'urllink' => $this->input->post('urllink'),
        'shortenurl' => $this->input->post('shortenurl'),
      ];
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('shorten_link', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Shorten Link berhasil diubah!</div>');
      redirect('shortenlink/list');
    }
  }

  public function list()
  {
    // Pagination
    $data['keyword'] = $this->input->post('keyword');
    if ($data['keyword']) {
      $data['title'] = 'List Shorten Link';

      $this->db->like('namalink', $data['keyword']);
      $data['shorten_link'] = $this->db->get('shorten_link')->result_array();
      $data['start'] = 0;
    } else {
      $this->db->like('namalink', $data['keyword']);
      $this->db->from('shorten_link');

      $config['base_url'] = base_url('shortenlink/list');
      $config['total_rows'] = $this->db->count_all_results();
      $config['per_page'] = 5;

      $this->pagination->initialize($config);

      $data['title'] = 'List Shorten Link';
      $data['start'] = $this->uri->segment(3);
      $data['shorten_link'] = $this->db->get('shorten_link', $config['per_page'], $data['start'])->result_array();
    }

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/shortenlink/list', $data);
    $this->load->view('admin/templates/footer');
  }
}
