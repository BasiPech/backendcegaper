<?
class Admin extends CI_Model {
   
    /*
        Constructor del modelo, aqui establecemos
        que tabla utilizamos y cual es su llave primaria.
    */
    function __construct() {
        parent::__construct();
		
    }
    /*
        Con esta funcion comprobamos que exista el
        usuario en la base de datos, si es asi retornamos
        el contenido del registro, de lo contrario se
        retorna FALSE.
    */
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
