<?php
class Page_model extends CI_Model{
	
		function __construct(){
			parent::__construct();
		}


	function get_result($table, $select = '*', $where = null) {
		$this->db->select($select);
		if(!empty($where)){
			$this->db->where($where);
		}
		$query=$this->db->get($table);
		return $query->result();
	}

    function get_pages($limit=NULL, $start=NULL, $where=NULL)
	{
		$sql = "SELECT * FROM ark_static_pages";
		if($where)
		$sql.= ' where'." ".$where;
		if($limit)
		$sql.= ' limit'." ".$limit;
		if($start)
		$sql.=",".$start;
		//echo $query=$this->db->last_query(); exit;
		//$this->db->limit($limit, $start);
		$query=$this->db->query($sql);
		
		
		return $query->result();
	}
	
        function get_Allpage($table,$filedName=null,$name=null,$filedName1=null,$name1=null)
	{
		$this->db->select('*');
                if($filedName && $name){
                    $this->db->where($filedName, $name);
                }
                if($filedName1 && $name1){
                    $this->db->where($filedName1, $name1);
                }
		$query = $this->db->get($table);
		return $query->result();
	}
        
	function get_page_by_id($page_id)
	{
		$this->db->select('*');
		$this->db->where('page_id', $page_id);
		$query = $this->db->get($this->table_name);
		return $query->row();
	}
	
        function get_package($table, $fieldName=null, $name=null,$fieldName1=null, $name1=null,$orderBy=null)
	{
		$this->db->select('*');
		if(!empty($name)){
                     $this->db->where($fieldName, $name);
                }
                if(!empty($name1)){
                     $this->db->where($fieldName1, $name1);
                }
                if ($orderBy){
			         $this->db->order_by($orderBy,'ASC');
                }
		$query = $this->db->get($table);
		return $query->result();
	}

function get_withoutLike($table, $fieldName=null, $name=null)
    {
        $this->db->select('*');
        if(!empty($name)){
             $this->db->not_like($fieldName, $name);
        }
        $query = $this->db->get($table);
        return $query->result();
    }
	function get_page($page_slug)
	{
		$this->db->select('*');
		$this->db->where('page_status','Enabled');
		$this->db->where('page_slug', $page_slug);
		$query = $this->db->get($this->table_name);
		return $query->row();
	}
        
        function get_category($table, $fieldName=null, $name=null,$fieldName1=null, $name1=null,$orderBy=null)
	{
		$this->db->select('*');
		if($fieldName && $name){
                    $this->db->where($fieldName, $name);
                }
                if($fieldName1 && $name1){
                    $this->db->where($fieldName1, $name1);
                }
                if ($orderBy){
			$this->db->order_by($orderBy,'ASC');
                }
		$query = $this->db->get($table);
		return $query->result();
	}
                
                

}		
?>