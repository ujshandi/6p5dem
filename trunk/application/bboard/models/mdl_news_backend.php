<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class mdl_news_backend extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getItem($num=0, $offset=0)
	{
		$this->db->flush_cache();		
		$this->db->order_by("NEWS_DATETIME", "asc");
		//return $this->db->get('BB_NEWS', $num, $offset);		return $this->db->get('BB_NEWS');
	}
	
	function getItemById($id)
	{
		$this->db->flush_cache();
		$this->db->where('NEWS_ID', $id);
		return $this->db->get('BB_NEWS');
	}

	function insert($data)
	{
		 $this->db->flush_cache();        $this->db->set('NEWS_TITLE', $data['NEWS_TITLE']);        $this->db->set('NEWS_BODY', $data['NEWS_BODY']);		$this->db->set('NEWS_DATETIME', 'TO_DATE(\''.$this->fungsi->setDateToDB($data['NEWS_DATETIME']).'\', \'YYYY-MM-DD\')', FALSE);        $this->db->set('NEWS_READ', $data['NEWS_READ']);        $this->db->set('URL', $data['URL']);        $this->db->set('IMAGE', $data['IMAGE']);        $this->db->set('DESKRIPSI', $data['DESKRIPSI']);        $result = $this->db->insert('BB_NEWS');
	}
	
	function update($id,$data)
	{
		/*$this->db->flush_cache();        $this->db->set('NEWS_TITLE', $data['NEWS_TITLE']);        $this->db->set('NEWS_BODY', $data['NEWS_BODY']);*/        //$this->db->set('NEWS_DATETIME',$data['NEWS_DATETIME'] , FALSE);	//	$this->db->set('NEWS_DATETIME', 'TO_DATE(\''.$this->fungsi->setDateToDB($data['NEWS_DATETIME']).'\', \'YYYY-MM-DD\')', FALSE);        /*$this->db->set('URL', $data['URL']);		$this->db->set('NEWS_READ', $data['NEWS_READ']);        $this->db->set('IMAGE', $data['IMAGE']);        $this->db->set('DESKRIPSI', $data['DESKRIPSI']); 
		$this->db->where('NEWS_ID', $id);
		$this->db->update('BB_NEWS', $data);*/						$this->db->flush_cache();		$this->db->set('NEWS_TITLE', $data['NEWS_TITLE']);        $this->db->set('NEWS_BODY', $data['NEWS_BODY']);		$this->db->set('NEWS_DATETIME', 'TO_DATE(\''.$this->fungsi->setDateToDB($data['NEWS_DATETIME']).'\', \'YYYY-MM-DD\')', FALSE);		$this->db->set('URL', $data['URL']);        $this->db->set('IMAGE', $data['IMAGE']);        $this->db->set('DESKRIPSI', $data['DESKRIPSI']); 		$this->db->where('NEWS_ID', $id);				$result = $this->db->update('BB_NEWS');				if($result) {			return TRUE;		}else {			return FALSE;		}		
	}		function get_data_edit($id){		$this->db->select('*');		$this->db->from('BB_NEWS');		$this->db->where('NEWS_ID', $id);		return $this->db->get();	}
	
	function delete($id)
	{
		$this->db->flush_cache();
		$this->db->delete('BB_NEWS', array('NEWS_ID' => $id));
	}
	
}