<?php
class Home_model extends CI_Model{

		function __construct(){
			parent::__construct();
		}
                public function add_email($data)
                {
                           $this->db->insert('tbl_sent_emails',$data);
                }




        function totalPages($table,$where=NULL)
	{
		$sql = "SELECT * FROM $table";
		//$sql = "SELECT * FROM  `tbl_news` sp, `tbl_newsevent_category` spc WHERE sp.ne_c_id= spc.id";
		if($where)
		$sql.= ' WHERE'." ".$where;
		$query=$this->db->query($sql);
		return $query->num_rows();
	}

	function get_pages($table,$limit=NULL,$start=NULL,$where=NULL)
	{

		$sql = "SELECT * FROM $table";
		if($where)
		$sql.= ' where'." ".$where;
		if($limit)
		$sql.= ' limit'." ".$limit;
//		if($start)
//		$sql.=",".$start;

		$this->db->limit($limit, $start);
//                echo $query=$this->db->last_query(); exit;
		$query=$this->db->query($sql);
//                print_r($query->result());die;
		return $query->result();
	}

        function get_test_pages($table,$limit,$start=NULL,$where=NULL)
	{

		$sql = "SELECT * FROM $table";
		$this->db->select("*")
                        ->from($table)
                  ->limit($limit,$start)
                 ->where($where)        ;
//            echo $query=$this->db->last_query(); exit;
          $result = $this->db->get()->result();

          return $result;
	}
         function get_byId($table, $fieldName=null, $name=null)
	{
                if( $fieldName && $name){
                     $this->db->where( $fieldName, $name);
                }
                 //$this->db->where( 'status', 'Publish');
//                if ($orderBy){
//			$this->db->order_by($orderBy,'DESC');
//                }
                //$this->db->where( $fieldId, $id);
		$query = $this->db->get( $table );
		return $query->row();
	}

        function get_bySlug($table, $fieldName=null, $name=null, $fieldName1=null, $name1=null)
	{
                if( $fieldName && $name){
                     $this->db->where( $fieldName, $name);
                }
                if( $fieldName1 && $name1){
                     $this->db->like( $fieldName1, $name1);
                }
                 //$this->db->where( 'status', 'Publish');
//                if ($orderBy){
//			$this->db->order_by($orderBy,'DESC');
//                }
                //$this->db->where( $fieldId, $id);
		$query = $this->db->get( $table );
		return $query->row();
	}

    function get_by_Slug($table, $fieldName=null, $name=null)
    {
        if( $fieldName && $name){
            $this->db->where( $fieldName, $name);
        }

        //$this->db->where( 'status', 'Publish');
//                if ($orderBy){
//			$this->db->order_by($orderBy,'DESC');
//                }
        //$this->db->where( $fieldId, $id);
        $query = $this->db->get( $table );
        return $query->result();
    }

        function get_row($table, $fieldName=null, $name=null, $fieldName1=null, $name1=null)
	{
                if( $fieldName && $name){
                     $this->db->where( $fieldName, $name);
                }
                if( $fieldName1 && $name1){
                     $this->db->where( $fieldName1, $name1);
                }
                $query = $this->db->get( $table );
            return $query->row();
	}
        function get_news_events($table, $fieldName=null, $name=null,$orderBy=null)
	{
                if($fieldName && $name){
                    $this->db->where( $fieldName, $name);
                }
                if($orderBy){
                    $this->db->order_by($orderBy,'DESC');
                }
                //$this->db->where( $fieldId, $id);
		$query = $this->db->get( $table );
		return $query->result();
	}
        function get_contents($table, $fieldName=null, $name=null,$orderBy=null)
	{
                if($fieldName && $name){
		 $this->db->where( $fieldName, $name);
                }
                if ($orderBy){
			$this->db->order_by($orderBy,'ASC');
                }
                //$this->db->where( $fieldId, $id);
		$query = $this->db->get( $table );
		return $query->result();
	}
        function get_contents_array($table, $fieldName=null, $name=null,$orderBy=null)
	{
                if($fieldName && $name){
		 $this->db->where( $fieldName, $name);
                }
                if ($orderBy){
			$this->db->order_by($orderBy,'ASC');
                }
                //$this->db->where( $fieldId, $id);
		$query = $this->db->get( $table );
		return $query->result_array();
	}
          function get_emailId($table)
	{


		$query = $this->db->get( $table );
		return $query->row();
	}
//======================================================================//======================================================================

