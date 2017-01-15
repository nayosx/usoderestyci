<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('template/css'); ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <table id="tabla" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Usuario</th>
                                    <th>Correo</th>
                                    <th>Contraseña</th>
                                    <th>Fecha de creación</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('template/js'); ?>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dtBoostrapJquery.min.js');?>"></script>
        <script type="text/javascript">
            $(function(){
                var oTable = $("#tabla").DataTable();
                $.ajax({
                    url: '<?php echo base_url('managerUser/users'); ?>',
                    type: 'get',
                    dataType: 'json',
                    beforeSend: function () {
                        pleasewait();
                    },
                    success: function (response) {
                        $.each(response.data, function (i, v) {
                            oTable.row.add([v.id, v.username, v.mail, v.pass, v.fecha]);
                        });
                        oTable.draw(false);
                    },
                    error: function (error) {
                        toast("A ocurrido un error al tratar de cargar la tabla", ERROR);
                    },
                    complete: function () {
                        unpleasewait();
                    }
                });
            });
        </script>
    </body>
</html>
