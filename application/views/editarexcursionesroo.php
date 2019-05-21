           
            <div class="col-10">
                <table class="table table-striped custab">
                    <thead>
                    
                        <a id="dest" href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal"><b>+</b> Agregar tarifa</a>
                        <tr>
                            <th>ID</th>
                            <th>Pax</th>
                            <th>Tarifas</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <?php if($traslados):?>
                    <?php foreach($traslados->result() as $row): ?>
                    <tr>
                        <td><?php echo $row->id;?></td>
                        <td><?php echo $row->descripcion;?></td>
                        <td><?php echo $row->precio;?></td>
                        <td class="text-center">
                
                            <a class='btn btn-info btn-xs' href="<?php echo base_url()?>backend/editarTarifa/<?php echo $row->id;?>"> <span class="glyphicon glyphicon-edit"></span>editar tarifa</a> 
                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>Eliminar</a>
                        </td>
                    </tr>
                    
                    <?php endforeach;?>
                    <?php endif?>
                </table>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar zona de la excursion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formexcursionesRoo" method="post" action="<?php echo base_url()?>backend/GuardarZona">
        <div class="form-group">
            <label for="zona">Zona</label>
            <select name="id_zona" class="form-control">
            <option value="1">Q.Roo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tipo-traslado">Tipo de traslado</label>
            <select name="id_categorias_traslados" class="form-control">
            <option value="2">Traslado - excursión</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre de la excursion</label>
            <input name="nombre_del_destino" type="text" class="form-control" required>
        </div>         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form> 
    </div>
  </div>
</div>

