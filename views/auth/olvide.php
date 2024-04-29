<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
        

            <div class="col-xl-10 col-lg-12 col-md-9">
           

                <div class="card o-hidden border-0 shadow-lg my-5">
                
                    <div class="card-body p-0">
                   
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¿Olvidaste tu Contraseña?</h1>
                                    </div>
                                    <div class="text-center">
                                        <label>
                                            Te enviaremos un código de 6 digitos a tu correo, el cual debes ingresar
                                            para realizar el cambio de tu contraseña.
                                        </label>
                                    </div>
                                    <hr>
                                    <form class="user" method="POST" action="/olvide">
                                        <div class="form-group">
                                            <input name="correo" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Ingresa tu Correo">
                                        </div>
                                  
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Enviar Código">

                                    </form>
                                    <hr>
                                    <?php include_once __DIR__ .'/../templates/alertas.php'; ?>
                                    <div class="text-center">
                                        <a class="small" href="/login">Iniciar Sesión</a>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


</body>