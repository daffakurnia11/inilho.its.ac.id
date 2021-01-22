<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merchant extends CI_Controller
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
      $this->load->view('merchant/product');
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
      redirect('merchant/product');
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
    redirect('merchant/product');
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
      $this->load->view('merchant/edit-product', $data);
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
      redirect('merchant/product');
    }
  }
}
