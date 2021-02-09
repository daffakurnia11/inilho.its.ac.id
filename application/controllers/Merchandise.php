<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merchandise extends CI_Controller
{
  public function index()
  {
    $data['title'] = 'Merchandise';
    $data['tabel_product'] = $this->db->get('tabel_product')->result_array();
    $data['tabel_bundle'] = $this->db->get('tabel_bundle')->result_array();
    $data['slider'] = $this->db->get('merchandise_slider')->result_array();
    $data['nav'] = 1;
    $data['merch_footer'] = true;

    $this->load->view('home/template/header');
    $this->load->view('home/template/navbar', $data);
    $this->load->view('merchandise/index', $data);
    $this->load->view('home/template/footer', $data);
  }

  public function details()
  {
    echo json_encode($this->db->get_where('tabel_product', ['code' => $this->input->post('code')])->row_array());
  }
  public function images()
  {
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
    }
    if ($this->input->post('size') == 'XXL') {
      $data = array(
        'id'      => $this->input->post('id'),
        'qty'     => $this->input->post('qty'),
        'price'   => $this->input->post('price') + 5000,
        'name'    => $this->input->post('name'),
        'options' => array('Size' => $this->input->post('size'), 'Category' => $category)
      );
    } else {
      $data = array(
        'id'      => $this->input->post('id'),
        'qty'     => $this->input->post('qty'),
        'price'   => $this->input->post('price'),
        'name'    => $this->input->post('name'),
        'options' => array('Size' => null, 'Category' => $category)
      );
    }
    $this->cart->insert($data);
    $this->session->set_flashdata('flash', 'Ditambahkan');
    redirect($redirect_page);
  }
  public function addBundle()
  {
    $this->form_validation->set_rules('productBundle', 'Bundle Pack', 'required');

    $tabel_bundle = $this->db->get_where('tabel_bundle', ['product' => $this->input->post('productBundle')])->row_array();

    if ($tabel_bundle['hoodie'] == 1) {
      $this->form_validation->set_rules('hoodie', 'Hoodie', 'required');
    }
    if ($tabel_bundle['shirt'] == 1) {
      $this->form_validation->set_rules('tshirt', 'T-Shirt', 'required');
    }
    if ($tabel_bundle['totebag'] == 1) {
      $this->form_validation->set_rules('totebag', 'Totebag', 'required');
    }
    if ($tabel_bundle['cap'] == 1) {
      $this->form_validation->set_rules('cap', 'Dad Cap', 'required');
    }
    if ($tabel_bundle['keychain'] == 1) {
      $this->form_validation->set_rules('keychain', 'Keychain', 'required');
    }
    if ($tabel_bundle['bracelet'] == 1) {
      $this->form_validation->set_rules('bracelet', 'Bracelet', 'required');
    }
    if ($tabel_bundle['lanyard'] == 1) {
      $this->form_validation->set_rules('lanyard', 'Lanyard', 'required');
    }
    if ($tabel_bundle['stickerbook'] == 1) {
      $this->form_validation->set_rules('stickerbook', 'Stickerbook', 'required');
    }
    if ($tabel_bundle['product'] != 'Peach Pack' && $tabel_bundle['product'] != 'Yellow Pack') {
      $this->form_validation->set_rules('sizeBundle', 'Size', 'required');
    }

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('flash', 'Bundle');
      redirect('merchandise');
    } else {
      $redirect_page = $this->input->post('redirect_page');
      $bundle = $this->db->get_where('tabel_bundle', ['product' => $this->input->post('productBundle')])->result_array()[0];
      if ($this->input->post('sizeBundle') == 'XXL') {
        $price = $bundle['price'] + 5000;
      } else {
        $price = $bundle['price'];
      }

      $data = array(
        'id'      => $bundle['id'],
        'qty'     => 1,
        'price'   => $price,
        'name'    => $this->input->post('productBundle'),
        'options' => [
          'Category' => 'Bundle',
          'Size' => $this->input->post('sizeBundle') ? $this->input->post('sizeBundle') : null,
          'Hoodie' => $this->input->post('hoodie') ? $this->input->post('hoodie') : null,
          'T-Shirt' => $this->input->post('tshirt') ? $this->input->post('tshirt') : null,
          'Totebag' => $this->input->post('totebag') ? $this->input->post('totebag') : null,
          'Dad Cap' => $this->input->post('cap') ? $this->input->post('cap') : null,
          'Keychain' => $this->input->post('keychain') ? $this->input->post('keychain') : null,
          'Bracelet' => $this->input->post('bracelet') ? $this->input->post('bracelet') : null,
          'Lanyard' => $this->input->post('lanyard') ? $this->input->post('lanyard') : null,
          'Stickerbook' => $this->input->post('stickerbook') ? $this->input->post('stickerbook') : null,
        ]
      );
      $this->cart->insert($data);
      $this->session->set_flashdata('flash', 'Ditambahkan');
      redirect($redirect_page);
    }
  }

  public function viewcart()
  {
    if (empty($this->cart->contents())) {
      redirect('merchandise');
    }
    $data['nav'] = 1;
    $data['merchandise'] = true;
    $data['merch_footer'] = true;

    $this->load->view('home/template/header');
    $this->load->view('home/template/navbar', $data);
    $this->load->view('merchandise/viewcart');
    $this->load->view('home/template/footer', $data);
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
    $this->form_validation->set_rules('receiver', 'Nama Penerima', 'required|trim|alpha_numeric_spaces');
    $this->form_validation->set_rules('phone', 'No Penerima', 'required|trim|numeric|min_length[10]|max_length[12]');
    $this->form_validation->set_rules('address', 'Alamat Penerima', 'required|trim');
    $this->form_validation->set_rules('postal', 'Kode Pos', 'required|trim|numeric|exact_length[5]');
    $this->form_validation->set_rules('province', 'Provinsi', 'required');
    $this->form_validation->set_rules('city', 'Kota', 'required');
    $this->form_validation->set_rules('courier', 'Kurir', 'required');
    $this->form_validation->set_rules('package', 'Paket', 'required');

    if ($this->form_validation->run() == FALSE) {
      if (empty($this->cart->contents())) {
        redirect('merchandise');
      }
      $data['nav'] = 1;
      $data['merchandise'] = true;
      $data['merch_footer'] = true;

      $this->load->view('home/template/header');
      $this->load->view('home/template/navbar', $data);
      $this->load->view('merchandise/checkout');
      $this->load->view('home/template/footer', $data);
    } else {
      $data = [
        'no_order' => $this->input->post('no_order'),
        'receiver' => $this->input->post('receiver'),
        'phone' => '62' . $this->input->post('phone'),
        'address' => $this->input->post('address'),
        'province' => $this->input->post('province'),
        'city' => $this->input->post('city'),
        'postal' => $this->input->post('postal'),
        'courier' => $this->input->post('courier'),
        'package' => $this->input->post('package'),
        'weight' => $this->input->post('weight'),
        'shipping' => $this->input->post('shipping'),
        'subtotal' => $this->input->post('subtotal'),
        'referral' => $this->input->post('referral') ? $this->input->post('referral') : null,
        'bonus' => $this->input->post('bonus') ? $this->input->post('bonus') : null,
        'total' => $this->input->post('total'),
        'status' => 'Belum Bayar'
      ];
      $this->db->insert('data_order', $data);

      $i = 1;
      foreach ($this->cart->contents() as $items) {
        if ($items['options']['Category'] != 'Bundle') {
          $data_detail = [
            'no_order' => $this->input->post('no_order'),
            'product_id' => $items['id'],
            'product' => ($items['options']['Category'] . ' ' . $items['name']),
            'notes' => $items['options']['Size'],
            'qty' => $this->input->post('qty' . $i)
          ];
          $i++;
          $this->db->insert('order_detail', $data_detail);
        } else {
          $data_detail = [
            'no_order' => $this->input->post('no_order'),
            'product_id' => $items['id'],
            'qty' => $this->input->post('qty' . $i),
            'bundle' => ($items['options']['Category'] . ' ' . $items['name']),
            'size' => $items['options']['Size'],
            'hoodie' => $this->input->post('bundle-items' . 1),
            'tshirt' => $this->input->post('bundle-items' . 2),
            'totebag' => $this->input->post('bundle-items' . 3),
            'cap' => $this->input->post('bundle-items' . 4),
            'keychain' => $this->input->post('bundle-items' . 5),
            'bracelet' => $this->input->post('bundle-items' . 6),
            'lanyard' => $this->input->post('bundle-items' . 7),
            'stickerbook' => $this->input->post('bundle-items' . 8),
          ];
          $i++;
          $this->db->insert('order_bundle', $data_detail);
        }
      }

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan berhasil ditambahkan!</div>');
      redirect('merchandise/invoice/' . $this->input->post('no_order'));
    }
  }

  public function referral()
  {
    echo json_encode($this->db->get_where('tabel_referral', ['code' => $this->input->post('code')])->row_array());
  }

  public function invoice($id_order)
  {
    $this->cart->destroy();
    $data['data_order'] = $this->db->get_where('data_order', ['no_order' => $id_order])->row_array();
    $data['order_detail'] = $this->db->get_where('order_detail', ['no_order' => $id_order])->result_array();
    $data['order_bundle'] = $this->db->get_where('order_bundle', ['no_order' => $id_order])->result_array();
    $data['product'] = $this->db->get('tabel_product')->result_array();
    $data['tabel_referral'] = $this->db->get('tabel_referral')->result_array();

    $data['nav'] = 1;
    $data['merchandise'] = true;
    $data['merch_footer'] = true;

    $this->load->view('home/template/header');
    $this->load->view('home/template/navbar', $data);
    $this->load->view('merchandise/invoice', $data);
    $this->load->view('home/template/footer', $data);
  }

  public function tracking()
  {
    $this->form_validation->set_rules('keyword', 'Invoice', 'required|exact_length[12]');

    if ($this->form_validation->run() == FALSE) {
      $data['nav'] = 1;
      $data['merchandise'] = true;
      $data['merch_footer'] = true;

      $this->load->view('home/template/header');
      $this->load->view('home/template/navbar', $data);
      $this->load->view('merchandise/tracking');
      $this->load->view('home/template/footer', $data);
    } else {
      $keyword = $this->input->post('keyword');
      $this->db->select('*');
      $this->db->from('data_order');
      $this->db->like('no_order', $keyword);
      $data['data_order'] = $this->db->get()->row_array();

      $this->db->select('*');
      $this->db->from('order_detail');
      $this->db->like('no_order', $keyword);
      $data['order_detail'] = $this->db->get()->result_array();

      $this->db->select('*');
      $this->db->from('order_bundle');
      $this->db->like('no_order', $keyword);
      $data['order_bundle'] = $this->db->get()->result_array();

      $data['nav'] = 1;
      $data['merchandise'] = true;
      $data['merch_footer'] = true;

      $this->load->view('home/template/header');
      $this->load->view('home/template/navbar', $data);
      $this->load->view('merchandise/tracking', $data);
      $this->load->view('home/template/footer', $data);
    }
  }

  public function transferupload()
  {
    $data_order = $this->db->get_where('data_order', ['no_order' => $this->input->post('no_order')])->row_array();
    $old_image = $data_order['transfer'];
    if ($old_image) {
      unlink(FCPATH . 'public/merchandise/img/transfer/' . $old_image);
    }
    $upload_image = $_FILES['transfer']['name'];

    $data = [
      'id' => $data_order['id'],
      'no_order' => $data_order['no_order'],
      'receiver' => $data_order['receiver'],
      'phone' => $data_order['phone'],
      'address' => $data_order['address'],
      'province' => $data_order['province'],
      'city' => $data_order['city'],
      'postal' => $data_order['postal'],
      'courier' => $data_order['courier'],
      'package' => $data_order['package'],
      'weight' => $data_order['weight'],
      'shipping' => $data_order['shipping'],
      'subtotal' => $data_order['subtotal'],
      'referral' => $data_order['referral'],
      'total' => $data_order['total'],
      'status' => 'Sudah Upload',
      'transfer' => str_replace(' ', '_', $upload_image)
    ];
    if ($upload_image) {
      $config['allowed_types'] = 'jpg|png|JPG';
      $config['max_size'] = '2048';
      $config['upload_path'] = 'public/merchandise/img/transfer/';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('transfer')) {

        $this->upload->data('file_name');

        $this->db->where('no_order', $this->input->post('no_order'));
        $this->db->update('data_order', $data);

        $data['nav'] = 1;
        $data['merchandise'] = true;
        $data['merch_footer'] = true;

        $this->load->view('home/template/header');
        $this->load->view('home/template/navbar', $data);
        $this->load->view('merchandise/transfer');
        $this->load->view('home/template/footer', $data);
      } else {
        $redirect_page = $this->input->post('redirect_page');

        $this->session->set_flashdata('flash', 'Salah');
        redirect($redirect_page);
      }
    }
  }

  public function print($id)
  {
    $data['data_store'] = $this->db->get_where('data_store', ['id' => 1])->row_array();
    $data['data_order'] = $this->db->get_where('data_order', ['no_order' => $id])->row_array();
    $data['order_detail'] = $this->db->get_where('order_detail', ['no_order' => $id])->result_array();
    $data['order_bundle'] = $this->db->get_where('order_bundle', ['no_order' => $id])->result_array();

    $this->load->view('merchandise/invoice_print', $data);
  }
}
