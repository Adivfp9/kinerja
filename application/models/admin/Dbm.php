<?php
// Created BY. Fajar Antono
// fajar.antono988@gmail.com

class Dbm extends CI_Model
{

    /* CREATE */
    public function insert($table,$data)
    {
        $in = $this->db->insert($table,$data);
        if($in === TRUE) return TRUE;
        else return FALSE;
    }

    public function insert_id($table,$data)
    {
         if($this->db->insert($table, $data)) {
            return $this->db->insert_id();
        }
        return FALSE;
    }

    /* READ */
    public function sum_data($field,$table)
    {
        return $this->db->select_sum($field)->get($table);
    }

    public function sum_data_where($field,$table,$where)
    {
        return $this->db ->where($where)
                         ->select_sum($field)
                         ->get($table);
    }

    public function max_data($field,$table,$where=null)
    {
        if($where != null) {
            $this->db->where($where);
        }

        return $this->db->select_max($field)->get($table);
    }

    public function get_all_data($table,$limit=NULL,$order_by=NULL,$order_sort=NULL)
    {
        if (($order_by && $order_sort) != NULL) {
            $this->db->order_by($order_by,$order_sort);
        }

        $get = $this->db->get($table,$limit);

        return $get;
    }

    public function get_data_where($table,$where,$order_by=NULL,$order_sort=NULL,$limit=NULL)
    {
        if (($order_by && $order_sort) != NULL) {
            $this->db->order_by($order_by,$order_sort);
        }
        
        $get = $this->db ->where($where)
                         ->get($table,$limit);
        return $get;
    }

    public function get_data_where_in($table, $field_in, $where,$order_by=NULL,$order_sort=NULL,$limit=NULL)
    {
        if (($order_by && $order_sort) != NULL) {
            $this->db->order_by($order_by,$order_sort);
        }
               
        $get = $this->db->where_in($field_in, $where)
                         ->get($table,$limit);
                         #echo $this->db->last_query(); die();
        return $get;
    }

    public function get_one_data($table,$field,$where)
    {
        $get = $this->db ->select($field)
                         ->where($where)
                         ->get($table,1)
                         ->row();
        foreach ($get as $key) {
            return $key;
        }
    }

    public function id_to_name($table,$field,$id,$output_name) {
        $ci=& get_instance();
        $ci->load->database();

        $qry    = "SELECT * FROM ".$table." WHERE ".$field."='".$id."'";
        $exec   = $ci->db->query($qry);
        $a      = $exec->result_array();

        if($exec->num_rows()>0){
          foreach($a as $row){
            $data=$row[$output_name];
          }
        }
        return (empty($data)) ? "" : $data;;
    }

    public function select_distinct($field, $table, $order_by=NULL, $order_sort=NULL)
    {   if (($order_by && $order_sort) != NULL) {
            $this->db->order_by($order_by,$order_sort);
        }

        $get = $this->db->select($field)->distinct()->get($table);
        return $get;
    }

    // select,where,join 1 table
    public function get_data_where_join_1($table,$where,$join,$join_on)
    {
        $this->db->join($join,$join_on);
        return $this->get_data_where($table,$where);
    }
    

