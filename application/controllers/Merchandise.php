<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merchandise extends CI_Controller
{
  public function index()
  {
    $data['title'] = 'Merchandise';
    $data['tabel_product'] = $this->db->get('tabel_product')->result_array();

    $this->load->view('merchandise/index', $data);
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

  public function add()
  {
    $redirect_page = $this->input->post('redirect_page');
    $category = $this->input->post('category');
    if ($category == 'Hoodie' || $category == 'T-Shirt' || $category == 'Tie Dye T-Shirt') {
      $data = array(
        'id'      => $this->input->post('id'),
        'qty'     => $this->input->post('qty'),
        'price'   => $this->input->post('price'),
        'name'    => $this->input->post('name'),
        'options' => array('Size' => $this->input->post('size'), 'Category' => $category)
      );
    } else {
      $data = array(
        'id'      => $this->input->post('id'),
        'qty'     => $this->input->post('qty'),
        'price'   => $this->input->post('price'),
        'name'    => $this->input->post('name'),
        'options' => array('Size' => 'null', 'Category' => $category)
      );
    }
    $this->cart->insert($data);
    $this->session->set_flashdata('flash', 'Ditambahkan');
    redirect($redirect_page);
  }

  public function viewcart()
  {
    if (empty($this->cart->contents())) {
      redirect('merchandise');
    }
    $this->load->view('merchandise/viewcart');
  }

  public function delete($rowid)
  {
    $this->cart->remove($rowid);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('merchandise/viewcart');
  }

  public function update()
  {
    $i = 1;
    foreach ($this->cart->contents() as $items) {
      $data = array(
        'rowid' => $items['rowid'],
        'qty'   => $this->input->post($i . '[qty]')
      );
      $this->cart->update($data);
      $this->session->set_flashdata('flash', 'Diubah');
      $i++;
    }
    redirect('merchandise/viewcart');
  }

  public function clear()
  {
    $this->cart->destroy();
    $this->session->set_flashdata('flash', 'Dikosongkan');
    redirect('merchandise');
  }

  public function checkout()
  {
    $this->form_validation->set_rules('receiver', 'Nama Penerima', 'required|trim');
    $this->form_validation->set_rules('phone', 'No Penerima', 'required|trim');
    $this->form_validation->set_rules('address', 'Alamat Penerima', 'required|trim');
    $this->form_validation->set_rules('postal', 'Kode Pos', 'required|trim');
    $this->form_validation->set_rules('province', 'Provinsi', 'required');
    $this->form_validation->set_rules('city', 'Kota', 'required');
    $this->form_validation->set_rules('courier', 'Kurir', 'required');
    $this->form_validation->set_rules('package', 'Paket', 'required');

    if ($this->form_validation->run() == FALSE) {
      if (empty($this->cart->contents())) {
        redirect('merchandise');
      }
      $this->load->view('merchandise/checkout');
    } else {
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
        'status' => 'Belum Bayar'
      ];
      $this->db->insert('data_order', $data);

      $i = 1;
      foreach ($this->cart->contents() as $items) {
        $data_detail = [
          'no_order' => $this->input->post('no_order'),
          'product_id' => $items['id'],
          'product' => ($items['options']['Category'] . ' ' . $items['name']),
          'options' => $items['options']['Size'],
          'qty' => $this->input->post('qty' . $i)
        ];
        $i++;
        $this->db->insert('order_detail', $data_detail);
      }

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan berhasil ditambahkan!</div>');
      redirect('merchandise/invoice/' . $this->input->post('no_order'));
    }
  }

  public function invoice($id_order)
  {
    $data['data_order'] = $this->db->get_where('data_order', ['no_order' => $id_order])->row_array();
    $data['order_detail'] = $this->db->get_where('order_detail', ['no_order' => $id_order])->result_array();
    $data['product'] = $this->db->get('tabel_product')->result_array();

    $this->load->view('merchandise/invoice', $data);
  }

  public function tracking()
  {
    $this->form_validation->set_rules('keyword', 'Invoice', 'required|exact_length[12]');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('merchandise/tracking');
    } else {
      $keyword = $this->input->post('keyword');

      $this->db->select('*');
      $this->db->from('data_order');
      $this->db->like('no_order', $keyword);
      $data['data_order'] = $this->db->get()->result_array()[0];

      $this->db->select('*');
      $this->db->from('order_detail');
      $this->db->like('no_order', $keyword);
      $data['order_detail'] = $this->db->get()->result_array();

      $this->load->view('merchandise/tracking', $data);
    }
  }

  public function referral()
  {
    echo json_encode($this->db->get_where('tabel_referral', ['code' => $this->input->post('code')])->row_array());
  }
}
