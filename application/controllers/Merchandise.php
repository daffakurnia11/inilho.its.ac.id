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
    echo json_encode($this->db->get_where('tabel_product', ['id' => $this->input->post('id')])->row_array());
  }
}
