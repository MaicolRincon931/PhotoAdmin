<?php include_once __DIR__ . '/head.php' ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once __DIR__ . '/sidebar.php' ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="mr-4"><?php echo $titulo; ?></li>
                        <li class="mr-4"><?php echo date('d/F'); ?></li>
                        <li class="mr-4">
                           <a href="" class="user">
                           <i class="fa-regular fa-user"></i>
                            <?php echo $_SESSION['nombre']; ?>
                           </a>
                        </li>
                        <li class="mr-4" >
                        
                            <a href="#" class="logout">
                            <i class="fa-solid fa-right-from-bracket"></i>    
                            Salir</a>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Render a las vistas -->
                    <?php echo $contenido; ?>
                    <?php echo $script ?? ''; ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


</body>
<?php include_once __DIR__ . '/footer.php'; ?>