<?php
class TodoModel extends CI_Model 
{  
	function __construct()  
      {  
         // Call the Model constructor  
         parent::__construct();  
      }  
    public function saveData($data) 
	{
		if($this->db->insert('task',$data))
		{
		return 1;	
		}
		else
		{
		return 0;	
		}
    }

	public function select(){
		$query = $this->db->get('task');  
		return $query->result();;  
	}

	public function getbyid($id){
		$this->db->where('id',$id);
        $q = $this->db->get('task')->row();
		return $q;
	}

	public function setbyid($id,$data){
		$this->db->where('id', $id);
		$result=$this->db->update('task', $data);
		if ($result){
			return 1;
		}
		return 0;
	}

	public function deletebyid($id){
		$this->db->where('id', $id);
		$result=$this->db->delete('task');
        if($result){
			return 1;
		}
		return 0;
	}
}
?>