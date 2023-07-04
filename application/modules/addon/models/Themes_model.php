<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Themes_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function store($name)
    {
        $data=[
            'themename'=>$name,
            'status'=>0
        ];
        $this->db->insert('themes',$data);
        return TRUE;
    }
    //get default theme
    public function get_theme()
    {
        $theme = $this->db->select('themename')->from('themes')->where('status',1)->get()->row();
        return $theme->themename;
    }

    //get all theme
    public function get_themes()
    {
    	$this->db->order_by('status','desc');
        $themes = $this->db->select('*')->from('themes')->get()->result();
        return $themes;
    }


	//New Theme Activation
	public function new_theme_activation($theme_name)
	{
		$this->db->trans_start();

		$this->db->update('themes', array('status' => 1), array('themename' => $theme_name));

		$this->db->where('themename !=', $theme_name);
		$this->db->update('themes', array('status' => 0));

		$this->db->trans_complete();

		if($this->db->trans_status() == FALSE){
			return FALSE;
		} else {
			return TRUE;
		}
	}

	// Get all themes ids
	public function get_installed_themes_ids()
	{
		$this->db->select('themename');
		$themes = $this->db->get('themes')->result_array();
		$theme_ids = array_column($themes, 'themename');
		return $theme_ids;
	}
}