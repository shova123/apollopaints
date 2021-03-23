<?php

class General_db_model extends CI_Model {

    function _construct() {
        parent ::__construct();
    }

    function insert($table, $array) {
        $this->db->set($array);
        $this->db->insert($table);
        return $this->db->insert_id();
    }

    function update($table, $array, $where = null) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        return $this->db->update($table, $array);
    }

    function delete($table, $where) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function get_row($table, $select = '*', $where = null, $order = null, $limit = null) {
        $this->db->select($select);
        if (!empty($where)) {
            $this->db->where($where); // user_id = $id;
        }
        if (!empty($order)) {
            $this->db->order_by($order, 'asc');
        }
        if (!empty($limit)) {
            $this->db->limit($limit);
        }
        $query = $this->db->get($table);
        return $query->row();
    }

    function get_result($table, $select = '*', $where = null, $order = null, $limit = null) {
        $this->db->select($select);
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($order)) {
            $this->db->order_by($order,'asc');
        }
        if (!empty($limit)) {
            $this->db->limit($limit);
        }
        $query = $this->db->get($table);
        return $query->result();
    }
    
    public function getByJoin($table1,$table2,$on,$where){
        $this->db->select("*");
        $this->db->from($table1);
        $this->db->join($table2,$on);
        $this->db->where($where);
        $result=$this->db->get();
        return $result->result();
    }

    function get_ByFields($table, $field = null, $value = null, $field2 = null, $value2 = null, $field3 = null, $value3 = null) {
        $this->db->select('*');
        if (!empty($value)) {
            $this->db->where($field, $value);
        }
        if (!empty($value2)) {
            $this->db->where($field2, $value2);
        }
        if (!empty($value3)) {
            $this->db->where($field3, $value3);
        }
        $query = $this->db->get($table);
        return $query->result();
    }

    function get_resultNotLike($table, $select = '*', $field = null, $value = null) {
        $this->db->select($select);
        if (!empty($value)) {
            $this->db->not_like($field, $value);
        }
        $query = $this->db->get($table);
        return $query->result();
    }

    function get_WhereIn($table, $field1 = null, $value1 = null) {
        $this->db->select('*');
        if (!empty($value1)) {
            $this->db->where_in($field1, $value1);
        }
//        if(!empty($value1)){
//            $this->db->where($field1,$value1);
//        }

        $query = $this->db->get($table);
        return $query->result();
    }

    function get_WhereNotIn($table, $field1 = null, $value1 = null) {
        $this->db->select('*');
        if (!empty($value1)) {
            $this->db->where_not_in($field1, $value1);
        }
//        if(!empty($value1)){
//            $this->db->where($field1,$value1);
//        }

        $query = $this->db->get($table);
        return $query->result();
    }

    function getById($table, $fieldId, $id, $select = '*') {
        $this->db->select($select);
        $this->db->where($fieldId . " = '" . $id . "'");
        $query = $this->db->get($table);
        return $query->row();
    }

    function getByLike($table, $field=null, $value=null,$field1=null, $value1=null) {
        $this->db->select('*');
        if (!empty($value)) {
            $this->db->where($field, $value);
        };
        if (!empty($value1)) {
            $this->db->like($field1, $value1);
        }
        $query = $this->db->get($table);
        return $query->row();
    }

    function value_exist($table, $field = null, $value = null, $field1 = null, $value1 = null) {
        if (!empty($value)) {
            $this->db->where($field, $value);
        }
        if (!empty($value1)) {
            $this->db->where($field1, $value1);
        }
        $this->db->from($table);
        if ($this->db->count_all_results() > 0)
            return true;
        else
            return false;
    }

}

?>
