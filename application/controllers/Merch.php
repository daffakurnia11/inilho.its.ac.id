<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merch extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Merchandise Order';
    $config['base_url'] = base_url('merch');
    $config['total_rows'] = $this->db->get('data_order')->num_rows();
    $config['per_page'] = 5;

    $this->pagination->initialize($config);

    $data['start'] = $this->uri->segment(3);
    $data['data_order'] = $this->db->get('data_order', $config['per_page'], $data['start'])->result_array();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/merch/order', $data);
    $this->load->view('admin/templates/footer');
  }

  public function settings()
  {
    $data['title'] = 'Merchandise Settings';
    $data['data_store'] = $this->db->get_where('data_store', ['id' => 1])->row_array();

    $this->form_validation->set_rules('sender', 'Nama Pengirim', 'required|trim');
    $this->form_validation->set_rules('phone', 'No Pengirim', 'required|trim');
    $this->form_validation->set_rules('address', 'Alamat Pengirim', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/merch/settings', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $data = [
        'sender' => $this->input->post('sender'),
        'phone' => $this->input->post('phone'),
        'address' => $this->input->post('address'),
        'city' => $this->input->post('city')
      ];
      $this->db->where('id', 1);
      $this->db->update('data_store', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pengirim Berhasil Diubah!</div>');
      redirect('merch/settings');
    }
  }

  public function detail($id_order)
  {
    $data['title'] = 'Merchandise Order';
    $data['data_order'] = $this->db->get_where('data_order', ['no_order' => $id_order])->row_array();
    $data['order_detail'] = $this->db->get_where('order_detail', ['no_order' => $id_order])->result_array();
    $data['order_bundle'] = $this->db->get_where('order_bundle', ['no_order' => $id_order])->result_array();
    $data['product'] = $this->db->get('tabel_product')->result_array();

    $this->form_validation->set_rules('status', 'Status', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/merch/detail_order', $data);
      $this->load->view('admin/templates/footer');
    } else {
    }
  }

  public function editStatus($id_order)
  {
    $data['data_order'] = $this->db->get_where('data_order', ['no_order' => $id_order])->row_array();
    $data = [
      'no_order' => $this->input->post('no_order'),
      'receiver' => $this->input->post('receiver'),
      'phone' => $this->input->post('phone'),
      'address' => $this->input->post('address'),
      'province' => $this->input->post('province'),
      'city' => $this->input->post('city'),
      'postal' => $this->input->post('postal'),
      'courier' => $this->input->post('courier'),
      'package' => $this->input->post('package'),
      'weight' => $this->input->post('weight'),
      'shipping' => $this->input->post('shipping'),
      'subtotal' => $this->input->post('subtotal'),
      'total' => $this->input->post('total'),
      'status' => $this->input->post('status'),
    ];

    $this->db->where('no_order', $this->input->post('no_order'));
    $this->db->update('data_order', $data);
    redirect('merch');
  }

  public function delete($id_order)
  {
    $this->db->where('no_order', $id_order);
    $this->db->delete('data_order');
    $this->db->where('no_order', $id_order);
    $this->db->delete('order_detail');
    $this->db->where('no_order', $id_order);
    $this->db->delete('order_bundle');
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pesanan berhasil dihapus!</div>');
    redirect('merch');
  }

  public function referral()
  {
    $data['title'] = 'Merchandise Referral Code';

    $config['base_url'] = base_url('merch/referral');
    $config['total_rows'] = $this->db->get('tabel_referral')->num_rows();
    $config['per_page'] = 5;

    $this->pagination->initialize($config);

    $data['start'] = $this->uri->segment(3);
    $data['tabel_referral'] = $this->db->get('tabel_referral', $config['per_page'], $data['start'])->result_array();

    $this->form_validation->set_rules('code', 'Kode Referral', 'required|trim|is_unique[tabel_referral.code]');
    $this->form_validation->set_rules('forda', 'Asal Forda', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/merch/referral', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $data = [
        'code' => $this->input->post('code'),
        'forda' => $this->input->post('forda'),
        'discount' => $this->input->post('discount') ? $this->input->post('discount') : null,
        'max' => $this->input->post('max') ? $this->input->post('max') : null,
        'free' => $this->input->post('free') ? $this->input->post('free') : null,
      ];
      $this->db->insert('tabel_referral', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kode Referral berhasil ditambahkan!</div>');
      redirect('merch/referral');
    }
  }
  public function deletereferral($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('tabel_referral');
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kode Referral berhasil dihapus!</div>');
    redirect('merch/referral');
  }

  public function editreferral($id)
  {
    $data['title'] = 'Merchandise Referral Code';
    $data['tabel_referral'] = $this->db->get_where('tabel_referral', ['id' => $id])->row_array();

    $this->form_validation->set_rules('code', 'Kode Referral', 'required|trim');
    $this->form_validation->set_rules('forda', 'Asal Forda', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/merch/edit_referral', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $data = [
        'code' => $this->input->post('code'),
        'forda' => $this->input->post('forda'),
        'discount' => $this->input->post('discount') ? $this->input->post('discount') : null,
        'max' => $this->input->post('max') ? $this->input->post('max') : null,
        'free' => $this->input->post('free') ? $this->input->post('free') : null,
      ];
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('tabel_referral', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kode Referral berhasil diubah!</div>');
      redirect('merch/referral');
    }
  }
}
