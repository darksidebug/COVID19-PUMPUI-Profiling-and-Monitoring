<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Controller{

		public function __construct(){
			parent::__construct();
            $this->load->library('session');
            $this->load->model('UserModel', 'user_model');
        }

        public function sign_in(){
            if(isset($_POST['logs']) && $_POST['logs'] == 'sign-in'){
                $return_result = $this->UserModel->sign_in('user_account', $this->input->post('user'), 
                          $this->input->post('pass'));
                if($return_result['result'] == TRUE){
                    $session = array(
                        'logged_in' => $return_result['result'],
                        'user_type' => $return_result['user_type'],
                        'user_info' => $return_result['user_info']
                    );
                    $this->session->set_userdata($session);
                    $user_data = array(
                        'login'      => true,
                        'user_type'  => $return_result['user_type'],
                        'message'    => 'Welcome!. You are now logged in successfully.'
                    );
                    echo json_encode($user_data);
                }
                else{
                    $user_data = array(
                        'login'      => false,
                        'user_type'  => $return_result['user_type'],
                        'message'    => "Sorry! No such user exists. Username or Password invalid!",
                    );
                    echo json_encode($user_data);
                }
            }
        }

        public function user_sign_up(){

            if(isset($_POST['action']) && $_POST['action'] == 'sign-up'){
    
                $email    = $this->input->post('email');
                $password = $this->input->post('pass');
                $type     = $this->input->post('type');
    
                // $user_type = ($type == 1 ? 'Super_Admin' : 'Client');
                $return_result = $this->user_model->user_sign_up('user_account', $email, $password, $type);
                if($return_result['result'] == TRUE){
    
                //     $session = array(
                //         'logged_in' => $return_result['result'],
                //         'user_type' => $user_type
                //     );
                //     $this->session->set_userdata($session);
    
                    $user_data = array(
                        'insert'     => true,
                        'user_type'  => $password,
                        'message'    => 'Welcome!. You are now logged in successfully.',
                        'user_email' => $email
                    );
    
                    echo json_encode($user_data);
                }
                else{
                    $user_data = array(
                        'login'      => false,
                        'user_type'  => '',
                        'message'    => "Sorry! Cannot save user account.",
                    );
                    echo json_encode($user_data);
                }
            }
        }

        public function sign_up(){
            $return_id = '';
            if(isset($_POST['logs']) && $_POST['logs'] == 'sign-up'){
                $full_add = $this->input->post('strt').", ".$this->input->post('brgy').', '.$this->input->post('mun').', '.$this->input->post('prov');
                $person_code = 'C-'.$this->rndString(3).strtoupper($this->input->post('mun')).date('m');
                $info_data = array(
                    'person_code' => $this->input->post('name'),
                    'age' => $this->input->post('age'),
                    'gender' => $this->input->post('sex'),
                    'strt_purok' => $this->input->post('strt'),
                    'brgy' => $this->input->post('brgy'),
                    'municipal' => $this->input->post('mun'),
                    'prov' => $this->input->post('prov'),
                    'home_tel' => $this->input->post('home'),
                    'mobile' => $this->input->post('mobile'),
                    'pum_pui' => $this->input->post('pum_pui'),
                    'remarks' => 'Quarantine'
                );
                $insert_info_result = $this->user_model->insert('info', $info_data);
                if($insert_info_result['result'] == TRUE){
                    $return_id = $insert_info_result['value'];
                    $travel_data = array(
                        'info_id' => $insert_info_result['value'],
                        'travel_ask' => $this->input->post('ask'),
                        'port_exit' => $this->input->post('port'),
                        'vehicle' =>$this->input->post('vehicle'),
                        'no' => $this->input->post('v_no'),
                        'departure' => $this->input->post('dept'),
                        'arrival' => $this->input->post('arrv'),
                        'start_q' => $this->input->post('start_q'),
                        'end_q' => $this->input->post('end_q')
                    );
                    $insert_travel_result = $this->UserModel->insert('travel_history', $travel_data);
                    if($insert_travel_result['result'] == TRUE){
                        
                        $insert_acc_result = $this->UserModel->sign_up('user_account', $this->input->post('user'),
                                             $this->input->post('pass'), 'Client', $return_id);
                        if($insert_acc_result['result'] == TRUE){
                //             $session = array(
                //                 'logged_in' => TRUE,
                //                 'user_type' => $insert_acc_result['user_type'],
                //                 'user_info' => $return_id
                //             );
                //             $this->session->set_userdata($session);
                            $user_data = array(
                                'insert'      => true,
                                'user_type'  => 'Client',
                                'message'    => 'Records saved successfully.'
                            );
                            echo json_encode($user_data);
                        }
                        else{
                            $user_data = array(
                                'insert'      => false,
                                'user_type'  => '',
                                'message'    => "Sorry! Cannot save PUM user account.",
                            );
                            echo json_encode($user_data);
                        }
                    }
                    else{
                        $user_data = array(
                            'insert'      => false,
                            'user_type'  => '',
                            'message'    => "Sorry! Cannot save PUM travel history.",
                        );
                        echo json_encode($user_data);
                    }
                }
                else{
                    $user_data = array(
                        'insert'      => false,
                        'user_type'  => '',
                        'message'    => "Sorry! Cannot save PUM personal info.",
                    );
                    echo json_encode($user_data);
                }
            }
        }

        // public function getChk(){
        //     $brgy = [];
        //     $sql = "SELECT DISTINCT municipal FROM info";
        //     $result = $this->db->query($sql)->result();

        //     foreach ($result as $key => $value) {
        //         $sql_count_brgy = "SELECT brgy FROM info WHERE municipal LIKE '%".$value->municipal."%' ";
        //         $brgy = $value->barangays = $this->db->query($sql_count_brgy)->result();

        //         foreach ($value->barangays as $key => $value) {
    
        //             $sql = "SELECT COUNT(pum_pui) as counts FROM info WHERE brgy = '".$value->brgy."' ";
        //             $value->brgy_count = $this->db->query($sql)->result();   
        //         } 
        //     }
        //     foreach ($brgy as $key => $value) {
        //         $sql = "SELECT COUNT(pum_pui) as pum_counts FROM info WHERE pum_pui = 'pum' AND brgy = '".$value->brgy."' ";
        //         $value->brgy_pum = $this->db->query($sql)->result();

        //         $sql = "SELECT COUNT(pum_pui) as pui_counts FROM info WHERE pum_pui = 'pui' AND brgy = '".$value->brgy."' ";
        //         $value->brgy_pui = $this->db->query($sql)->result();
        //     }

            

        //     echo '<pre>';
        //     print_r($result);
        // }

        // public function getChk_list(){
        //     if(isset($_POST['get']) && $_POST['get'] == 'list'){
        //         $insert_result = $this->user_model->getChk_list();
        //         // echo json_encode($insert_result);
        //         echo '<pre>';
        //     print_r($insert_result['value']);
        //     }
        // }

        public function getPUM_result(){
            if(isset($_POST['action']) && $_POST['action'] == 'get'){
                $result = $this->user_model->getPUM_chkData($this->input->post('id'));
                echo json_encode($result);
            }
        }

        // public function chklist(){
        //     $result_value = array();
        //     $this->db->where('id', 5);
        //     $result = $this->db->get('info')->result();
        //     foreach($result as $key => $value_r)
        //     {                  
        //         $sql = "SELECT start_q, end_q, info_id FROM travel_history where info_id = '". $value_r->id ."' ";
        //         $value_r->q_day = $this->db->query($sql)->result();
        //     }
        //     foreach($result as $key => $value)
        //     {                  
        //         $sql = "SELECT DISTINCT(day) AS day FROM check_list where info_id = '". $value->id ."' ORDER BY day";
        //         $result_value = $value->day = $this->db->query($sql)->result();
        //     }

        //     foreach($result_value as $key => $value)
        //     {                  
        //         $sql = "SELECT day, am, pm, temp, symptoms FROM check_list where day = '". $value->day ."' ORDER BY day";
        //         $value->checklist = $this->db->query($sql)->result();
        //     }

        //     echo '<pre>';
        //     print_r($result);
        // }

        // public function getPUM(){
        //     $brgy = array();
        //     $sql_count_mun = "SELECT municipal, brgy
        //     FROM info WHERE municipal LIKE '%Sogod%' ORDER BY municipal ";
        //     $result = $this->db->query($sql_count_mun)->result();
    
        //     foreach ($result as $key => $value) {
        //         $sql_count_brgy = "SELECT brgy FROM info WHERE municipal = '".$value->municipal."' ";
        //         $value->barangays = $this->db->query($sql_count_brgy)->result();

        //         foreach ($value->barangays as $key => $value) {
    
        //             $sql = "SELECT COUNT(pum_pui) as counts FROM info WHERE brgy = '".$value->brgy."' ";
        //             $brgy_count = $this->db->query($sql)->result();
    
        //             $sql = "SELECT COUNT(pum_pui) as pum_counts FROM info WHERE pum_pui = 'pum' AND brgy = '".$value->brgy."' ";
        //             $brgy_pum = $this->db->query($sql)->result();
    
        //             $sql = "SELECT COUNT(pum_pui) as pui_counts FROM info WHERE pum_pui = 'pui' AND brgy = '".$value->brgy."' ";
        //             $brgy_pui = $this->db->query($sql)->result();
        //         }
        //     }
    
            

            

        //     // $sql_count_brgy = "SELECT DISTINCT municipal FROM info WHERE municipal LIKE '%Sogod%' ";
        //     // $pui_pum = $this->db->query($sql_count_brgy)->result();
    
        //     echo '<pre>';
        //     print_r(['one'=>$result, 'brgy_count'=>$brgy_count, 'brgy_pum'=> $brgy_pum, 'brgy_pui'=> $brgy_pui]);
        //     // echo '<pre>';
        //     // print_r(['result'=>$result, 'count'=>$count]);
        // }

        public function check_list(){
            if(isset($_POST['action']) && $_POST['action'] == 'insert'){
                $chk_data = array(
                    'info_id'           => $this->session->userdata('user_info'),
                    'am'                => $this->input->post('am'),
                    'pm'                => $this->input->post('pm'),
                    'day'               => $this->input->post('date'),
                    'temp'              => $this->input->post('temp'),
                    'symptoms'          => $this->input->post('symptoms'),
                    'date_time_checked' => date('d-m-Y')
                );
                $insert_result = $this->user_model->insert('check_list', $chk_data);
                if($insert_result['result'] == TRUE){
                    $user_data = array(
                        'insert'     => true,
                        'info_id'    => $this->session->userdata('user_info'),
                        'message'    => "Check list information saved successfully.",
                    );
                    echo json_encode($user_data);
                }
                else{
                    $user_data = array(
                        'insert'      => false,
                        'message'    => "Failed to save check list information.",
                    );
                    echo json_encode($user_data);
                }
            }
        }

        public function delete_chk_list(){
            if(isset($_POST['action']) && $_POST['action'] == 'delete'){
                $delete_result = $this->user_model->deleteChk_list('check_list', $this->session->userdata('user_info'), 
                                 $this->input->post('am_pm'), $this->input->post('date'), $this->input->post('symptom'));
                if($delete_result['result'] == TRUE){
                    $user_data = array(
                        'insert'     => true,
                        'info_id'    => $this->session->userdata('user_info'),
                        'message'    => "Check list information deleted successfully.",
                    );
                    echo json_encode($user_data);
                }
                else{
                    $user_data = array(
                        'insert'      => false,
                        'message'    => "Failed to remove check list information.",
                    );
                    echo json_encode($user_data);
                }
            }
        }

        public function update_status(){
            // echo $this->input->post('code'), $this->input->post('pum_pui');
            $result = $this->user_model->update($this->input->post('code'), $this->input->post('pum_pui'));
            if($result['result'] == TRUE){
                $user_data = array(
                    'update'      => TRUE,
                    'message'    => "PUM/PUI status updated."
                );
                $this->session->set_flashdata($user_data);
                redirect('pages/pum_list/nw-chk-list');
            }
            else{
                $user_data = array(
                    'update'      => FALSE,
                    'message'    => "Cannot update PUM/PUI status!",
                );
                $this->session->set_flashdata($user_data);
                redirect('pages/pum_list/nw-chk-list');
            }
        }

        public function delete(){
            $result = $this->user_model->delete_record($this->input->post('code'));
            if($result){
                $user_data = array(
                    'delete'      => true,
                    'message'    => "Record successfully deleted."
                );
                echo json_encode($user_data);
            }
            else{
                $user_data = array(
                    'delete'      => false,
                    'message'    => "Cannot delete record!",
                );
                echo json_encode($user_data);
            }
        }

        public function update_ext_rel(){
            // echo $this->input->post('code'), $this->input->post('pum_pui');
            $result = $this->user_model->rem_ext_realse($this->input->post('code'), $this->input->post('ext_release'));
            if($result['result'] == TRUE){
                $user_data = array(
                    'update'      => TRUE,
                    'message'    => "PUM/PUI status updated."
                );
                $this->session->set_flashdata($user_data);
                redirect('pages/pum_list/nw-chk-list');
            }
            else{
                $user_data = array(
                    'update'      => FALSE,
                    'message'    => "Cannot update PUM/PUI status!",
                );
                $this->session->set_flashdata($user_data);
                redirect('pages/pum_list/nw-chk-list');
            }
        }

        public function user(){
            $this->session->sess_destroy();
            redirect('pages/credentials/sign-in');
        }

        private function hash_password($password){
            return password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
        }

        private function rndString($length) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
    
    }