<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends MX_Controller {

    private $table  = "language";
    private $phrase = "phrase";

    public function __construct()
    {
        parent::__construct();  
        $this->load->database();
        $this->load->dbforge(); 
        $this->load->helper('language');
        
        if (!$this->session->userdata('isAdmin')) 
            redirect('login');
        
    } 

    public function index()
    {
        $data['title']     = "Language List";
        $data['module']    = "dashboard";
        $data['languages'] = $this->languages();
        $this->load->view("language/main", $data);
    }

    public function phrase()
    {
        $this->load->library('pagination');
        $data['title']     = "Phrase List";
        $data['module']    = "dashboard";
        #
        #pagination starts
        #
        $config["base_url"]       = base_url('dashboard/language/phrase/'); 
        $config["total_rows"]     = $this->db->count_all('language'); 
        $config["per_page"]       = 15;
        $config["uri_segment"]    = 4; 
        $config["num_links"]      = 5;  
        /* This Application Must Be Used With BootStrap 4 * */
        $config['full_tag_open']='<ul class="pagination pagination-md">';
        $config['full_tag_close']='</ul>';
		$config['first_link'] = false;
		$config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item"><a class="page-link active">';
        $config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '<i class="ti-angle-right"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
		$config['prev_link'] = '<i class="ti-angle-left"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
		$config['last_link'] =false;
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["phrases"] = $this->phrases($config["per_page"], $page); 
        $data["links"] = $this->pagination->create_links(); 
        #
        #pagination ends
        # 
        $this->load->view("language/phrase", $data); 
    }
 

    public function languages()
    { 
        if ($this->db->table_exists($this->table)) { 

                $fields = $this->db->field_data($this->table);

                $i = 1;
                foreach ($fields as $field)
                {  
                    if ($i++ > 2)
                    $result[$field->name] = ucfirst($field->name);
                }

                if (!empty($result)) return $result;
 

        } else {
            return false; 
        }
    }


    public function addLanguage()
    { 
        $language = preg_replace('/[^a-zA-Z0-9_]/', '', $this->input->post('language',true));
        $language = strtolower($language);

        if (!empty($language)) {
            if (!$this->db->field_exists($language, $this->table)) {
                $this->dbforge->add_column($this->table, [
                    $language => [
                        'type' => 'TEXT'
                    ]
                ]); 
                $this->session->set_flashdata('message', 'Language added successfully');
                redirect('settings/6');
            } 
        } else {
            $this->session->set_flashdata('exception', 'Please try again');
        }
        redirect('settings/6');
    }


    public function editPhrase($language = null)
    { 
        $this->load->library('pagination');
        $data['title']     = "Edit Phrase";
        $data['module']    = "dashboard";
        $data['language'] = $language;
        $data['page']      = "language/phrase_edit";
        #
        #pagination starts
        #
        $config["base_url"]       = base_url('edit-phrase/'. $language); 
        $config["total_rows"]     = $this->db->count_all('language'); 
        $config["uri_segment"]    = 5; 
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data["phrases"] = $this->phrases($config["total_rows"], $page); 
        #
        #pagination ends
        #  
        echo modules::run('template/layout', $data);

    }
    public function datatable(){
		$params = $columns = $totalRecords = $data = array();
		$params = $_REQUEST;
	    $columns = array( 
		0 => 'id', 
		1 => 'phrase', 
	);

	$where = $sqlTot = $sqlRec = "";
	// check search value exist
	if(!empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( language.phrase LIKE '".$params['search']['value']."%')";
	}
	// getting total number records without any search
	$sql = "SELECT * FROM language";
	
	
	$sqlTot .= $sql;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($where) && ($where != '')) {
		$sqlTot .= $where;
		$sqlRec .= $where;
	}
	
 	$sqlRec .=  " ORDER BY ".$columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']." LIMIT ".$params['start']." ,".$params['length']." ";
	$SQLtotal=$this->db->query($sqlTot);
	$SQLoffer=$this->db->query($sqlRec);
	$totalRecords = $SQLtotal->num_rows();	
	$queryRecords=$SQLoffer->result();
	$i=0;
	foreach($queryRecords as  $value){
		$i++;
		$row = array();
		$row[] =$i;
		$row[] =$value->phrase;
        $data[] = $row;
		
		}
	
	$json_data = array(
			"draw"            => intval( $params['draw'] ),   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
			);

	echo json_encode($json_data);
	}
    public function add_phrase() {
        $data['title'] = display('phrase');

        $this->load->view('language/add_phrase', $data);
    }
    public function addPhrase() {  

        $lang = $this->input->post('phrase',TRUE); 

        if (sizeof($lang) > 0) {

            if ($this->db->table_exists($this->table)) {

                if ($this->db->field_exists($this->phrase, $this->table)) {

                    foreach ($lang as $value) {

                        $value = preg_replace('/[^a-zA-Z0-9_]/', '', $value);
                        $value = strtolower($value);

                        if (!empty($value)) {
                            $num_rows = $this->db->get_where($this->table,[$this->phrase => $value])->num_rows();

                            if ($num_rows == 0) { 
                                $this->db->insert($this->table,[$this->phrase => $value]); 
                                $this->session->set_flashdata('message', 'Phrase added successfully');
                            } else {
                                $this->session->set_flashdata('exception', 'Phrase already exists!');
                            }
                        }   
                    }  

                    redirect('settings/5');
                }  

            }
        } 

        $this->session->set_flashdata('exception', 'Please try again');
        redirect('phrase-list');
    }
 
    public function phrases($offset=null, $limit=null)
    {
        if ($this->db->table_exists($this->table)) {

            if ($this->db->field_exists($this->phrase, $this->table)) {

                return $this->db->order_by($this->phrase,'asc')
                    ->limit($offset, $limit)
                    ->get($this->table)
                    ->result();

            }  

        } 

        return false;
    }

    public function addLebel() { 
        $language = $this->input->post('language', TRUE);
        $phrase   = $this->input->post('phrase', TRUE);
        $lang     = $this->input->post('lang', TRUE);

        if (!empty($language)) {

            if ($this->db->table_exists($this->table)) {

                if ($this->db->field_exists($language, $this->table)) {

                    if (sizeof($phrase) > 0)
                    for ($i = 0; $i < sizeof($phrase); $i++) {
                        $this->db->where($this->phrase, $phrase[$i])
                            ->set($language,$lang[$i])
                            ->update($this->table); 

                    }  
                    $this->session->set_flashdata('message', 'Label added successfully!');
                    redirect($_SERVER['HTTP_REFERER']);

                }  

            }
        } 

        $this->session->set_flashdata('exception', 'Please try again');
        redirect('edit-phrase/'.$language);
    }
}



 