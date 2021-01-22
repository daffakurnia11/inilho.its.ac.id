<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Redirect extends CI_Controller
{
  public function short($shorten)
  {
    if ($this->db->where('shortenurl', $shorten)) {
      $result = $this->db->get('shorten_link')->row_array();

      redirect($result['urllink']);
    } else {
      redirect(base_url());
    }
  }
}
