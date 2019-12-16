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
                        <h1>CREAR NUEVO USUARIO</h1>
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
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">PERSONA</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" id="frmCreateUsuario" name="frmCreateUsuario" action="../../../app/Controladores/PersonaController.php?action=crear">
                    <div class="form-group row">
                        <label for="tipo_documento" class="col-sm-2 col-form-label">Rol</label>
                        <div class="col-sm-10">
                            <select id="Rol" name="Rol" class="custom-select">
                                <option value="C.C">Administrador</option>
                                <option value="T.I">Cliente</option>
                                <option value="R.C">Proveedor</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipo_documento" class="col-sm-2 col-form-label">Tipo Documento</label>
                        <div class="col-sm-10">
                            <select id="tipo_documento" name="tipo_documento" class="custom-select">
                                <option value="C.C">Cedula de Ciudadania</option>
                                <option value="T.I">Tarjeta de Identidad</option>
                                <option value="R.C">Registro Civil</option>
                                <option value="Pasaporte">Pasaporte</option>
                                <option value="C.E">Cedula de Extranjeria</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="documento" class="col-sm-2 col-form-label">Numero Documento</label>
                        <div class="col-sm-10">
                            <input  class="form-control" id="Numero_documento" name="Numero_documento" placeholder="Ingrese su documento">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="apellidos" class="col-sm-2 col-form-label">Nombres</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese sus Nombres">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese sus apellidos">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="documento" class="col-sm-2 col-form-label">Celular</label>
                        <div class="col-sm-10">
                            <input  class="form-control" id="documento" name="documento" placeholder="Ingrese su Celular">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="direccion" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su Correo">
                        </div>
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
