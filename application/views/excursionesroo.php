           
                
            

            <div class="col-10">
                <table class="table table-striped custab">
                    <thead>
                        <a id="dest" href="#" class="btn btn-primary btn-xs "><b>+</b> Agregar destino</a>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de la zona</th>
                            <th>Nombre del destino</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <?php foreach($traslados->result() as $row): ?>
                    <tr>
                        <td><?php echo $row->id;?></td>
                        <td><?php echo $row->nombre;?></td>
                        <td><?php echo $row->nombre_del_destino;?></td>
                        <td class="text-center">
                
                            <a class='btn btn-info btn-xs' href="#"> <span class="glyphicon glyphicon-edit"></span>Editar o agregar tarifas</a> 
                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </div>
