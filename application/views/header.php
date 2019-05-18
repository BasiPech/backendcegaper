<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()?>public/css/estilos.css">
    <title>Admin</title>
</head>

<body>
    <div id="header">
        <div class="container">
            <div class="row">
                <div id="logo" class="col-3">
                    <img src="<?php echo base_url()?>public/images/LOGO-HOME.png" alt="">
                </div>
                <div id="backend" class="col-6">
                    <p> <b>BACKEND</b> <br> Sistema administrador de recursos</p>
                </div>
                <div id="user" class="col-3">
                    <p>Hola <b><?php echo $this->session->datos_admin->nombre;?></b><br> <a href="<?php echo base_url()?>logout">cerrar sesion</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>