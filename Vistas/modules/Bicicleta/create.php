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
                        <h1>CREAR NUEVA BICICLETA</h1>
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
            <form class="form-horizontal" method="post" id="frmCreateUsuario" name="frmCreateUsuario" action="../../../app/Controladores/BicicletasController.php?action=crear">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Bicicleta</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="form-group row">
                    <label for="apellidos" class="col-sm-2 col-form-label">Referencia</label>
                    <div class="col-sm-10">
                        <input required type="text" class="form-control" id="Referencia" name="Referencia" placeholder="Ingrese Referencia">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="documento" class="col-sm-2 col-form-label">Unidades</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="Unidades" name="Unidades" placeholder="Ingrese Unidades">
                    </div>
                </div>


                <div class="form-group row">
                            <label for="documento" class="col-sm-2 col-form-label">Precio</label>
                            <div class="col-sm-10">
                                <input  type="number" class="form-control" id="Precio" name="Precio" placeholder="Ingrese Precio">
                            </div>
                        </div>

                <div class="form-group row">
                    <label for="apellidos" class="col-sm-2 col-form-label">Color</label>
                    <div class="col-sm-10">
                        <input required type="text" class="form-control" id="Color" name="Color" placeholder="Ingrese Color">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Modelo" class="col-sm-2 col-form-label">MODELO</label>
                    <div class="col-sm-10">
                        <select id="Modelo" name="Modelo" class="custom-select">
                            <option value="C.C">Cicla Para Niño</option>
                            <option value="T.I">Cicla Para Ciclo Montaña</option>
                            <option value="R.C"></option>
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="documento" class="col-sm-2 col-form-label">Fecha</label>
                    <div class="col-sm-10">
                        <input  class="form-control" id="Fecha" name="Fecha" placeholder="Ingrese  Fecha">
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
