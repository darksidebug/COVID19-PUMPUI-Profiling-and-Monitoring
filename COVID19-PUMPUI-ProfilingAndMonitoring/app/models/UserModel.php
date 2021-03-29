<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct(){

        parent::__construct();
        $this->load->database();
    }

    public function count_pum(){
        // $sql = "SELECT DISTINCT municipal FROM info";
        // $result = $this->db->query($sql)->result();
        $brgy = array();
        $sql_count_mun = "SELECT COUNT(DISTINCT municipal)as mun_count, municipal, COUNT(DISTINCT brgy) as brgy_count
        FROM info WHERE municipal LIKE '%Sogod%' ORDER BY municipal ";
        $result = $this->db->query($sql_count_mun)->result();

        foreach ($result as $key => $value) {
            $sql_count_brgy = "SELECT brgy FROM info WHERE municipal = '".$value->municipal."' ";
            $value->barangays = $this->db->query($sql_count_brgy)->result();

            $sql = "SELECT COUNT(brgy) as counts  FROM info where municipal = '".$value->municipal."' ";
            $value->mun_PUM_PUI_counts = $this->db->query($sql)->result();
        }

        foreach ($value->barangays as $key => $value) {
            $query = "SELECT COUNT(DISTINCT strt_purok) as PUM, strt_purok FROM info WHERE brgy = '".$value->brgy."' ";
            $value->purok = $this->db->query($query)->result();
        }

        $sql = "SELECT COUNT(pum_pui) as counts FROM info WHERE brgy = '".$value->brgy."' ";
        $brgy_count = $this->db->query($sql)->result();

        $sql = "SELECT COUNT(pum_pui) as counts FROM info WHERE pum_pui = 'pum' AND brgy = '".$value->brgy."' ";
        $brgy_pum = $this->db->query($sql)->result();

        $sql = "SELECT COUNT(pum_pui) as counts FROM info WHERE pum_pui = 'pui' AND brgy = '".$value->brgy."' ";
        $brgy_pui = $this->db->query($sql)->result();

        $sql_count_brgy = "SELECT DISTINCT municipal FROM info WHERE municipal LIKE '%Sogod%' ";
        $pui_pum = $this->db->query($sql_count_brgy)->result();

        foreach ($pui_pum as $key => $value) {
            $sql = "SELECT pum_pui, COUNT(pum_pui) as counts FROM info WHERE pum_pui = 'pui' AND municipal = '".$value->municipal."' ";
            $value->pui = $this->db->query($sql)->result();
        }

        $sql = "SELECT pum_pui, COUNT(pum_pui) as counts FROM info WHERE pum_pui = 'pui' AND municipal = '".$value->municipal."' ";
            $pui = $this->db->query($sql)->result();

        $sql = "SELECT pum_pui, COUNT(pum_pui) as counts FROM info WHERE pum_pui = 'pum' AND municipal = '".$value->municipal."' ";
        $pum = $this->db->query($sql)->result();

        $brgy = [];
        $sql = "SELECT DISTINCT municipal FROM info";
        $result_r = $this->db->query($sql)->result();

        foreach ($result_r as $key => $value) {
            $sql_count_brgy = "SELECT brgy FROM info WHERE municipal LIKE '%".$value->municipal."%' ";
            $brgy = $value->barangays = $this->db->query($sql_count_brgy)->result();

            foreach ($value->barangays as $key => $value) {

                $sql = "SELECT COUNT(pum_pui) as counts FROM info WHERE brgy = '".$value->brgy."' ";
                $value->brgy_count = $this->db->query($sql)->result();   
            } 
        }
        foreach ($brgy as $key => $value) {
            $sql = "SELECT COUNT(pum_pui) as 'pum_counts' FROM info WHERE pum_pui = 'pum' AND brgy = '".$value->brgy."' ";
            $value->brgy_pum = $this->db->query($sql)->result();

            $sql = "SELECT COUNT(pum_pui) as pui_counts FROM info WHERE pum_pui = 'pui' AND brgy = '".$value->brgy."' ";
            $value->brgy_pui = $this->db->query($sql)->result();
        }

        return ['one'=>$result, 'pui'=>$pui, 'pum'=> $pum, 'brgy_count'=>$brgy_count, 
                'brgy_pum'=> $brgy_pum, 'brgy_pui'=> $brgy_pui, 'new'=>$result_r];
    }

    public function sign_in($table, $email, $pass)
    {
                  $this->db->where('username', $email);
        $result = $this->db->get($table);
        if($result->num_rows() > 0){

            foreach ($result->result() as $row => $value) {
                
                if($this->hash_verify($pass, $value->user_pass))
                {
                    return ['result' => TRUE, 'user_type' => $value->user_type, 'user_info' => $value->info_id];
                }
            }
        }
        else{
            return ['result' => FALSE, 'user_type' => '', 'user_email' => ''];
            return FALSE;
        }
    }

    public function user_sign_up($table, $email, $pass, $type)
    {
        $data = array(
            'info_id' => '',
            'username'  => $email,
            'user_pass' => $this->hash_password($pass),
            'user_type'  => $type
        );
                            $this->db->insert($table, $data);
        $last_inserted_id = $this->db->insert_id();
        if($last_inserted_id){

            return ['result' => TRUE, 'user_type' => $type, 'user_email' => $email];
        }
        else{
            return ['result' => FALSE, 'user_type' => '', 'user_email' => ''];
            return FALSE;
        }
    }

    public function delete_record($code){
        $this->db->where('person_code', $code);
        $result = $this->db->get('info')->result();
        if($result){
            foreach($result as $key => $value) {
                $id = $value->id;
            }
            $this->db->where('info_id', $id);
            $result_t = $this->db->delete('travel_history');

            if($result_t){
                $this->db->where('info_id', $id);
                $result_u = $this->db->delete('user_account');
                if($result_u){
                    $this->db->where('person_code', $code);
                    $result_del = $this->db->delete('info');
                    if($result_u){
                        return true;
                    }
                    return false;
                }
                return false;
            }
            return false;
        }
    }

    public function sign_up($table, $username, $pass, $type, $return_id)
    {
        $account_data = array(
            'info_id' => $return_id,
            'username' => $username,
            'user_pass' => $this->hash_password($pass),
            'user_type' => $type
        );
                            $this->db->insert($table, $account_data);
        $last_inserted_id = $this->db->insert_id();
        if($last_inserted_id){

            return ['result' => TRUE, 'user_type' => $account_data['user_type']];
        }
        else{
            return ['result' => FALSE, 'user_type' => '', 'user_email' => ''];
            return FALSE;
        }
    }

    public function insert($table, $data)
    {
                  $this->db->insert($table, $data);
        $result = $this->db->insert_id();
        
        if(!empty($result))
        {
            return ['result' => TRUE, 'value' => $result];
        }
        else
        {
            return ['result' => FALSE, 'value' => ''];
            return FALSE;
        }
    }

    public function getChk_list(){
        $this->db->where('id', $this->session->userdata('user_info'));
            $result = $this->db->get('info')->result();

            foreach($result as $key => $value)
            {                  
                $sql = "SELECT DISTINCT(day) AS day FROM check_list where info_id = '". $value->id ."' ORDER BY day";
                $value->day = $this->db->query($sql)->result();
            }
    
            foreach($value->day as $key => $value)
            {                  
                $sql = "SELECT day, am, pm, temp, symptoms FROM check_list where day = '". $value->day ."' ORDER BY day";
                $value->checklist = $this->db->query($sql)->result();
            }
        
        if(!empty($result)){

            $sql = "SELECT DISTINCT day FROM check_list WHERE info_id = '".$this->session->userdata('user_info')."' ";
            $count = $this->db->query($sql);
            
            return ['result' => TRUE, 'value' => $result, 'count' => $count->num_rows()];
        }
        else{
            return ['result' => FALSE, 'value' => $result, 'count' => $count->num_rows()];
            return FALSE;
        }
    }

    public function getPUM_lists(){
        $result_value = array();
        $this->db->order_by('person_code');
        $result = $this->db->get('info')->result();
        foreach($result as $key => $value_r)
        {                  
            $sql = "SELECT start_q, end_q, info_id FROM travel_history where info_id = '". $value_r->id ."' ";
            $value_r->q_day = $this->db->query($sql)->result();

            $sql = "SELECT MAX(date_time_checked) AS date FROM check_list where info_id = '". $value_r->id ."' ";
            $value_r->date = $this->db->query($sql)->result();

            $sql = "SELECT count(symptoms) AS worst FROM check_list where info_id = '". $value_r->id ."' AND 
                        symptoms != 'no-symptoms' ";
            $count = $this->db->query($sql)->result();

            foreach($value_r->date as $key => $value)
            {                  
                $sql = "SELECT count(symptoms) AS count FROM check_list where date_time_checked = '". $value->date ."' AND symptoms != 'no-symptoms' ";
                $value->count = $this->db->query($sql)->result();
            }
        }

        foreach($result as $key => $value)
        {
            $sql = "SELECT DISTINCT day AS day FROM check_list where info_id = '". $value->id ."' ";
            $result_value = $value->days = $this->db->query($sql)->result();

            foreach($value->days as $key => $value)
            {                  
                $sql = "SELECT DISTINCT day, am, temp, symptoms FROM check_list where day = '". $value->day ."' AND am = 'am' ";
                $value->day_am = $this->db->query($sql)->result();

                $sql = "SELECT DISTINCT day, pm, temp, symptoms FROM check_list where day = '". $value->day ."' AND pm = 'pm' ";
                $value->day_pm = $this->db->query($sql)->result();

                $sql = "SELECT count(symptoms) AS worst, day FROM check_list where day = '". $value->day ."' AND 
                        symptoms != 'no-symptoms' ";
                $value->worst_symptoms = $this->db->query($sql)->result();
            }  
        }

        $sql = "SELECT count(symptoms) AS worst, day FROM check_list WHERE info_id = '". $value->id ."' AND 
                        symptoms != 'no-symptoms' ";
                $value->worst_symptoms = $this->db->query($sql)->result();

        if(!empty($result))
        {
            
            return ['result' => TRUE, 'value' => $result, 'count'=>$count];
        }
        else
        {
            return ['result' => FALSE, 'value' => ''];
            return FALSE;
        }
    }

    public function getPUM_lists_individual($search){
        $sql = "SELECT * FROM info where person_code = '". $search ."' OR brgy LIKE '%". $search ."%' OR municipal LIKE '%". $search ."%' ";
        $result = $this->db->query($sql)->result();
        foreach($result as $key => $value_r)
        {                  
            $sql = "SELECT start_q, end_q, info_id FROM travel_history where info_id = '". $value_r->id ."' ";
            $value_r->q_day = $this->db->query($sql)->result();

            $sql = "SELECT MAX(date_time_checked) AS date FROM check_list where info_id = '". $value_r->id ."' ";
            $value_r->date = $this->db->query($sql)->result();

            foreach($value_r->date as $key => $value)
            {                  
                $sql = "SELECT count(symptoms) AS count FROM check_list where date_time_checked = '". $value->date ."' AND symptoms != 'no-symptoms' ";
                $value->count = $this->db->query($sql)->result();
            }
        }

        foreach($result as $key => $value)
        {
            $sql = "SELECT DISTINCT day AS day FROM check_list where info_id = '". $value->id ."' ";
            $result_value = $value->days = $this->db->query($sql)->result();

            foreach($value->days as $key => $value)
            {                  
                $sql = "SELECT DISTINCT day, am, temp, symptoms FROM check_list where day = '". $value->day ."' AND am = 'am' ";
                $value->day_am = $this->db->query($sql)->result();

                $sql = "SELECT DISTINCT day, pm, temp, symptoms FROM check_list where day = '". $value->day ."' AND pm = 'pm' ";
                $value->day_pm = $this->db->query($sql)->result();

                $sql = "SELECT count(symptoms) AS worst, day FROM check_list where day = '". $value->day ."' AND 
                        symptoms != 'no-symptoms' ";
                $value->worst_symptoms = $this->db->query($sql)->result();
            }                
        }
        if(!empty($result))
        {
            $sql = "SELECT DISTINCT brgy AS Barangay FROM info where person_code = '". $search ."' OR brgy = '". $search ."' ";
            $PUM_PUI_result = $this->db->query($sql)->result();

            foreach ($PUM_PUI_result as $key => $value) {
                $sql = "SELECT COUNT(pum_pui) as counts  FROM info where brgy = '".$value->Barangay."' ";
                $value->brgy_PUM_PUI_counts = $this->db->query($sql)->result();
                
                $sql = "SELECT pum_pui  FROM info where brgy = '".$value->Barangay."' ";
                $value->PUM_PUI = $this->db->query($sql)->result();
                foreach ($value->PUM_PUI as $key => $value) {

                    $sql = "SELECT COUNT(pum_pui) AS counts  FROM info where pum_pui = '".$value->pum_pui."' ";
                    $value->count_PUM_PUI = $this->db->query($sql)->result();
                }
            }

            return ['result' => TRUE, 'value' => $result, 'pum_pui_result' => $PUM_PUI_result];
        }
        else
        {
            return ['result' => FALSE, 'value' => ''];
            return FALSE;
        }
    }

    public function getPUM_lists_limit($search){
        $result_value = array();
        $this->db->limit($search);
        $result = $this->db->get('info')->result();
        foreach($result as $key => $value_r)
        {                  
            $sql = "SELECT start_q, end_q, info_id FROM travel_history where info_id = '". $value_r->id ."' ";
            $value_r->q_day = $this->db->query($sql)->result();

            $sql = "SELECT MAX(date_time_checked) AS date FROM check_list where info_id = '". $value_r->id ."' ";
            $value_r->date = $this->db->query($sql)->result();

            foreach($value_r->date as $key => $value)
            {                  
                $sql = "SELECT count(symptoms) AS count FROM check_list where date_time_checked = '". $value->date ."' AND symptoms != 'no-symptoms' ";
                $value->count = $this->db->query($sql)->result();
            }
        }

        foreach($result as $key => $value)
        {
            $sql = "SELECT DISTINCT day AS day FROM check_list where info_id = '". $value->id ."' ";
            $result_value = $value->days = $this->db->query($sql)->result();

            foreach($value->days as $key => $value)
            {                  
                $sql = "SELECT DISTINCT day, am, temp, symptoms FROM check_list where day = '". $value->day ."' AND am = 'am' ";
                $value->day_am = $this->db->query($sql)->result();

                $sql = "SELECT DISTINCT day, pm, temp, symptoms FROM check_list where day = '". $value->day ."' AND pm = 'pm' ";
                $value->day_pm = $this->db->query($sql)->result();

                $sql = "SELECT count(symptoms) AS worst, day FROM check_list where day = '". $value->day ."' AND 
                        symptoms != 'no-symptoms' ";
                $value->worst_symptoms = $this->db->query($sql)->result();
            }                
        }
        if(!empty($result))
        {
            return ['result' => TRUE, 'value' => $result];
        }
        else
        {
            return ['result' => FALSE, 'value' => ''];
            return FALSE;
        }
    }

    public function getPUM_chkData($info_id){
        // $this->db->where('id', $info_id);
        // $this->db->order_by('person_code');
        // $result = $this->db->get('info')->result();
               
        $sql = "SELECT DISTINCT day AS day FROM check_list where info_id = '". $info_id ."' ";
        $result = $this->db->query($sql)->result();

        foreach($result as $key => $value)
        {                  
            $sql = "SELECT DISTINCT day, am, temp, symptoms FROM check_list where day = '". $value->day ."' AND am = 'am' ";
            $value->day_am = $this->db->query($sql)->result();
        }

        foreach($result as $key => $value)
        {                  
            $sql = "SELECT DISTINCT day, pm, temp, symptoms FROM check_list where day = '". $value->day ."' AND pm = 'pm' ";
            $value->day_pm = $this->db->query($sql)->result();
        }

        if(!empty($result))
        {
            return $result;
        }
        else
        {
            return FALSE;
        }
    }

    public function deleteChk_list($table, $info_id, $am_pm, $day, $symp){
                  $this->db->where('info_id', $info_id);
                  $this->db->where('am_pm', $am_pm);
                  $this->db->where('day', $day);
                  $this->db->where('symptoms', $symp);
        $result = $this->db->delete($table);
        if($result){

            return ['result' => TRUE];
        }
        else{
            return ['result' => FALSE];
            return FALSE;
        }
    }

    public function update($code, $data){
        $sql = "UPDATE info SET pum_pui = '".$data."' WHERE person_code = '".$code."' ";
        $result = $this->db->query($sql);
        if($result){

            return ['result' => TRUE];
        }
        else{
            return ['result' => FALSE];
            return FALSE;
        }
    }

    public function rem_ext_realse($code, $data){
        $sql = "UPDATE info SET remarks = '".$data."' WHERE person_code = '".$code."' ";
        $result = $this->db->query($sql);
        if($result){

            return ['result' => TRUE];
        }
        else{
            return ['result' => FALSE];
            return FALSE;
        }
    }

    private function hash_password($password){
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
    }

    private function hash_verify($password, $hashed_password){
        return password_verify($password, $hashed_password);
    }
}