<?php
 
 
class Employee_model extends CI_Model{
 
    public function getAll(){
        $query= $this->db->get('employees');
        return $query->result();
    }
 
    public function insertData($data){
        return  $this->db->insert('employees',$data);
        
    }

    public function getById($ID){
        $query= $this->db->get_where('employees',array('id'=>$ID) );
        return $query->result();
    }

    public function updateData($data,$ID){

        $this->db->get_where('employees',array('id'=>$ID) );
       return $this->db->update('employees',$data);
   
    }
}
?>