<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

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
	public function __construct()
	{
		parent::__construct();
		//loads the report_model
		$this->load->model('report_model');
	}

	public function index()
	{
        // load all data from database
		$data['leads'] = $this->report_model->get_all_leads();
        $result =$data['leads'];
        $this->load->view('partials/header',$data);
		$this->load->view('report_dashboard',$data);
	}

    public function update(){
        // Form Validations
        $this->form_validation->set_rules('from','Date','trim|required');
        $this->form_validation->set_rules('to','Date','trim|required');

		if($this->form_validation->run()===FALSE)
        {
            // if empty show validation errors
            $this->session->set_flashdata('error_date', validation_errors());
			
            $data['leads'] = $this->report_model->get_all_leads();
            $result =$data['leads'];
            //$this->load->view('partials/header',$data);
            //$this->load->view('report_dashboard',$data);
            redirect(base_url(),$data);
        }else
        {
            $data['leads'] = $this->report_model->get_lead_by_date($this->input->post(NULL, TRUE));
            $result =$data['leads'];
            $this->load->view('partials/header',$data);
            $this->load->view('report_dashboard',$data);
            
            
        }

        // var_dump($this->input->post(NULL, TRUE));
       
    }
}
