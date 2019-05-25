
    <div id="plecas" class="container">
        <div class="row">
            <div id="pleca" class="offset-md-2 col-md-10 ">
                <p><?php echo $title?> <?php echo @$destino->nombre_del_destino?> </p>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div id="table" class="container">
        <div class="row">
            <div id="menu" class="col-2">
                <ul>
                    <li>Quintana Roo</li>
                    <li><a href="<?php echo base_url()?>trasladosRoo">Traslados</a></li>
                    <li><a href="<?php echo base_url()?>excursionesRoo">Excursiones</a></li>
                </ul>
                <ul>
                    <li>Cuernavaca</li>
                    <li><a href="<?php echo base_url()?>trasladosCuernavaca">Traslados</a></li>
                    <li><a href="<?php echo base_url()?>excursionesCuernavaca">Excursiones</a></li>
                </ul>
            </div>