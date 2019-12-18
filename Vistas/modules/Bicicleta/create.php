<?php require("../../partials/routes.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= getenv('TITLE_SITE') ?> | Crear Bicicleta</title>
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
                        <h1>Crear Bicicleta</h1>
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
        <section  class="content">

            <?php if(!empty($_GET['respuesta'])){ ?>
                <?php if ($_GET['respuesta'] == "correcto"){ ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Correcto!</h5>
                        Bicicleta ha sido creado correctamente
                    </div>
                <?php }else {?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Error!</h5>
                        Bicicleta no fue posible crearlo,
                    </div>
                <?php } ?>
            <?php } ?>

            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Bicicleta</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form class="form-horizontal" method="post" id="frmCreateBicicleta" name="frmCreateBicicleta" action="../../../App/Controllers/BicicletasController.php?action=create">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Referencia" class="col-sm-2 col-form-label">Referencia</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="Referencia" name="Referencia" placeholder="Ingrese sus Referencia">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Unidades" class="col-sm-2 col-form-label">Unidades</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="Unidades" name="Unidades" placeholder="Ingrese sus Unidades">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Marca" class="col-sm-2 col-form-label">Marca</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="Marca" name="Marca" placeholder="Ingrese sus Marcas">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Precio" class="col-sm-2 col-form-label">Precio</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="Precio" name="Precio" placeholder="Ingrese sus Precios">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Color" class="col-sm-2 col-form-label">Color</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" class="form-control" id="Color" name="Color" placeholder="Ingrese su Color">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Modelo" class="col-sm-2 col-form-label">Modelo</label>
                            <div class="col-sm-10">
                                <select id="Modelo" name="Modelo" class="custom-select">
                                    <option value=""> Cicla para Niño </option>
                                    <option value="">Cicla para Ciclo Montañismo  </option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Fecha" class="col-sm-2 col-form-label">Fecha</label>
                            <div class="col-sm-10">
                                <input required type="date" minlength="6" class="form-control" id="Fecha" name="Fecha" placeholder="Ingrese su Fecha">
                            </div>
                        </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Enviar</button>
                        <a href="index.php" role="button" class="btn btn-default float-right">Cancelar</a>
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
