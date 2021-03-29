<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pages extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model('UserModel', 'user_model');
		}

		public function index(){
			redirect('pages/credentials/sign-in');
		}

		public function monitor($page = null){

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

			$this->load->view('template/head');
			$this->load->view('template/navigation-bar');
			$this->load->view('pages/'.$page);
			$this->load->view('template/footer');
		}

		public function view($page = null){

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

			$chk_list['data'] = $this->user_model->getChk_list();
			$this->load->view('template/head');
			$this->load->view('template/navigation-bar');
			$this->load->view('pages/'.$page, $chk_list);
			
			if($chk_list['data']['count'] == 0)
			{
				$this->load->view('template/day1');
			}if($chk_list['data']['count'] == 1)
			{
				$this->load->view('template/day2');
			}if($chk_list['data']['count'] == 2)
			{
				$this->load->view('template/day3');
			}
			if($chk_list['data']['count'] == 3)
			{
				$this->load->view('template/day4');
			}if($chk_list['data']['count'] == 4)
			{
				$this->load->view('template/day5');
			}if($chk_list['data']['count'] == 5)
			{
				$this->load->view('template/day6');
			}if($chk_list['data']['count'] == 6)
			{
				$this->load->view('template/day7');
			}if($chk_list['data']['count'] == 7)
			{
				$this->load->view('template/day8');
			}if($chk_list['data']['count'] == 8)
			{
				$this->load->view('template/day9');
			}if($chk_list['data']['count'] == 9)
			{
				$this->load->view('template/day10');
			}if($chk_list['data']['count'] == 10)
			{
				$this->load->view('template/day11');
			}if($chk_list['data']['count'] == 11)
			{
				$this->load->view('template/day12');
			}if($chk_list['data']['count'] == 12)
			{
				$this->load->view('template/day13');
			}if($chk_list['data']['count'] == 13)
			{
				$this->load->view('template/day14');
			}

			$this->load->view('template/page-footer');
			$this->load->view('template/footer');

		}

		public function credentials($page = null){
			
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

			if($page == 'sign-up')
			{
				if($this->session->userdata('user_type') == 'Client'){
					redirect('pages/index');
				}
				else{
					$this->load->view('template/head');
					$this->load->view('template/navigation-bar');
					$this->load->view('pages/'.$page);
					$this->load->view('template/footer');
				}
			}
			else{
				$this->load->view('template/head');
				$this->load->view('template/navigation-bar');
				$this->load->view('pages/'.$page);
				$this->load->view('template/footer');
			}
		}

		public function pum_list($page = null){

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

			if($page != 'nw-chk-list')
			{
				redirect('pages/index');
			}
			else{
				if($this->session->userdata('logged_in') === '' || $this->session->userdata('logged_in') === 'FALSE'){
					redirect('pages/index');
				}
				if($this->session->userdata('user_type') === 'Client' || $this->session->userdata('user_type') === 'Faculty'){
					redirect('pages/monitor/check-list');
				}
				else{
					$chk_list['data'] = $this->user_model->getPUM_lists();
					$data['count'] = $this->user_model->count_pum();
					$this->load->view('template/pum-head', $chk_list);
					$this->load->view('template/navigation-bar');
					$this->load->view('pages/'.$page, $data);
					$this->load->view('template/footer');
				}
			}
		}

		public function listing($page = null){

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

				$chk_list['data'] = $this->user_model->getPUM_lists();
				$data['count'] = $this->user_model->count_pum();
				$this->load->view('template/pum-head', $chk_list);
				$this->load->view('template/navigation-bar');
				$this->load->view('pages/chk-head');
				$this->load->view('pages/'.$page, $data);
				$this->load->view('pages/chk-footer');
				$this->load->view('template/footer');

		}

		public function list($page = null){

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

			if(empty($this->input->post('search'))){
				redirect('pages/pum_list/nw-chk-list');
			}
			$chk_list['data'] = $this->user_model->getPUM_lists_individual($this->input->post('search'));
			$data['count'] = $this->user_model->count_pum();
			$this->load->view('template/pum-head', $chk_list);
			$this->load->view('template/navigation-bar');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('template/footer');

		}

		public function load($page = null){

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			$chk_list['data'] = $this->user_model->getPUM_lists_limit($this->input->post('dt_length'));
			$data['count'] = $this->user_model->count_pum();
			$this->load->view('template/pum-head', $chk_list);
			$this->load->view('template/navigation-bar');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('template/footer');

		}

	}