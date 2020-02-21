<style type="text/css" media="screen">
    .error{color:#DC143C;
        border-radius: 20px;
        background-color: rgba(0, 0, 0, 0.7);}

    </style>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Inventario Web</title>
        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">INVENTARIO</h3>
                    </div>
                    <div class="card-body">
                        <form  action="<?php echo base_url()?>index.php/controllerEmpleados/LoginFmarcosDev" method="POST">
                         <?php echo form_open('form'); ?> 
                         <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>


                            <input type="text" class="form-control" placeholder="RUT"  id="txtusuario"  value="<?php echo set_value('txtusuario'); ?>"name="txtusuario" > <!-- user -->

                        </div>
                        <div class="input-group-prepend">
                            <?php echo form_error('txtusuario', '<div class="error">', '</div>');?> 
                        </div>
                        <br>
                        


                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Contraseña" id="txtpassword" value="<?php echo set_value('txtpassword'); ?>"  name="txtpassword" > <!-- password -->

                        </div>
                        <div class="input-group-prepend">
                            <?php echo form_error('txtpassword', '<div class="error" >', '</div>');?>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="INGRESAR" class="btn btn-outline-primary float-right login_btn">

                        </div>
                    </form>
                </div>
                <div class="card-footer">
                  <!-- KZ -->
              </div>
          </div>
      </div>
  </div>
</body>

</html>




<style type="text/css" media="screen">


    /* Made with love by Mutiullah Samim*/

    @import url('https://fonts.googleapis.com/css?family=Numans');

    html,body{
      background-image: url('<?php echo base_url();?>assets/images/fondo.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      height: 100%;
      font-family: 'Numans', sans-serif;
  }

  .container{
    height: 100%;
    align-content: center;
}

.card{
    height: 370px;
    margin-top: auto;
    margin-bottom: auto;
    width: 400px;
    background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
    font-size: 60px;
    margin-left: 10px;
    color: #FFC312;
}

.social_icon span:hover{
    color: white;
    cursor: pointer;
}

.card-header h3{
    color: white;
}

.social_icon{
    position: absolute;
    right: 20px;
    top: -45px;
}

.input-group-prepend span{
    width: 50px;
    background-color: #006FB3;
    color: black;
    border:0 !important;
}

input:focus{
    outline: 0 0 0 0  !important;
    box-shadow: 0 0 0 0 !important;

}

.remember{
    color: white;
}

.remember input
{
    width: 20px;
    height: 20px;
    margin-left: 15px;
    margin-right: 5px;
}

.login_btn{
    color: white;
    background-color: #006FB3;
    width: 100px;
}

.login_btn:hover{
    color: black;
    background-color: white;
}

.links{
    color: white;
}

.links a{
    margin-left: 4px;
}

</style>