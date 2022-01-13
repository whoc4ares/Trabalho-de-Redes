<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: sistema_login/login.php');
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: sistema_login/login.php");
  }


      $db = mysqli_connect('localhost', 'root', '', 'registration');

      $nome=$_SESSION['username'];

          $res=mysqli_query($db,"SELECT * from users where username='$nome'");
          $row=mysqli_fetch_assoc($res);

          $permissoes=$row['permissoes'];
    if ($permissoes=='cliente') {
        header("location: ../contact.php");
    }
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/extra-libs/multicheck/multicheck.css">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

           <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

        <!-- jQuery Library -->
        <script src="jquery-3.5.1.min.js"></script>
        
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                             <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <br>
                                <a href="../index.php"><i class="fa fa-home"></i></a>
                                <a href="../contact.php"><i class="fa fa-shopping-cart"></i></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION['username']; ?><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="sistema_login/logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>

                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">

       
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Pedidos Não Confirmados</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="contas.php" aria-expanded="false"><i class="m-r-10 mdi mdi-checkbox-marked-circle"></i><span class="hide-menu">Pedidos Confirmados</span></a></li>                        


                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="users.php" aria-expanded="false"><i class="m-r-10 mdi mdi-account-circle"></i><span class="hide-menu">Users</span></a></li>                     

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tables</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
        <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
    <div class='container'>

            <!-- Modal -->
            <div id="updateModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Editar</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" >Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" required>            
                            </div>
                            <div class="form-group">
                                <label for="email" >Email</label>    
                                <input type="email" class="form-control" id="email"  placeholder="Enter email">                          
                            </div>      
                            <div class="form-group">
                                <label for="tipo" >Tipo</label>
                                <select id='tipo' class="form-control">
                                    <option value='cao'>cao</option>
                                    <option value='gato'>gato</option>
                                </select>              
                            </div>

                            <div class="form-group">
                                <label for="raca" >raca</label>
                                <select id='raca' class="form-control">
                                    <option value='pastor alemão'>pastor alemão</option>
                                    <option value='buldogue'>buldogue</option>
                                    <option value='Dobermann'>Dobermann</option>
                                    <option value='persa'>persa</option>
                                    <option value='maine coon'>maine coon</option>
                                    <option value='ragdoll'>ragdoll</option>
                                </select>              
                            </div>

                            <div class="form-group">
                                <label for="genero" >genero</label>
                                <select id='genero' class="form-control">
                                    <option value='macho'>macho</option>
                                    <option value='femea'>femea</option>
                                </select>              
                            </div>                            

                            <div class="form-group">
                                <label for="city" >Morada</label>    
                                <input type="text" class="form-control" id="city"  placeholder="Enter city">                          
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="txt_userid" value="0">
                            <button type="button" class="btn btn-success btn-sm" id="btn_save">Save</button>
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Table -->
            <table id='userTable' class='display dataTable' width='100%'>
                <thead>
                    <tr>
                        <th>Nome cliente</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Raça</th>
                        <th>Genero</th>
                        <th>Morada</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                
            </table>

    </div>
                        
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

</body>

</html>

        <script>
        $(document).ready(function(){

            // DataTable
            var userDataTable = $('#userTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'ajaxfile.php'
                },
                'columns': [
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'tipo' },
                    { data: 'raca' },
                    { data: 'genero' },
                    { data: 'city' },
                    { data: 'action' },
                ]
            });


            // Update record
            $('#userTable').on('click','.updateUser',function(){
                var id = $(this).data('id');

                $('#txt_userid').val(id);

                // AJAX request
                $.ajax({
                    url: 'ajaxfile.php',
                    type: 'post',
                    data: {request: 2, id: id},
                    dataType: 'json',
                    success: function(response){
                        if(response.status == 1){

                            $('#name').val(response.data.name);
                            $('#email').val(response.data.email);
                            $('#tipo').val(response.data.tipo);
                            $('#raca').val(response.data.raca);
                            $('#genero').val(response.data.genero);
                            $('#city').val(response.data.city);

                        }else{
                            alert("Invalid ID.");
                        }
                    }
                });

            });


            // Save user 
            $('#btn_save').click(function(){
                var id = $('#txt_userid').val();

                var name = $('#name').val().trim();
                var email = $('#email').val().trim();
                var tipo = $('#tipo').val().trim();
                var raca = $('#raca').val().trim();
                var genero = $('#genero').val().trim();
                var city = $('#city').val().trim();

                if(name !='' && email != '' && city != ''){

                    // AJAX request
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {request: 3, id: id,name: name, email: email, tipo: tipo, raca: raca, genero: genero, city: city},
                        dataType: 'json',
                        success: function(response){
                            if(response.status == 1){
                                alert(response.message);

                                // Empty the fields
                                $('#name','#email','#city').val('');
                                $('#tipo').val('male');
                                $('#txt_userid').val(0);

                                // Reload DataTable
                                userDataTable.ajax.reload();

                                // Close modal
                                $('#updateModal').modal('toggle');
                            }else{
                                alert(response.message);
                            }
                        }
                    });

                }else{
                    alert('Please fill all fields.');
                }
            });


            // Delete record
            $('#userTable').on('click','.deleteUser',function(){
                var id = $(this).data('id');

                var deleteConfirm = confirm("Are you sure?");
                if (deleteConfirm == true) {
                    // AJAX request
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {request: 4, id: id},
                        success: function(response){

                            if(response == 1){
                                alert("Record deleted.");

                                // Reload DataTable
                                userDataTable.ajax.reload();
                            }else{
                                alert("Invalid ID.");
                            }
                            
                        }
                    });
                } 
                
            });



            // Delete record
            $('#userTable').on('click','.confirmarUser',function(){
                var id = $(this).data('id');

                var deleteConfirm = confirm("Quer confirmar a compra?");
                if (deleteConfirm == true) {
                    // AJAX request
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {request: 5, id: id},
                        success: function(response){

                            if(response == 1){
                                alert("Compra confirmada.");

                                // Reload DataTable
                                userDataTable.ajax.reload();
                            }else{
                                alert("Invalid ID.");
                            }
                            
                        }
                    });
                } 
                
            });
            
        });
        </script>