<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shipping extends CI_Controller
{
  private $api_key = 'ded2a0a32bdfddc14fceb7f027d9c754';

  public function province()
  {
    echo "<option>--Pilih Provinsi--</option>";
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
      $array_response = json_decode($response, true);
      $data_province = $array_response['rajaongkir']['results'];
      foreach ($data_province as $province) {
        echo "<option value='" . $province['province'] . "' id_province='" . $province['province_id'] . "'>" . $province['province'] . "</option>";
      }
    }
  }

  public function city()
  {
    echo "<option value=''>--Pilih Kota--</option>";
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
      $array_response = json_decode($response, true);
      $data_city = $array_response['rajaongkir']['results'];
      foreach ($data_city as $city) {
        echo "<option value='" . $city['city_name'] . "' id_city='" . $city['city_id'] . "'>" . $city['city_name'] . "</option>";
      }
    }
  }

  public function expedition()
  {
    echo "<option value=''>--Pilih Ekspedisi--</option>";
    echo "<option value='jne'>JNE</option>";
    echo "<option value='tiki'>TIKI</option>";
    echo "<option value='pos'>Pos Indonesia</option>";
  }

  public function courier()
  {
    echo "<option value=''>--Pilih Paket--</option>";
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
      $array_response = json_decode($response, true);
      $data_courier = $array_response['rajaongkir']['results'][0]['costs'];
      foreach ($data_courier as $courier) {
        echo "<option value='" . $courier['service'] . "' cost='" . $courier['cost'][0]['value'] . "' estimate='" . $courier['cost'][0]['etd'] . "'>" . $courier['service'] . " (" . $courier['cost'][0]['etd'] . " Hari)" . "</option>";
      }
    }
  }
}