        function get_packageByDisplayTypeID($table, $fieldName=null, $name=null ,$fieldName1=null, $name1=null,$fieldName2=null, $name2=null, $orderBy=null, $limit=null, $start=null)
	{
            if($fieldName && $name){
                $this->db->where( $fieldName, $name);
            }
            if($fieldName1 && $name1){
                $this->db->where( $fieldName1, $name1);
            }
            if($fieldName2 && $name2){
                $this->db->where( $fieldName2, $name2);
            }
                if ($orderBy){
			$this->db->order_by($orderBy,'ASC');
                }
                //$this->db->where( $fieldId, $id);
		//$query = $this->db->get( $table );
                if($limit){
                    $query = $this->db->get($table, $limit, $start);
                }else{
                    $query = $this->db->get($table);
                }

		return $query->result();
	}
        function get_packageByDisplayTypeIDRegion($table, $fieldName=null, $name=null ,$fieldName1=null, $name1=null,$fieldName2=null, $name2=null,$fieldName3=null, $name3=null, $orderBy=null, $limit=null, $start=null)
	{
            if($fieldName && $name){
                $this->db->where( $fieldName, $name);
            }
            if($fieldName1 && $name1){
                $this->db->where( $fieldName1, $name1);
            }
            if($fieldName2 && $name2){
                $this->db->where( $fieldName2, $name2);
            }
            if($fieldName3 && $name3){
                $this->db->where( $fieldName3, $name3);
            }
                if ($orderBy){
			$this->db->order_by($orderBy,'ASC');
                }
                //$this->db->where( $fieldId, $id);
		//$query = $this->db->get( $table );
                if($limit){
                    $query = $this->db->get($table, $limit, $start);
                }else{
                    $query = $this->db->get($table);
                }

		return $query->result();
	}
         function get_package_details( $table, $fieldName=null, $name=null,$fieldName1=null, $name1=null,$fieldName2=null, $name2=null,$orderBy=null)//function getByWhere( $table, $fieldName, $con, $select='*')
	{
		//$this->db->select($select);
		//$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' ");
                //$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' " ."and status  = 'Publish' ");
                if($fieldName && $name){
                    $this->db->where($fieldName, $name);
                }
                if($fieldName1 && $name1){
                    $this->db->where($fieldName1, $name1);
                }
                if($fieldName2 && $name2){
                    $this->db->where($fieldName2, $name2);
                }
                if ($orderBy){
                    $this->db->order_by($orderBy,'ASC');
                }
                //$this->db->where( $fieldId, $id);
		$query = $this->db->get($table);
		return $query->row();

	}
        function get_package_slider( $table, $fieldName=null, $name=null,$orderBy=null)//function getByWhere( $table, $fieldName, $con, $select='*')
	{
		//$this->db->select($select);
		//$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' ");
                //$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' " ."and status  = 'Publish' ");
                if($fieldName && $name){
                $this->db->where($fieldName, $name);
                }
                if ($orderBy){
			$this->db->order_by($orderBy,'ASC');
                }
                //$this->db->where( $fieldId, $id);
		$query = $this->db->get($table);
		return $query->result();
	}

//======================================================================//======================================================================