    public function get_data_where_join_2($field=NULL, $table1, $table2, $join_on, $join, $condition = NULL, $param_order = NULL, $order = NULL, $group = NULL, $offset = NULL, $limit = NULL) {
        if($field !== NULL){
            $this->db->select($field);
        }
        $this->db->from($table1);
        $this->db->join($table2, $join_on, $join);
        if ($condition != NULL) {
            $this->db->where($condition);
        }
        if (($param_order != NULL) && ($order != NULL)) {
            $this->db->order_by($param_order, $order);
        }
        if ($group != NULL) {
            $this->db->group_by($group);
        }
        if (($limit != NULL) && ($offset != NULL)) {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get();

        return $query;
    }

     function get_data_where_join_3($field=NULL, $table1, $table2, $table3, $join_on1, $join_on2, $join1, $join2, $condition = NULL, $param_order = NULL, $order = NULL, $group = NULL, $offset = NULL, $limit = NULL){
        if($field !== NULL){
            $this->db->select($field);
        }
        $this->db->from($table1);
        $this->db->join($table2, $join_on1, $join1);
        $this->db->join($table3, $join_on2, $join2);
        if ($condition != NULL) {
            $this->db->where($condition);
        }
        if (($param_order != NULL) && ($order != NULL)) {
            $this->db->order_by($param_order, $order);
        }
        if ($group != NULL) {
            $this->db->group_by($group);
        }
        if (($limit != NULL) || ($offset != NULL)) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        return $query;
    }

    function get_data_where_join_4($field=NULL, $table1, $table2, $table3, $table4, $join_on1, $join_on2, $join_on3, $join1, $join2, $join3, $condition = NULL, $param_order = NULL, $order = NULL, $group = NULL, $offset = NULL, $limit = NULL)
    {
        if($field !== NULL){
            $this->db->select($field);
        }
        $this->db->from($table1);
        $this->db->join($table2, $join_on1, $join1);
        $this->db->join($table3, $join_on2, $join2);
        $this->db->join($table4, $join_on3, $join3);
        if ($condition != NULL) {
            $this->db->where($condition);
        }
        if (($param_order != NULL) && ($order != NULL)) {
            $this->db->order_by($param_order, $order);
        }
        if ($group != NULL) {
            $this->db->group_by($group);
        }
        if (($limit != NULL) || ($offset != NULL)) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query;

    }

    function get_data_where_join_5($field=NULL, $table1, $table2, $table3, $table4, $table5, $join_on1, $join_on2, $join_on3, $join_on4, $join1, $join2, $join3, $join4, $condition = NULL, $param_order = NULL, $order = NULL, $group = NULL, $offset = NULL, $limit = NULL)
    {
        if($field !== NULL){
            $this->db->select($field);
        }
        $this->db->from($table1);
        $this->db->join($table2, $join_on1, $join1);
        $this->db->join($table3, $join_on2, $join2);
        $this->db->join($table4, $join_on3, $join3);
        $this->db->join($table5, $join_on4, $join4);
        if ($condition != NULL) {
            $this->db->where($condition);
        }
        if (($param_order != NULL) && ($order != NULL)) {
            $this->db->order_by($param_order, $order);
        }
        if ($group != NULL) {
            $this->db->group_by($group);
        }
        if (($limit != NULL) || ($offset != NULL)) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query;

    }

    function manual_query($qry)
    {
        return $this->db->query($qry);
    }

    /* UPDATE */
    function update_where_in($table, $where_in, $where,$data)
    {              
                  $this->db->where_in($where_in);
        $update = $this->dbm->where($where)->update($table,$data);
        if($update === TRUE)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function update($table,$where,$data)
    {
        $update = $this->db->where($where)->update($table,$data);
        if($update === TRUE)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /* DELETE */
    function delete($table,$where)
    {
        $del = $this->db->where($where)->delete($table);

        if($del === TRUE) return TRUE;
        else return FALSE;
    }

    function delete_all($table)
    {
        $this->db->empty_table($table);
    }

    /* OTHERS */
    function dropdown($table,$txt=NULL,$value,$name,$where=NULL, $order_by=NULL, $order_sort='ASC', $separator=NULL)
    {   
        if($order_by != NULL)
            $this->db->order_by($order_by, $order_sort);

        if($where == NULL)
        {
            $get = $this->get_all_data($table)->result();
        }
        else
        {
            $get = $this->get_data_where($table,$where)->result();
            #echo $this->db->last_query(); die();
        }

        $dropdown = $txt != NULL ? is_array($txt) ? $txt : array("" => $txt) : array();
        $nama = "";

        foreach($get as $key)
        {
            if(is_array($name))
            {
                foreach($name as $val)
                {
                    $nama .= $key->$val.$separator;
                }
                $nama = rtrim($nama, $separator);
            }
            else
            {
                $nama = $key->$name;
            }

            $dropdown[$key->$value] = $nama;
            $nama = "";
        }
        return $dropdown;
    }

    function dropdown_other($table,$txt=NULL,$value,$name,$where=NULL, $order_by=NULL, $order_sort='ASC',$separator=NULL)
    {   
        if($order_by != NULL)
            $this->db->order_by($order_by, $order_sort);

        if($where == NULL)
        {
            $get = $this->get_all_data($table)->result();
        }
        else
        {
            $get = $this->get_data_where($table,$where)->result();
        }

        $dropdown = $txt != NULL ? is_array($txt) ? $txt : array("" => $txt) : array();
        $nama = "";

        foreach($get as $key)
        {
            if(is_array($name))
            {
                foreach($name as $val)
                {
                    $nama .= $key->$val.$separator;
                }
                $nama = rtrim($nama, $separator);
            }
            else
            {
                $nama = $key->$name;
                $id   = $key->$value;
            }

            $dropdown[$key->$value] = $id. ".&nbsp;" .$nama;
            $nama = "";
        }
        return $dropdown;
    }
  
    function highest_id_plus_one($field,$table)
    {
        $get_max = $this->max_data($field,$table);
        
        return ($get_max->num_rows() == "0") ? "1" : $get_max->row()->$field+1;
    }

    function open_data_list($field,$typed,$table)
    {
        $get = $this->db->like($field, $typed, 'both')
                        ->get($table, 50);
        return $get->result();
    }

    function get_year($field,$table){

        $get_year = $this->db->select('YEAR(tbl_'.$table.'.'.$field.')AS year')        
                             ->group_by('YEAR(tbl_'.$table.'.'.$field.')')
                             ->get($table);

        return $get_year;
    }

}
