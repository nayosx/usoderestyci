<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('template/css'); ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="well">
                        <form id="formAdd" method="post" action="<?php echo base_url('managerUser/add'); ?>">
                            <div class="form-group">
                                <label class="control-label">Usuario</label>
                                <input type="text" id="usuario" name="username" class="form-control" required=""/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Correo</label>
                                <input type="email" id="correo" name="mail" class="form-control" required=""/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Contraseña</label>
                                <input type="password" id="pass" name="password" class="form-control" required=""/>
                            </div>
                            <div class="form-group">
                                <button id="btnAdd" type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i> Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('template/js'); ?>
        <script type="text/javascript">
            $(function(){
                var formAdd = $("#formAdd");
                var btnEncuesta = $("#btnAdd");
                
                btnEncuesta.click(function(){
                    $.ajax({
                        data: formAdd.serialize(),
                        url: formAdd.prop('action'),
                        type: 'post',
                        dataType: 'json',
                        beforeSend: function(){
                            pleasewait();
                        },
                        success: function(response){
                            if(response.status){
                                window.location = "<?php echo base_url('user/viewUsers');?>";
                            } else{
                                toast(response.msg, WARNING);
                            }
                            console.log(response);
                        },
                        error: function(error){
                            console.log(error);
                            toast("Error de servidor", ERROR);
                        },
                        complete: function(){
                            unpleasewait();
                        }
                    });
                });
            });
        </script>
    </body>
</html>
