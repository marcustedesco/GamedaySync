<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Time extends CI_Controller {

	/**
	 *	Default function. Loads index assignments view or routes to slugged assignment
	 **/
	public function index()
	{
		$this->load->model('time_model');      
	    $data = $this->time_model->getDeadline();
	    $data['time'] =  0;

		$this->load->view('include/header');
		$this->load->view('time',$data);
	}

	public function set() {

		if ( ! isset($_POST['userset']))
		{
			$this->load->model('time_model');
			$data = $this->time_model->getDeadline();
			$data['time'] =  0; //$this->input->post("deadline");

			$this->load->view('include/header');
			$this->load->view('set', $data);
		}
		else{
			$this->load->model('time_model');      
	    	$userset = $this->input->post("userset");
	    	$this->time_model->setDeadline($userset);
			$data = $this->time_model->getDeadline();
			$data['time'] = $userset;

			$this->load->view('include/header');
			$this->load->view('set', $data);
		}
	}

	private function _getDeadline() {

	}

}
