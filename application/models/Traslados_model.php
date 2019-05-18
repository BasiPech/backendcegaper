<?php
class Traslados_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }

        public function get_excursionesRoo()
        {

                
            $sql='select  C.id as id ,nombre_del_destino,  B.nombre as nombre from zona B 
            inner join destino A on A.id_zona =B.id 
            inner join tarifas C on C.id_destino = A.id
            inner join categorias_traslados D  on D.id = A.id_categorias_traslados
            WHERE B.id <= 1 
            AND D.id = 2
            Group by nombre_del_destino
            order by A.id';
            $query= $this->db->query($sql);
           
            if ($query->num_rows() > 0)
            {
                return  $query;    
            }

        }
}