        function get_topic($table, $fieldName=null, $name=null)
	{
            $this->db->select("*");
            if(!empty($name)){
                $this->db->where($fieldName, $name);
            }
                $query = $this->db->get( $table );
		return $query->row();
	}
        function get_gallery($table, $fieldName=null, $name=null, $orderBy=null, $limit=null, $start=null)
	{
                if($fieldName && $name){
		 $this->db->where($fieldName, $name);
                }
                if($orderBy){
			$this->db->order_by($orderBy,'ASC');
                }
                //$this->db->where( $fieldId, $id);
		//$query = $this->db->get( $table );
                if($limit){
                    $query = $this->db->get( $table, $limit, $start );
                }else{
                    $query = $this->db->get($table);
                }
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
        function get_table( $table, $fieldName=null, $name=null,$orderBy=null)//function getByWhere( $table, $fieldName, $con, $select='*')
	{
		//$this->db->select($select);
		//$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' ");
                //$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' " ."and status  = 'Publish' ");
            if(!empty($name)){
                $this->db->where($fieldName, $name);
            }
            if ($orderBy){
                    $this->db->order_by($orderBy,'ASC');
            }
            //$this->db->where( $fieldId, $id);
            $query = $this->db->get($table);
            return $query->result();
	}
        function get_table_sorted( $table, $fieldName, $name,$orderBy=null,$limit=NULL,$start=NULL)//function getByWhere( $table, $fieldName, $con, $select='*')
	{
		//$this->db->select($select);
		//$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' ");
                //$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' " ."and status  = 'Publish' ");
                $this->db->where($fieldName, $name);
                if ($orderBy){
			$this->db->order_by($orderBy,'DESC');
                }
                //if($limit && $start){
                    $query = $this->db->get( $table ,$limit,$start);
                //}else{
                  //  $query = $this->db->get($table);
                //}

		return $query->result();
	}
        function get_home_package( $table, $fieldName, $name,$orderBy=null)//function getByWhere( $table, $fieldName, $con, $select='*')
	{
		//$this->db->select($select);
		//$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' ");
                //$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' " ."and status  = 'Publish' ");
                $this->db->where($fieldName, $name);
                $this->db->where('status', 'Publish');
                if ($orderBy){
			$this->db->order_by($orderBy,'ASC');
                }
                //$this->db->where( $fieldId, $id);
		$query = $this->db->get($table,4,0);
		return $query->result();
	}

         function get_popular_package_array( $table, $fieldName=null, $name=null,$orderBy=null,$limit=null,$start=null)//function getByWhere( $table, $fieldName, $con, $select='*')
	{
		//$this->db->select($select);
		//$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' ");
                //$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' " ."and status  = 'Publish' ");
                if($fieldName && $name){
                    if($fieldName == 'display_type'){
                        $this->db->where( $fieldName ." like '%".$name."%' ");
                    }else{
                        $this->db->where( $fieldName, $name);
                    }
                }
                $this->db->where('status', 'Publish');
                if ($orderBy){
			$this->db->order_by($orderBy,'ASC');
                }
                //$this->db->where( $fieldId, $id);
                if($limit){
                    $query = $this->db->get($table,$limit,$start);
                }else{
                    $query = $this->db->get($table);
                }
		return $query->result_array();
	}
        function get_relatedPackages($table, $fieldNot=null, $not=null ,$fieldName=null, $name=null ,$fieldName1=null, $name1=null,$fieldName2=null, $name2=null, $orderBy=null, $dateBy=null, $limit=null, $start=null)
	{
            if($fieldNot && $not){
                //$this->db->where( $fieldName, $name);
                $this->db->where("$fieldNot !=", $not);
            }
            if($fieldName && $name){
                $this->db->where( $fieldName, $name);
            }
            if($fieldName1 && $name1){
                if($fieldName1 == 'display_type'){
                    $this->db->where( $fieldName1 ." like '%".$name1."%' ");
                }else{
                    $this->db->where( $fieldName1, $name1);
                }
            }
            if($fieldName2 && $name2){
                $this->db->where( $fieldName2, $name2);
            }
                if (!empty($orderBy)){
			$this->db->order_by($orderBy,'ASC');
                }
                if (!empty($idBy)){
			$this->db->order_by($dateBy,'DESC');
                }
                if($limit){
                    $query = $this->db->get($table, $limit, $start);
                }else{
                    $query = $this->db->get($table);
                }

		return $query->result_array();
	}
        function get_packageByDisplayTypeARRAY($table, $fieldName=null, $name=null ,$fieldName1=null, $name1=null,$fieldName2=null, $name2=null, $orderBy=null, $dateBy=null, $limit=null, $start=null)
	{
            if($fieldName && $name){
                $this->db->where( $fieldName, $name);
            }
            if($fieldName1 && $name1){
                if($fieldName1 == 'display_type'){
                    $this->db->where( $fieldName1 ." like '%".$name1."%' ");
                }else{
                    $this->db->where( $fieldName1, $name1);
                }
            }
            if($fieldName2 && $name2){
                $this->db->where( $fieldName2, $name2);
            }
                if (!empty($orderBy)){
			$this->db->order_by($orderBy,'ASC');
                }
                if (!empty($idBy)){
			$this->db->order_by($dateBy,'DESC');
                }
                if($limit){
                    $query = $this->db->get($table, $limit, $start);
                }else{
                    $query = $this->db->get($table);
                }

		return $query->result_array();
	}
         function get_packageByDisplayType($table, $fieldName=null, $name=null ,$fieldName1=null, $name1=null,$fieldName2=null, $name2=null, $orderBy=null, $dateBy=null, $limit=null, $start=null)
	{
            if($fieldName && $name){
                $this->db->where( $fieldName, $name);
            }
            if($fieldName1 && $name1){
                if($fieldName1 == 'display_type'){
                    $this->db->where( $fieldName1 ." like '%".$name1."%' ");
                }else{
                    $this->db->where( $fieldName1, $name1);
                }
            }
            if($fieldName2 && $name2){
                $this->db->where( $fieldName2, $name2);
            }
                if (!empty($orderBy)){
			$this->db->order_by($orderBy,'ASC');
                }
                if (!empty($idBy)){
			$this->db->order_by($dateBy,'DESC');
                }
                if($limit){
                    $query = $this->db->get($table, $limit, $start);
                }else{
                    $query = $this->db->get($table);
                }

		return $query->result();
	}

         function get_slider( $table, $fieldName, $name,$orderBy=null)//function getByWhere( $table, $fieldName, $con, $select='*')
	{
		//$this->db->select($select);
		//$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' ");
                //$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' " ."and status  = 'Publish' ");
                $this->db->where($fieldName, $name);
                $this->db->where('status', 'Publish');
                if ($orderBy){
			$this->db->order_by($orderBy,'ASC');
                }
                //$this->db->where( $fieldId, $id);
		$query = $this->db->get($table,5,0);
		return $query->result();
	}


	 function get_dropdown( $table, $fieldName, $name,$orderBy)//function getByWhere( $table, $fieldName, $con, $select='*')
	{
		//$this->db->select($select);
		//$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' ");
                //$this->db->where( $fieldName ." = '".$name."' " ."and ". $fieldId."= '". $id ."' " ."and status  = 'Publish' ");
                $this->db->where( $fieldName, $name);

                $this->db->order_by($orderBy,'ASC');

                //$this->db->where( $fieldId, $id);
		$query = $this->db->get( $table );
		return $query->result();
	}

	function get_page_by_id($page_id)
	{
		$this->db->select('*');
		$this->db->where('page_id', $page_id);
		$query = $this->db->get($this->table_name);
		return $query->row();
	}

	function get_page($page_slug)
	{
		$this->db->select('*');
		$this->db->where('page_status','Enabled');
		$this->db->where('page_slug', $page_slug);
		$query = $this->db->get($this->table_name);
		return $query->row();
	}

	function story($table)
	{
		$this->db->select('*');

		$query = $this->db->get($table);
		return $query->row();
	}

	function get_banner()
	{
		$this->db->select('*');
		$this->db->where('banner_status','Published');
		$this->db->order_by('banner_id','asc');
		$query = $this->db->get('tbl_banners');
		return $query->result();
	}

        function get_member()
	{
		$this->db->select('*');
		$this->db->where('status','Publish');
		$this->db->order_by('id','asc');
		$query = $this->db->get('tbl_member');
		return $query->result();
	}

        function get_faq()
	{
		$this->db->select('*');
		$this->db->order_by('id','asc');
		$query = $this->db->get('tbl_faq');
		return $query->result();
	}


        function trek_nav($limit,$start,$where)
        {

            $this->db->select("r.region_name,r.keyword as region_keyword,r.id as region_id,p.package_name,p.keyword as package_keyword,p.id as package_id,p.trek_id,p.type,p.content,p.description,p.home_image,p.price,p.status")
         ->from('tbl_trek_region as r')
         ->join('tbl_package as p', 'r.id= p.trek_id')
//         ->group_by("p.type")
        ->limit($limit,$start)
         ->where($where)        ;
//            echo $query=$this->db->last_query(); exit;
          $result = $this->db->get()->result();

          return $result;

        }

        function tour_nav($limit,$start,$where)
        {

            $this->db->select("r.region_name,r.keyword as region_keyword,r.id as region_id,p.package_name,p.keyword as package_keyword,p.id as package_id,p.trek_id,p.type,p.content,p.description,p.home_image,p.price,p.status")
         ->from('tbl_tour_region as r')
         ->join('tbl_package as p', 'r.id= p.tour_id')
//         ->group_by("p.type")
        ->limit($limit,$start)
         ->where($where)        ;
//            echo $query=$this->db->last_query(); exit;
          $result = $this->db->get()->result();

          return $result;

        }
        function expedition_nav($limit,$start,$where)
        {

            $this->db->select("r.region_name,r.keyword as region_keyword,r.id as region_id,p.package_name,p.keyword as package_keyword,p.id as package_id,p.trek_id,p.type,p.content,p.description,p.home_image,p.price,p.status")
         ->from('tbl_expedition_region as r')
         ->join('tbl_package as p', 'r.id= p.region_id')
//         ->group_by("p.type")
        ->limit($limit,$start)
         ->where($where)        ;
//            echo $query=$this->db->last_query(); exit;
          $result = $this->db->get()->result();

          return $result;

        }

        function getPackages($country = null,$activityID = null,$regionID = null,$keyword = null) {

                $sql  = " SELECT p.link,p.package_title,p.package_slug,p.package_image,p.package_duration,p.package_cost,p.package_description";
                $sql .= " FROM exo_package as p";
                $sql .= " LEFT JOIN exo_activity as a on p.activity_id = a.activity_id";
                $sql .= " LEFT JOIN exo_region as r on p.region_id = r.region_id";
                $sql .= " WHERE p.status = 'Publish' ";

            if(!empty($country)){


                $sql .= " AND p.link = '$country'";
            }

            if(!empty($activityID)){

                $sql .= " AND p.activity_id = '$activityID'";

            }

            if(!empty($regionID)){

                $sql .= " AND p.region_id = '$regionID'";
            }

            if(!empty($keyword)){
                $sql .= " AND (";
                    $sql .= " p.package_title like '%$keyword%'";
                    $sql .= " OR p.link like '%$keyword%'";
                    $sql .= " OR p.display_type like '%$keyword%'";
                    $sql .= " OR r.region_title like '%$keyword%'";
                    $sql .= " OR a.activity_title like '%$keyword%'";
                $sql .= ")";
            }
                //$sql = "SELECT p.TEMP_ID,p.GROUP_ID,p.USER_ID,p.C_USER_ID, p.TOKEN, p.TEMPLATE_TITLE, p.TEMPLATE_DESCRIPTION, a.FIRST_NAME,a.LAST_NAME,r.CATEGORY_TITLE, sr.SUBCATEGORY_TITLE FR OM tbl_users_templates t INNER JOIN tbl_users u on p.user_id = a.user_id INNER JOIN tbl_category c on p.category_id = r.category_id INNER JOIN tbl_category_sub sc on p.sub_cat_id = sr.sub_cat_id WH ERE p.c_user_id='$userID' AND (p.template_title like '%$keyword%' OR p.tag_keywords like '%$keyword%' OR r.category_title like '%$keyword%' OR sr.subcategory_title like '%$keyword%' OR a.username like '%$keyword%' OR a.first_name like '%$keyword%' OR a.last_name like '%$keyword%' OR a.email like '%$keyword%')";
                $querySearch = $this->db->query($sql);
                return $querySearch->result();
    }


    function getJoinPackages($type=null,$limit = null) {

        $sql  = " SELECT p.link,p.package_id,p.package_image,p.package_title,p.package_departure,p.package_slug,p.display_type,a.activity_title,r.region_title,p.package_duration,p.package_cost,a.activity_slug,r.region_slug";
        $sql .= " FROM exo_package as p";
        $sql .= " LEFT JOIN exo_activity as a on p.activity_id = a.activity_id";
        $sql .= " LEFT JOIN exo_region as r on p.region_id = r.region_id";
        $sql .= " WHERE p.status = 'Publish'";
        // $sql .= " ORDER BY 'p.order' ASC";
        if(!empty($type)){
            $sql .= " AND p.display_type like '%$type%' ";
        }
        if(!empty($limit)){
        $sql .= "limit $limit";
        }
       $querySearch = $this->db->query($sql);
        return $querySearch->result();
        }

        function getJoinRegion($type=null,$limit = null) {

        $sql  = " SELECT a.activity_title,a.activity_slug,r.region_title,r.region_slug,r.link";
        $sql .= " FROM exo_region as r";
        $sql .= " LEFT JOIN exo_activity as a on r.activity_id = a.activity_id";
//        $sql .= " LEFT JOIN exo_region as r on p.region_id = r.region_id";
        $sql .= " WHERE r.status = 'Publish'";
        // $sql .= " ORDER BY 'p.order' ASC";
        if(!empty($type)){
            $sql .= " AND r.display_type like '%$type%' ";
        }
        if(!empty($limit)){
        $sql .= "limit $limit";
        }
        $querySearch = $this->db->query($sql);
        return $querySearch->result();
        }

    function getJoinPackageByField($field = null,$slug=null) {

        $sql  = " SELECT p.link,p.package_id,p.package_image,p.package_title,p.package_departure,p.package_slug,p.display_type,a.activity_title,r.region_title,p.package_duration,p.package_cost,a.activity_slug,r.region_slug";
        $sql .= " FROM exo_package as p";
        $sql .= " LEFT JOIN exo_activity as a on p.activity_id = a.activity_id";
        $sql .= " LEFT JOIN exo_region as r on p.region_id = r.region_id";
        $sql .= " WHERE p.status = 'Publish' AND p.$field = '$slug'";
        // $sql .= " ORDER BY 'order' ASC";
        // $sql .= " AND p.display_type like '%$type%' ";

       $querySearch = $this->db->query($sql);
        return $querySearch->result();
        }


}
?>
