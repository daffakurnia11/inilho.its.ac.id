<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merchandise extends CI_Controller
{
  public function index()
  {
    $data['title'] = 'Merchandise';
    $data['tabel_product'] = $this->db->get('tabel_product')->result_array();

    $this->load->view('merchant/index', $data);
  }

  public function add()
  {
    $redirect_page = $this->input->post('redirect_page');
    $data = array(
      'id'      => $this->input->post('id'),
      'qty'     => $this->input->post('qty'),
      'price'   => $this->input->post('price'),
      'name'    => $this->input->post('name')
    );

    $this->cart->insert($data);
    redirect($redirect_page);
  }

  public function details()
  {
    echo json_encode($this->db->get_where('tabel_product', ['code' => $this->input->post('code')])->row_array());
  }
  public function images()
  {
    // $id = $this->input->post('id');
    // $query = 'SELECT * FROM tabel_images WHERE code = $id';
    // var_dump($this->db->query($query));
    echo json_encode($this->db->get_where('tabel_images', ['code' => $this->input->post('code')])->result());
  }
}
