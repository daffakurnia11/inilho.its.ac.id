<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comingsoon extends CI_Controller {
	public function index()
	{
		$this->load->view('commingsoon');
	}
}
