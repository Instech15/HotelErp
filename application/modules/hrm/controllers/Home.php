 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Home extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model(array(
            'Csv_model'
        )); 
        $this->load->library('csvimport');     
    }
    function index() {
        $data['title']            = display('attendance');  ;
        $data['addressbook']      = $this->Csv_model->get_addressbook();
        $data['dropdownatn']      =$this->Csv_model->Employeename();
        $data['module']           = "hrm";
        $data['page']             = "atnview";   
        echo Modules::run('template/layout', $data); 
    }
    function manageatn() {
        $data['title']            = display('attendance_report'); 
        $data['addressbook']      = $this->Csv_model->get_addressbook();
        $data['module']           = "hrm";
        $data['page']             = "manage_attendance";   
        echo Modules::run('template/layout', $data); 
    }
    function importcsv() {
        $data['addressbook'] = $this->Csv_model->get_addressbook();
        $data['error'] = '';    //initialize image upload error array to empty

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';

        $this->load->library('upload', $config);


        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('atnview', $data);
        } else {
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
            
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                       'employee_id'=>$row['employee_id'],
                       'date'      =>$row['date'],
                       'sign_in'   =>$row['sign_in'],
                       'sign_out'  =>$row['sign_out'],
                       'staytime'  =>$row['staytime'],
                   );
                    $this->Csv_model->insert_csv($insert_data);
                }
                $this->session->set_flashdata('success', 'Csv Data Imported Succesfully');

                echo '<script>window.location.href = "'.base_url().'hrm/attendance-list"</script>';
                
            } else 
            $data['error'] = "Error occured";
            $this->load->view('atnview', $data);
        }

    } 
    public function create_atten()
    { 
        $data['title'] = display('employee');
        $this->form_validation->set_rules('employee_id',display('employee_id'),'required|xss_clean');
        $date=date('Y-m-d');

        $signin=date("h:i:s a", time());
        $sin_time=date("H:i", time());
        $emp_id    = $this->input->post('employee_id',TRUE);

        $path = 'application/modules/';
        $map = directory_map($path);
        $modnames = array();
        if (is_array($map) && sizeof($map) > 0){
        $modnames = array_filter(array_keys($map));
        $modnames = preg_replace('/\W/', '', $modnames);
        }
        if (in_array("duty_roster", $modnames) === true && $this->db->table_exists('tbl_emproster_assign')) {
            $is_complete = array('is_complete'=>1);
            $this->db->where('emp_startroster_date',$date)
            ->where('CAST(emp_startroster_time AS TIME)<=',$sin_time)
            ->where('CAST(emp_endroster_time AS TIME)>=',$sin_time)
            ->where('emp_id',$emp_id)
            ->update("tbl_emproster_assign", $is_complete);
            
        } 
        
        if ($this->form_validation->run() === true) {

            $postData = array(
                'employee_id'    => $this->input->post('employee_id',TRUE),
                'date'           => $date,
                'sign_in'        => $signin,
            );   

            if ($this->Csv_model->atten_create($postData)) { 
                
                $this->session->set_flashdata('message', display('save_successfull'));
            } else {
                $this->session->set_flashdata('exception',  display('please_try_again'));
            }
            echo '<script>window.location.href = "'.base_url().'hrm/attendance-list"</script>';

            
        } else {
            $data['title']  = display('create');
            $data['module'] = "hrm";
            $data['page']   = "attendance_form";
            $data['dropdownatn'] =$this->Csv_model->Employeename();
            echo Modules::run('template/layout', $data);   
            
        }   
    }



    public function delete_atn($id = null) 
    { 
        $this->permission->method('hrm','delete')->redirect();

        if ($this->Csv_model->delete_attn($id)) {
            #set success message
            $this->session->set_flashdata('message',display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception',display('please_try_again'));
        }


        echo '<script>window.location.href = "'.base_url().'hrm/manage-attendance-list"</script>';
    }

    public function update_atn_form($id = null){
        $this->permission->method('hrm','delete')->redirect();
        $this->form_validation->set_rules('att_id',null,'required|max_length[11]|xss_clean');
        $this->form_validation->set_rules('employee_id',display('employee_id'),'required|xss_clean');
        $this->form_validation->set_rules('date',display('date')  ,'required|xss_clean');
        $this->form_validation->set_rules('sign_in',display('sign_in')  ,'required|xss_clean');
        $this->form_validation->set_rules('sign_out',display('sign_out'));
        $this->form_validation->set_rules('staytime',display('staytime'));



        if ($this->form_validation->run() === true) {

            $postData = array(
                'att_id'               => $this->input->post('att_id',TRUE),
                'employee_id'              => $this->input->post('employee_id',TRUE),
                'date'                 => $this->input->post('date',TRUE),
                'sign_in'              => $this->input->post('sign_in',TRUE),
                'sign_out'             => $this->input->post('sign_out',TRUE),
                'staytime'             => $this->input->post('staytime',TRUE),
            ); 
            
            if ($this->Csv_model->update_attn($postData)) { 
                $this->session->set_flashdata('message', display('successfully_updated'));
            } else {
                $this->session->set_flashdata('exception',  display('please_try_again'));
            }
            echo '<script>window.location.href = "'.base_url().'hrm/attendance-list"</script>';

        } else {
         $data['data']=$this->Csv_model->attn_updateForm($id);
         $data['module']      = "hrm";
         $data['dropdownatn'] =$this->Csv_model->Employeename();
         $data['query']       = $this->Csv_model->get_atn_dropdown($id);
         $data['page']        = "update_atn";   
         echo Modules::run('template/layout',$data); 
     }

 }
    //// checkout atn ///
 public function checkout(){
   $sign_out =  date("h:i:s a", time());
   $sign_in  =  $this->input->post('sign_in',TRUE);
   $in=new DateTime($sign_in);
   $Out=new DateTime($sign_out);
   $interval=$in->diff($Out);
   $stay =  $interval->format('%H:%I:%S');
   $postData =array(
    'att_id'               => $this->input->post('att_id',TRUE),
    'sign_out'             =>  $sign_out,
    'staytime'             => $stay,
); 
$update = $this->db->where('att_id',$this->input->post('att_id',TRUE))
            ->update("emp_attendance", $postData);
            if ($update) { 
                $this->session->set_flashdata('message', display('successfully_checkout'));
                  echo '<script>window.location.href = "'.base_url().'hrm/attendance-list"</script>';
            }

}

/* ########## Report Start ####################*/
public function report_user(){

    $data['title']            = display('attendance_list');
    $data['module']           = "hrm";
    $data['page']             = "user_views_report";   
    echo Modules::run('template/layout', $data); 
    }

    public function report_byId(){

        $data['title']            = display('attendance_list');
        $data['module']           = "hrm";
        $data['page']             = "attn_Id_report";   
        echo Modules::run('template/layout', $data); 
    }

    public function report_view(){

        $this->permission->module('hrm','read')->redirect();
        $data['title']            = 'Attendance Report';
        $format_start_date = $this->input->post('start_date', TRUE);
        $format_end_date   = $this->input->post('end_date', TRUE);
        $data['date']      = $format_start_date;
        $data['date']      = $format_end_date;
        $data['query']     = $this->Csv_model->userReport($format_start_date,$format_end_date);
        $data['module']    = "hrm";
        $data['page']      = "user_views_report";   
        echo Modules::run('template/layout', $data); 
    }
    public function AtnReport_view(){
        $this->permission->module('hrm','read')->redirect();
        $data['title']    = display('attendance_repor');
        $id            = $this->input->post('employee_id', TRUE);
        $start_date    = $this->input->post('s_date', TRUE);
        $end_date      = $this->input->post('e_date', TRUE);
        $data['employee_id']  = $id;
        $data['date']  = $start_date;
        $data['date']  = $end_date;
        $data['ab']   = $this->Csv_model->atnrp($id);
        $data['query'] = $this->Csv_model->search($id,$start_date,$end_date);

        $data['module']= "hrm";
        $data['page']  = "att_reportview";   
        echo Modules::run('template/layout', $data); 
    }
    public function atntime_report(){

        $data['title']            = display('attendance_list');
        $data['module']           = "hrm";
        $data['page']             = "Date_time_report";   
        echo Modules::run('template/layout', $data); 
    }

    public function AtnTimeReport_view(){

        $this->permission->module('hrm','read')->redirect();
        $data['title']           = display('attendance_repor');
        $date                 = $this->input->post('date',TRUE);
        $start_time           = $this->input->post('s_time',TRUE);
        $end_time             = $this->input->post('e_time',TRUE);
        $data['date']         = $date;
        $data['sign_in']      = $start_time;
        $data['sign_in']      = $end_time;
        $data['query']        = $this->Csv_model->search_intime($date,$start_time,$end_time);
        $data['module']       = "hrm";
        $data['page']         = "Date_time_report";   
        echo Modules::run('template/layout', $data); 
    }

    /**** ###### Id checking ######### */


    function attenlist() {
        $data['title']            = display('attendance_report');  ;
        $data['addressbook']      = $this->Csv_model->get_addressbook();
        $data['employelist']      = $this->Csv_model->Employeename();
        $data['module']           = "hrm";
        $data['page']             = "attendance_list";   
        echo Modules::run('template/layout', $data); 
    } 

    /*  atn edit */
    public function edit_atn_form($id = null){
        $this->permission->method('hrm','delete')->redirect();
        $this->form_validation->set_rules('att_id',null,'required|max_length[11]|xss_clean');
        $this->form_validation->set_rules('employee_id',display('employee_id'),'required|xss_clean');
        $this->form_validation->set_rules('date',display('date')  ,'required|xss_clean');
        $this->form_validation->set_rules('sign_in',display('sign_in')  ,'required|xss_clean');
        $this->form_validation->set_rules('sign_out',display('sign_out'),'xss_clean');
        $this->form_validation->set_rules('staytime',display('staytime'),'xss_clean');
        if ($this->form_validation->run() === true) {

            $postData = array(
                'att_id'               => $this->input->post('att_id',TRUE),
                'employee_id'          => $this->input->post('employee_id',TRUE),
                'date'                 => $this->input->post('date',TRUE),
                'sign_in'              => $this->input->post('sign_in',TRUE),
                'sign_out'             => $this->input->post('sign_out',TRUE),
                'staytime'             => $this->input->post('staytime',TRUE),
            ); 
            
            if ($this->Csv_model->update_attn($postData)) { 
                $this->session->set_flashdata('message', display('successfully_updated'));
            } else {
                $this->session->set_flashdata('exception',  display('please_try_again'));
            }
            echo '<script>window.location.href = "'.base_url().'hrm/attendance-list"</script>';

        } else {
		 $data['title']=display('update_attendance');
         $data['data']=$this->Csv_model->attn_updateForm($id);
         $data['module']      = "hrm";
         $data['dropdownatn'] =$this->Csv_model->Employeename();
         $data['query']       = $this->Csv_model->get_atn_dropdown($id);
         $data['page']        = "edit_attendance";   
         echo Modules::run('template/layout',$data); 
     }

 }

}
/*END OF FILE*/
