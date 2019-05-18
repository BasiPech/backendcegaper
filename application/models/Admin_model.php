<?php

class Admin_model extends CI_Model {
   

    public function __construct()
    {
			
	parent::__construct();
              
    }
	
    

    function get_admin() 
	{
		
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		
		//los marcados por comillas son los campos de la tabla
		$query=$this->db->get_where('Usuarios',array('correo'=>$username));
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
			   $decodifica=$this->encryption->decrypt($row->password);			
			   if($decodifica==$password)
			   {
				return $row;   
				}
				  
				else
				{	 
				FALSE;
				} 				
			
			} 
		}
		
		
		
		
        
    }
}
