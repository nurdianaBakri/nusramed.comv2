
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Nusa Raya Medika </title>
    <!-- <title>SI-PENJUALAN NUSA RAYA MEDIKA</title> -->
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon"> 

    <link rel="icon" href="<?php echo base_url()."assets/" ?>favicon.ico" type="image/x-icon">

    <link href="<?= base_url(); ?>css.css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>icon.css?family=Material+Icons" rel="stylesheet" type="text/css">
   
    <!-- Bootstrap Core Css --> 
    <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->

    <link href="<?php echo base_url()."assets/" ?>plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->

    <link href="<?php echo base_url()."assets/" ?>plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Bootstrap Material Datetime Picker Css -->

    <!-- <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" /> -->
    <!-- Bootstrap DatePicker Css -->

    <!-- <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" /> -->
    <!-- Wait Me Css -->

    <!-- <link href="<?php echo base_url()."assets/" ?>plugins/waitme/waitMe.css" rel="stylesheet" /> -->
    <!-- Bootstrap Select Css -->

    <!-- <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" /> -->
    <!-- Custom Css -->

    <link href="<?php echo base_url()."assets/" ?>css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url()."assets/" ?>css/themes/all-themes.css" rel="stylesheet" />  

     <!-- Jquery Core Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery/jquery.min.js"></script>

     <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <!-- <script src="<?php echo base_url()."assets/" ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
 -->
    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <!-- <script src="<?php echo base_url()."assets/" ?>plugins/bootstrap-notify/bootstrap-notify.js"></script> -->

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url()."assets/" ?>js/admin.js"></script>
    <!-- <script src="<?php echo base_url()."assets/" ?>js/pages/ui/modals.js"></script> -->

    <!-- Demo Js -->
    <script src="<?php echo base_url()."assets/" ?>js/demo.js"></script>   
        
    <!-- Jquery Validation Plugin Css -->
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <!-- <script src="<?php echo base_url()."assets/" ?>plugins/jquery-steps/jquery.steps.js"></script>-->

    <!-- Sweet Alert Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/sweetalert/sweetalert.min.js"></script> 
 
    <script src="<?php echo base_url()."assets/" ?>js/pages/forms/form-validation.js"></script> 
  
    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
  <script src="<?php echo base_url()."assets/" ?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
 
    <script src="<?php echo base_url()."assets/" ?>js/pages/forms/basic-form-elements.js"></script>

    <!-- <script src="<?php echo base_url()."assets/" ?>js/pages/forms/form-wizard.js"></script>   -->
    
</head>

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
   
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <!-- <a class="navbar-brand" href="<?php echo base_url() ?>">SI-PENJUALAN</a> -->
                <a class="navbar-brand" href="<?php echo base_url() ?>">SI-Apotek</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">account_circle</i> 
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header"><?php echo $this->session->userdata('email'); ?></li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="<?php echo base_url()."Login/logout" ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">exit_to_app</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Logout</h4> 
                                            </div>
                                        </a>
                                    </li> 
                                </ul>
                            </li> 
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                       
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
           
            <!-- Menu --> 
                <?php  $this->load->view('include/menu_2');  ?>  
            <!-- #Menu -->
            <!-- Footer -->

             <!-- #END# Left Sidebar -->
           <!-- right sidebar -->
            <?php $this->load->view('include/right_sidebar')?>
        <!-- #END# right sidebar -->
         
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>