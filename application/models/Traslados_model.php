<?php
class Traslados_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }

        public function get_tarifasTraslados()
        {
            if($this->uri->segment(3))
            {
                $id=$this->uri->segment(3);
                $sql='select  B.id, descripcion, precio from destino A
                inner join tarifas B on B.id_destino = A.id
                inner join rangos_pax C on C.id_rangos_pax = B.id_rangos
                WHERE  A.id='.$id.'';
                $query= $this->db->query($sql);
                if ($query->num_rows() > 0)
                {
                    return  $query;    
                }

            }
            else{
                redirect('excursionesRoo');
            }
        }

        public function get_destino(){

            if($this->uri->segment(3))
            {
                $id=$this->uri->segment(3);
                $sql='select  * from destino  WHERE  id='.$id.'';
                $query= $this->db->query($sql);
                if ($query->num_rows() > 0)
                {
                    foreach ($query->result() as $row)
                    {
                        return  $row;   
                    }
                }
            }
            else{
                redirect('excursionesRoo');
            }

        }

        public function get_excursionesRoo()
        {
                
            $sql='select A.id,  A.nombre_del_destino, C.nombre from destino A
            inner join categorias_traslados B on B.id =A.id_categorias_traslados
            inner join zona C on C.id = A.id_zona
            WHERE  B.id=2 ';
            $query= $this->db->query($sql);
           
            if ($query->num_rows() > 0)
            {
                return  $query;    
            }

        }
}

