<?php
	class PersonalModel extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->table = 'admins';
			$this->tbllog ='userlog';
                        $this->table2 = 'users';
			$this->tbllog2 ='users_userlog';
                       if($this->session->userdata('language')== 'french'){
                            $database_name = 'fr';
                        }else{
                            $database_name = 'default';
                        }
                    $this->db = $this->load->database($database_name, TRUE);
			
		}
		
		//check valid username and password
		function checkuser($username,$password){
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			return $this->db->get($this->table);
		}
                
                function users_checkuser($username,$password){
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			return $this->db->get($this->table2);
		}
	
	}
?>