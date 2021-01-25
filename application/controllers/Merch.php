<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merch extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function product()
  {
    $data['title'] = 'Merchandise Products';
    $data['tabel_product'] = $this->db->get('tabel_product')->result_array();

    $this->form_validation->set_rules('product', 'Produk', 'required|trim');
    $this->form_validation->set_rules('price', 'Harga', 'required|trim|numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('merch/product');
      $this->load->view('templates/footer');
    } else {
      $upload = $_FILES['img']['name'];

      if ($upload) {
        $config['allowed_types'] = 'gif|jpg|png|JPG';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/products/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('img')) {
          $img = $this->upload->data('file_name');
          $this->db->set('img', $img);
        } else {
          echo $this->upload->display_errors();
        }
      } else {
        $this->db->set('img', 'no-image.jpg');
      }

      $data = [
        'product' => $this->input->post('product'),
        'price' => $this->input->post('price'),
        'category' => $this->input->post('category')
      ];
      $this->db->insert('tabel_product', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil ditambahkan!</div>');
      redirect('merch/product');
    }
  }

  public function deleteproduct($id)
  {
    $data['tabel_product'] = $this->db->get_where('tabel_product', ['id' => $id])->row_array();
    $old_image = $data['tabel_product']['img'];
    if ($old_image != 'no-image.jpg') {
      unlink(FCPATH . 'assets/img/products/' . $old_image);
    }
    $this->db->where('id', $id);
    $this->db->delete('tabel_product');
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Produk berhasil dihapus!</div>');
    redirect('merch/product');
  }

  public function editproduct($id)
  {
    $data['title'] = 'Merchandise Products';
    $data['tabel_product'] = $this->db->get_where('tabel_product', ['id' => $id])->row_array();

    $this->form_validation->set_rules('product', 'Produk', 'required|trim');
    $this->form_validation->set_rules('price', 'Harga', 'required|trim|numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('merch/edit-product', $data);
      $this->load->view('templates/footer');
    } else {
      $upload = $_FILES['img']['name'];

      if ($upload) {
        $config['allowed_types'] = 'gif|jpg|png|JPG';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/products/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('img')) {
          $old_image = $data['tabel_product']['img'];
          if ($old_image != 'no-image.jpg') {
            unlink(FCPATH . 'assets/img/products/' . $old_image);
          }
          $img = $this->upload->data('file_name');
          $this->db->set('img', $img);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $data = [
        'product' => $this->input->post('product'),
        'price' => $this->input->post('price'),
        'category' => $this->input->post('category')
      ];
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('tabel_product', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil diubah!</div>');
      redirect('merch/product');
    }
  }

  public function settings()
  {
    $data['title'] = 'Merchandise Settings';
    $data['data_store'] = $this->db->get_where('data_store', ['id' => 1])->row_array();

    $this->form_validation->set_rules('sender', 'Nama Pengirim', 'required|trim');
    $this->form_validation->set_rules('phone', 'No Pengirim', 'required|trim');
    $this->form_validation->set_rules('address', 'Alamat Pengirim', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('merch/settings', $data);
      $this->load->view('templates/footer');
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

  public function order()
  {
    $data['title'] = 'Merchandise Order';
    $data['data_order'] = $this->db->get('data_order')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('merch/order', $data);
    $this->load->view('templates/footer');
  }

  public function detail($id_order)
  {
    $data['title'] = 'Merchandise Order';
    $data['data_order'] = $this->db->get_where('data_order', ['no_order' => $id_order])->row_array();
    $data['order_detail'] = $this->db->get_where('order_detail', ['no_order' => $id_order])->result_array();
    $data['product'] = $this->db->get('tabel_product')->result_array();

    $this->form_validation->set_rules('status', 'Status', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('merch/detail_order', $data);
      $this->load->view('templates/footer');
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
    redirect('merch/order');
  }

  public function delete($id_order)
  {
    $this->db->where('no_order', $id_order);
    $this->db->delete('data_order');
    $this->db->where('no_order', $id_order);
    $this->db->delete('order_detail');
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pesanan berhasil dihapus!</div>');
    redirect('merch/order');
  }
}
