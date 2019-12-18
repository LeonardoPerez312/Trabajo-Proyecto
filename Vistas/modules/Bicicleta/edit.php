<?php
require("../../partials/routes.php");
require("../../../App/Controllers/BicicletasController.php");


use App\Controllers\BicicletasController; ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= getenv('TITLE_SITE') ?> | Editar Bicicleta</title>
    <?php require("../../partials/head_imports.php"); ?>
</head>
<body class="hold-transition sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">

    <?php require("../../partials/sliderbar_main_menu.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Nueva Bicicleta</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= $baseURL; ?>/Vistas/">Trabajo-Proyecto</a></li>
                            <li class="breadcrumb-item active">Inicio</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <?php if(!empty($_GET['respuesta'])){ ?>
                <?php if ($_GET['respuesta'] == "error"){ ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Error!</h5>
                        Error al crear Bicicleta: <?= ($_GET['mensaje']) ?? "" ?>
                    </div>
                <?php } ?>
            <?php } else if (empty($_GET['id'])) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Error!</h5>
                    Faltan criterios de busqueda <?= ($_GET['mensaje']) ?? "" ?>
                </div>
            <?php } ?>

            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Bicicleta </h3>
                </div>
                <!-- /.card-header -->
                <?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
                    <p>
                    <?php
                    $DataBicicleta = \App\Controladores\BicicletasController::searchForID($_GET["id"]);
                    if(!empty($DataBicicleta)){
                        ?>
                        <!-- form start -->
                <form class="form-horizontal" method="post" id="frmCreateUsuario" name="frmCreateUsuario" action="../../../App/Controladores/BicicletasController.php?action=crear">
                            <input id="id" name="id" value="<?php echo $DataBicicleta->getId(); ?>" hidden required="required" type="text">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Referencia" class="col-sm-2 col-form-label">Referencia</label>
                                    <div class="col-sm-10">
                                        <input required type="text" class="form-control" id="Referencia" name="Referencia" value="<?= $DataBicicleta->getReferencia(); ?>" placeholder="Ingrese su Referencia">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Unidades" class="col-sm-2 col-form-label">Unidades</label>
                                    <div class="col-sm-10">
                                        <input required type="text" class="form-control" id="Unidades" name="Unidades" value="<?= $DataBicicleta->getUnidades(); ?>" placeholder="Ingrese sus Unidades">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Marca" class="col-sm-2 col-form-label">Marca</label>
                                    <div class="col-sm-10">
                                        <input required type="text" class="form-control" id="Marca" name="Marca" value="<?= $DataBicicleta->getMarca(); ?>" placeholder="Ingrese sus Marcas">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Precio" class="col-sm-2 col-form-label">Precio</label>
                                    <div class="col-sm-10"
                                        <input required type="text" class="form-control" id="Precio" name="Precio" value="<?= $DataBicicleta-> getPrecio(); ?>" placeholder="Ingrese sus Precios">
                                    </div>

                                </div>
                                 <div class="form-group row">
                                         <label for="Color" class="col-sm-2 col-form-label">Color</label>
                                            <div class="col-sm-10">
                                                  <input required type="number" minlength="6" class="form-control" id="Color" name="Color" value="<?= $DataBicicleta->getColor(); ?>" placeholder="Ingrese su Color">
                                    </div>
                                 </div>


                                <div class="form-group row">
                                    <label for="Modelo" class="col-sm-2 col-form-label">Modelo</label>
                                    <div class="col-sm-10">
                                        <select id="Modelo" name="Modelo" class="custom-select">
                                            <option <?= ($DataBicicleta-> getModelo() == "C.C") ? "selected":""; ?> value="C.C">Cicla para Niño</option>
                                            <option <?= ($DataBicicleta-> getModelo() == "T.I") ? "selected":""; ?> value="T.I">Cicla para Ciclo Montañismo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Fecha" class="col-sm-2 col-form-label">Fecha</label>
                                    <div class="col-sm-10">
                                        <input required type="date" minlength="6" class="form-control" id="Fecha" name="Fecha" value="<?= $DataBicicleta-> getFecha(); ?>" placeholder="Ingrese su Fecha">
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Enviar</button>
                                <a href="index.php" role="button" class="btn btn-default float-right">Cancelar</a>
                            </div>
                            <!-- /.card-footer -->
                        </section>
                    <?php }else{ ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Error!</h5>
                            No se encontro ningun registro con estos parametros de busqueda <?= ($_GET['mensaje']) ?? "" ?>
                        </div>
                    <?php } ?>
                    </p>
                <?php } ?>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php require ('../../partials/footer.php');?>
</div>
<!-- ./wrapper -->
<?php require ('../../partials/scripts.php');?>
</body>
</html>