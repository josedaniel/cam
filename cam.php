<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	
	/*
		CAM: The Codeigniter Awesome Model
		Created by José Daniel Paternina Soto
		josedaniel.paterninasoto@gmail.com
		

		MIT Licensed

		Copyright (c) 2012-2013 José Daniel Paternina Soto

		Permission is hereby granted, free of charge, to any
		person obtaining a copy of this software and associated
		documentation files (the "Software"), to deal in the
		Software without restriction, including without limitation
		the rights to use, copy, modify, merge, publish,
		distribute, sublicense, and/or sell copies of the
		Software, and to permit persons to whom the Software is
		furnished to do so, subject to the following conditions:

		The above copyright notice and this permission notice
		shall be included in all copies or substantial portions of
		the Software.

		THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY
		KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
		WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
		PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS
		OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR
		OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
		OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
		SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
	*/

	class Cam extends CI_Model{

	    /*
		* get 				: Returns an array of records
		* @table[string] 	: Name of the table/object you want to fetch.
		* @order[array] 	: Ordering field. First element is the column, asc or desc second.
	    */
	    public function get($table,$order = array('id','asc')){
	    	$q = $this->db->order_by($order[0],$order[1])->get($table);
	    	return $q->result_array();
	    }


	    /*
		* get_where 		: returns an array of records-
		* @table[string] 	: Name of the table/object you want to fetch.
		* @condition[array]	: Parameters to filter with.
		* @order[array] 	: Ordering field. First element is the column, asc or desc second.
	    */
	    public function get_where($table, $condition = array(), $order = array('id','asc')){
	    	$q = $this->db->order_by($order[0],$order[1])->get_where($table,$condition);
	    	return $q->result_array();
	    }

	    /*
		* get_distinct_where: returns an array of records-
		* @table[string] 	: Name of the table/object you want to fetch.
		* @fields[string] 	: Name of the fields to the distinct sql sentence, comma separated if more than one
		* @condition[array]	: Parameters to filter with.
		* @order[array] 	: Ordering field. First element is the column, asc or desc second.
	    */
	    public function get_distinct_where($table, $fields, $condition = array(), $order = array('id','asc')){
	    	$this->db->distinct();
	    	$this->db->select($fields);
	    	$this->db->where($condition);
	    	$this->db->order_by($order[0],$order[1]);
	    	$q = $this->db->get($table);
	    	return $q->result_array();	
	    }


	    /*
		* create 			: returns the inserted id
		* @table[string] 	: Name of the table/object you want to fetch.
		* @data[array]		: Associative array containing the data to insert.
	    */
	    public function create($table,$data){
	    	$q = $this->db->insert($table,$data);
	    	return $this->db->insert_id();
	    }

	    /*
		* update 			: returns void
		* @table[string] 	: Name of the table/object you want to fetch.
		* @data[array]		: Associative array containing the data to insert.
		* @id[int] 			: id of the object to update 
	    */
	    public function update($table,$data,$id){
	    	$this->db->where('id',$id)->update($table,$data);
	    }


	    /*
		* update 			: returns void
		* @table[string] 	: Name of the table/object you want to fetch.
		* @data[array]		: Associative array containing the data to insert.
		* @condition[array] : condition to get updatable records 
	    */
	    public function update_where($table,$data,$condition){
	    	$this->db->where($condition)->update($table,$data);	
	    }

	    /*
		* delete 			: returns void
		* @table[string] 	: Name of the table/object you want to fetch.
		* @id[int] 			: id of the object to deactive 
	    */
	    public function delete($table,$id,$field = 'active'){
	    	$data = array($field => 0);
	    	$this->db->where('id',$id)->update($table,$data);
	    }

	    /*
		* delete_where 		: returns void
		* @table[string] 	: Name of the table/object you want to fetch.
		* @condition[array]	: Parameters to filter with.
	    */
	    public function delete_where($table,$condition = array(),$field = 'active'){
	    	$data = array($field => 0);
	    	$this->db->where($condition)->update($table,$data);	
	    }
            
        /*
		* total_remove 		: returns void
		* @table[string] 	: Name of the table/object you want to fetch.
		* @id[int] 			: id of the object to delete
	    */
	    public function total_remove($table,$id){
                    $this->db->delete($table, array('id' => $id));                         	
	    }

	    /*
		* total_remove_where 	: returns void
		* @table[string] 		: Name of the table/object you want to fetch.
		* @condition[array]		: Parameters to filter with.
	    */
	    public function total_remove_where($table,$condition = array()){                    
            $this->db->delete($table, $condition);	    	
	    }
            
        /*
        * sql              : returns an array of records
        * @sql[string]     : an SQL string
        */
        public function sql($sql) {
            $q = $this->db->query($sql);
            return $q->result_array();	
        }

	}

?>