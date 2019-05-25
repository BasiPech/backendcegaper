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
                WHERE   A.id='.$id.'';
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

        public function set_destino(){
            if(!empty($_POST)) 
            {
                $id_zona=$this->input->post('id_zona');
                $id_categorias_traslados=$this->input->post('id_categorias_traslados');
                $nombre_del_destino=$this->input->post('nombre_del_destino');

                $data = array(
                    'id_zona' =>  $id_zona,
                    'id_categorias_traslados' => $id_categorias_traslados,
                    'nombre_del_destino' => $nombre_del_destino
                );
            $this->db->insert('destino', $data);
              $ultimo_id = $this->db->insert_id();  
              redirect('backend/editarExcursionRoo/'.$ultimo_id.'');

            }
        }

        
        public function set_tarifa(){
            if(!empty($_POST)) 
            {
                $id_rangos=$this->input->post('id_rangos');
                $precio=$this->input->post('precio');
                $id_destino=$this->input->post('id_destino');

                $data = array(
                    'id_rangos' =>  $id_rangos,
                    'precio' => $precio,
                    'id_destino' => $id_destino
                );
            $this->db->insert('tarifas', $data);
             
              redirect('backend/editarExcursionRoo/'.$id_destino.'');

            }
        }

        public function edita_tarifa(){
         $nuevaTarifa= $this->input->get('nuevaTarifa');
         $id= $this->uri->segment(3);
         $data = array(
            'precio'  => $nuevaTarifa
        );
        $this->db->where('id', $id);
        $this->db->update('tarifas', $data);
            
        }

        public function delDestino(){
            $id= $this->uri->segment(3);
            $data = array(
                'activo'  => 0
            );
            $this->db->where('id', $id);
            $this->db->update('destino', $data);
        }

        public function delTarifa(){
            $id= $this->uri->segment(3);
            $this->db->where('id', $id);
            $this->db->delete('tarifas');
        }


        public function get_excursionesRoo()
        {
                
            $sql='select A.id,  A.nombre_del_destino, C.nombre from destino A
            inner join categorias_traslados B on B.id =A.id_categorias_traslados
            inner join zona C on C.id = A.id_zona
            WHERE  B.id=2 AND A.activo =1';
            $query= $this->db->query($sql);
           
            if ($query->num_rows() > 0)
            {
                return  $query;    
            }

        }


        public function get_catalogopax(){
            $sql='select * from rangos_pax';
            $query= $this->db->query($sql);
            if ($query->num_rows() > 0)
            {
                return  $query;    
            }

        }
}

