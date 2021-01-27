<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Talkshow extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->library('upload');
	}

	public function index()
	{
		$this->talkshow();
	}

	public function talkshow()
	{
		$this->session->sess_destroy();
		$query	= $this->m_data->get_all('talkshow');
		$check	= $query->num_rows();
		if ($check >= 850) {
			$this->load->view('talkshow/header');
			$this->load->view('talkshow/close_TS');
			$this->load->view('talkshow/footer');
		} else {
			$this->load->view('talkshow/header');
			$this->load->view('talkshow/home_TS');
			$this->load->view('talkshow/footer');
		}
	}

	public function form_ts()
	{
		$this->session->sess_destroy();
		$query	= $this->m_data->get_all('talkshow');
		$check	= $query->num_rows();
		if ($check >= 850) {
			$this->load->view('talkshow/header');
			$this->load->view('talkshow/close_TS');
			$this->load->view('talkshow/footer');
		} else {
			$this->load->view('talkshow/header');
			$this->load->view('talkshow/form_TS');
			$this->load->view('talkshow/footer');
		}
	}

	public function input_talkshow()
	{
		$email		= $this->input->post('email');
		$where	= array('email' => $email);
		$query	= $this->m_data->get_data($where, 'talkshow');
		$check	= $query->num_rows();

		if ($check == 1) {
			redirect('terdaftartalkshow');	
		} else {
			

			$nama		= $this->input->post('nama');
			$sekolah	= $this->input->post('sekolah');
			$hp			= $this->input->post('no_hp');
			$line		= $this->input->post('line');

			$info		= substr(implode(', ', $this->input->post('info')), 0);

			if ($this->input->post('lain') != NULL) {
				$info = $info.', '.$this->input->post('lain');
			}

			$config['file_name']			= 'bukti-'.$nama;
			$config['allowed_types']        = 'gif|jpg|png|pdf';


			$img = $this->upload->data('file_name');

			$data = array(
				'nama'		=>	$nama,
				'sekolah'	=>	$sekolah,
				'hp'		=>	$hp,
				'line'		=>	$line,
				'email'		=>	$email,
				'bukti'		=>	$img,
				'info'		=>	$info
			);

			$this->m_data->input_data($data,'talkshow');

			$session = array(
				'email' => $email,
				'status' => 'success'
			);

			$this->session->set_userdata($session);

			redirect('hasiltalkshow');
			
		}
	}

	public function search_talkshow()
	{
		$where	= array('email' => $this->input->post('email'));
		$query	= $this->m_data->get_data($where, 'talkshow');
		$check	= $query->num_rows();

		if ($check == 1) {
			$session = array(
				'email' => $this->input->post('email'),
				'status' => 'success'
			);
			$this->session->set_userdata($session);
			redirect('hasiltalkshow');		
		} else {
			redirect('hasiltalkshow');
		}
	}

	public function talkshow_hasil()
	{
		if ($this->session->status == "success") {
			$data['status'] = "BERHASIL";
		} else {
			$data['status'] = "GAGAL";
		}
		$this->load->view('talkshow/header');
		$this->load->view('talkshow/result_TS', $data);
		$this->load->view('talkshow/footer');
	}

	public function check_daftar_ts()
	{
		if ($this->session->status == "success") {
			$data['status'] = "BERHASIL";
		} else {
			$data['status'] = "GAGAL";
		}
		$this->load->view('talkshow/header');
		$this->load->view('talkshow/result_TS', $data);
		$this->load->view('talkshow/footer');
	}

	public function talkshow_available()
	{
		$this->load->view('talkshow/header');
		$this->load->view('talkshow/dupli_TS');
		$this->load->view('talkshow/footer');
	}

	public function opencampus()
	{
		$this->load->view('talkshow/header');
		$this->load->view('form_OC');
		$this->load->view('talkshow/footer');
	}

}
