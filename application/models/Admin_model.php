<?php

class Admin_model extends CI_Model {
   

    public function __construct()
    {
			
	parent::__construct();
              
    }

		

    

    function get_admin() 
	{
		
		$password=$this->input->post('password');
		$correo=$this->input->post('correo');
		//los marcados por comillas son los campos de la tabla
		$query=$this->db->get_where('Usuarios',array('correo'=>$correo));
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
			   
			  
			   $decodifica=$this->encrypt->decode($row->password);
			   if($decodifica==$password)
			   {
				return $row;   
				   }
				  
				  else{ FALSE;} 
				
				
			
			} 
		}
		
		
		
		
        
    }
}
