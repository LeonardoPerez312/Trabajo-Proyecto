<?php require("../../partials/routes.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= getenv('TITLE_SITE') ?> | Crear Usuario</title>
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
                        <h1>CREAR NUEVA VENTA</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Inicio</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <?php if(!empty($_GET['respuesta'])){ ?>
                <?php if ($_GET['respuesta'] == "correcto"){ ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Correcto!</h5>
                        El usuario ha sido creado correctamente
                    </div>
                <?php }else {?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Error!</h5>
                        El usuario no fue posible crearlo,
                    </div>
                <?php } ?>
            <?php } ?>

            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">VENTAS</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" id="frmCreateUsuario" name="frmCreateUsuario" action="../../../app/Controladores/VentasController.php?action=crear">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nombres" class="col-sm-2 col-form-label">Valor</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese Valor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidos" class="col-sm-2 col-form-label">Forma Pago</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese Pago">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="documento" class="col-sm-2 col-form-label">Fecha</label>
                            <div class="col-sm-10">
                                <input required type="date" max="11" min="7" class="form-control" id="documento" name="documento" placeholder="Ingrese  Fecha">
                            </div>
                        </div>


                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Enviar</button>
                            <button type="submit" class="btn btn-default float-right">Cancelar</button>
                        </div>
                        <!-- /.card-footer -->
                </form>
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

