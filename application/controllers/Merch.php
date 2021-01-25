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

  private $api_key = 'ded2a0a32bdfddc14fceb7f027d9c754';

  public function province()
  {
    echo "<option value''>--Pilih Provinsi--</option>";
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: $this->api_key"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      // echo $response;
      $array_response = json_decode($response, true);
      // echo '<pre>';
      // print_r($array_response['rajaongkir']['results']);
      // echo '</pre>';
      $data_province = $array_response['rajaongkir']['results'];
      foreach ($data_province as $province) {
        echo "<option value='" . $province['province_id'] . "' id_province='" . $province['province_id'] . "'>" . $province['province'] . "</option>";
      }
    }
  }

  public function city()
  {
    echo "<option value''>--Pilih Kota--</option>";
    $id_province = $this->input->post('id_province');

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$id_province",
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: $this->api_key"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      // echo $response;
      $array_response = json_decode($response, true);
      $data_city = $array_response['rajaongkir']['results'];
      foreach ($data_city as $city) {
        echo "<option value='" . $city['city_id'] . "' id_city='" . $city['city_id'] . "'>" . $city['city_name'] . "</option>";
      }
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

  public function courier()
  {
    echo "<option value''>--Pilih Paket--</option>";
    $origin = $this->db->get_where('data_store', ['id' => 1])->row_array();
    $kurir = $this->input->post('courier');
    $city = $this->input->post('city');
    $weight = $this->input->post('weight');
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=" . $origin['city'] . "&destination=" . $city . "&weight=" . $weight . "&courier=" . $kurir . "",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: $this->api_key"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      // echo $response;
      $array_response = json_decode($response, true);
      // echo '<pre>';
      // print_r($array_response['rajaongkir']['results'][0]['costs']);
      // echo '</pre>';
      $data_courier = $array_response['rajaongkir']['results'][0]['costs'];
      foreach ($data_courier as $courier) {
        echo "<option value='" . $courier['service'] . "' cost='" . $courier['cost'][0]['value'] . "'>" . $courier['service'] . " (" . $courier['cost'][0]['etd'] . " Hari)" . "</option>";
      }
    }
  }
}
