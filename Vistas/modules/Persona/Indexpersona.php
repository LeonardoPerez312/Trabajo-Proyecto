<?php require("../../partials/routes.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= getenv('TITLE_SITE') ?> | Layout</title>
    <?php require("../../partials/head_imports.php"); ?>
</head>
<body class="hold-transition sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">
    <?php require("../../partials/navbar_customization.php"); ?>

    <?php require("../../partials/sliderbar_main_menu.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pagina Principal</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= $baseURL; ?>/Vistas/">Persona</a></li>
                            <li class="breadcrumb-item active">Inicio</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Bicicletas</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Nombre" class="col-sm-2 col-form-label">Rol</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="idPersona" name="Rol" placeholder="Rol">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Descripcion" class="col-sm-2 col-form-label">Nombre Documento</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="idBicicletas" name="Referencia" placeholder="Nombre Documento">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Descripcion" class="col-sm-2 col-form-label">Numero Documento</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="Fecha" name="Venta" placeholder="Numero Documento">
                            </div>
                        </div> <div class="form-group row">
                            <label for="Descripcion" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="Fecha" name="Venta" placeholder="Nombre">
                            </div>
                        </div> <div class="form-group row">
                            <label for="Descripcion" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="Fecha" name="Venta" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Descripcion" class="col-sm-2 col-form-label">Celular</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="Fecha" name="Venta" placeholder="Celular">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Descripcion" class="col-sm-2 col-form-label">Correo</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="Fecha" name="Venta" placeholder="Correo">
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
<?php require("../../partials/routes.php"); ?>
