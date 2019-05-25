           
            <div class="col-10">
                <table class="table table-striped custab">
                    <thead>
                    
                        <a id="dest" href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#agregarTarifa"><b>+</b> Agregar tarifa</a>
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
                        <td>$<?php echo $row->precio;?></td>
                        <td class="text-center">
                
                            <a class='btn btn-info btn-xs btn-tarifa'  href="<?php echo base_url()?>backend/editaTarifaAjax/<?php echo $row->id;?>" rel="<?php echo $row->precio;?>" data-toggle="modal" data-target="#editaTarifa"> <span class="glyphicon glyphicon-edit"></span>edita tarifa</a> 
                            <a href="<?php echo base_url()?>backend/delTarifa/<?php echo $row->id;?>" class="btn btn-danger btn-xs delTarifa" data-toggle="modal" data-target="#delTarifa" rel="<?php echo $row->precio;?>" ><span class="glyphicon glyphicon-remove"></span>Eliminar</a> 
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php endif?>
                </table>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="agregarTarifa" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar tarifa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formexcursionesRoo" method="post" action="<?php echo base_url()?>backend/nuevaTarifa">
        <div class="form-group">
            <label for="Pax">Pax</label>
            <select name="id_rangos" class="form-control">
            <?php foreach($pax->result() as $row ):?>
            <option value="<?php echo $row->id_rangos_pax;?>"><?php echo $row->descripcion;?></option>
            <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <label for="tarifa">Tarifa</label>
            <input name="precio" type="number" step="any"  class="form-control" required>
            <input type="hidden" name="id_destino" value="<?php echo $this->uri->segment(3);?>">
            <input type="hidden" name="url_edicion" value="editarExcursionRoo">
        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button  type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form> 
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editaTarifa" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar tarifa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formexcursionesRoo" method="post" >
        <div class="form-group">
            <label for="tarifa">Nueva Tarifa</label>
            <input id="nuevaTarifa" name="precio" type="number" step="any"  class="form-control" required>
            <input type="hidden" name="id" value="<?php echo $this->uri->segment(3);?>">
        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="cambiaPrecio" type="button" class="btn btn-primary">Guardar</button>
      </div>
      </form> 
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="delTarifa" tabindex="-1" role="dialog" aria-labelledby="delTarifa" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="delTarifas" class="modal-body">
        ¿Desea eliminar la tarifa?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="delDestinoOK" type="button" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
</div>
