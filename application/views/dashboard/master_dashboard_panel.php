<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon_1.ico">

        <title>MRC - POS</title>
        
        

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php //echo base_url(); ?>assets/plugins/magnific-popup/dist/magnific-popup.css" />
        <link rel="stylesheet" href="<?php //echo base_url(); ?>assets/plugins/jquery-datatables-editable/datatables.css" />
        
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
        
        <link href="<?php //echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php //echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php //echo base_url(); ?>assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php //echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php //echo base_url(); ?>assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php //echo base_url(); ?>assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>






    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Mrc<i class="md md-album"></i>Pos</span></a>
                        <!-- Image Logo here -->
                        <!--<a href="index.html" class="logo">-->
                            <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                            <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                        <!--</a>-->
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav hidden-xs">
                                <li><a href="#" class="waves-effect waves-light">Files</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown"                      role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>


                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown top-menu-item-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="icon-bell"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification</li>
                                        <li class="list-group slimscroll-noti notification-list">
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left p-r-10">
                                                        <em class="fa fa-diamond noti-primary"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                        <p class="m-0">
                                                            <small>There are new settings available</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left p-r-10">
                                                        <em class="fa fa-cog noti-warning"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">New settings</h5>
                                                        <p class="m-0">
                                                            <small>There are new settings available</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left p-r-10">
                                                        <em class="fa fa-bell-o noti-custom"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">Updates</h5>
                                                        <p class="m-0">
                                                            <small>There are <span class="text-primary font-600">2</span> new updates available</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left p-r-10">
                                                        <em class="fa fa-user-plus noti-pink"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">New user registered</h5>
                                                        <p class="m-0">
                                                            <small>You have 10 unread messages</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left p-r-10">
                                                        <em class="fa fa-diamond noti-primary"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                        <p class="m-0">
                                                            <small>There are new settings available</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                                <div class="media">
                                                    <div class="pull-left p-r-10">
                                                        <em class="fa fa-cog noti-warning"></em>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">New settings</h5>
                                                        <p class="m-0">
                                                            <small>There are new settings available</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="list-group-item text-right">
                                                <small class="font-600">See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="icon-settings"></i></a>
                                </li>
                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-user m-r-10 text-custom"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-settings m-r-10 text-custom"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="ti-lock m-r-10 text-custom"></i> Lock screen</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo base_url(); ?>authenticationcontroller/userLogout"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                            <li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="<?php echo base_url(); ?>" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> <span class="menu-arrow"></span></a>

                            </li>

                            <li class="has_sub">
                                <a href="<?php //echo base_url();   ?>salescontroller/createsales" class="waves-effect"><i class="ti-shopping-cart"></i> <span> Sales </span> <span class="menu-arrow"></span> </a>

                            </li>

                            <li class="has_sub">
                                <a href="<?php //echo base_url();   ?>salescontroller/createsales" class="waves-effect"><i class="ti-light-bulb"></i><span class="label label-primary pull-right"></span><span> Webstore </span> </a>

                            </li>

                            <li class="has_sub">
                                <a href="<?php echo base_url(); ?>inventory" class="waves-effect"><i class="ti-spray"></i> <span> Inventory </span> <span class="menu-arrow"></span> </a>

                            </li>

                            <li class="has_sub">
                                <a href="<?php //echo base_url();   ?>salescontroller/createsales" class="waves-effect"><i class="ti-pencil-alt"></i><span> Service </span> <span class="menu-arrow"></span></a>

                            </li>

                            <li class="has_sub">
                                <a href="<?php //echo base_url();   ?>salescontroller/createsales" class="waves-effect"><i class="ti-menu-alt"></i><span>Customer </span> <span class="menu-arrow"></span></a>

                            </li>

                            <li class="has_sub">
                                <a href="<?php //echo base_url();   ?>salescontroller/createsales" class="waves-effect"><i class="ti-bar-chart"></i><span class="label label-pink pull-right"></span><span> Reports </span></a>

                            </li>

                            <li class="has_sub">
                                <a href="<?php echo base_url();   ?>settings" class="waves-effect"><i class="ti-location-pin"></i><span> Settings </span> <span class="menu-arrow"></span></a>

                            </li>

                            <li class="has_sub">
                                <a href="<?php //echo base_url();   ?>salescontroller/createsales" class="waves-effect"><i class="ti-files"></i><span> Software Settings </span> <span class="menu-arrow"></span></a>
                                <!--<ul class="list-unstyled">
                                    <li><a href="page-starter.html">Starter Page</a></li>
                                    <li><a href="page-login.html">Login</a></li>
                                    <li><a href="page-login-v2.html">Login v2</a></li>
                                    <li><a href="page-register.html">Register</a></li>
                                    <li><a href="page-register-v2.html">Register v2</a></li>
                                    <li><a href="page-signup-signin.html">Signin - Signup</a></li>
                                    <li><a href="page-recoverpw.html">Recover Password</a></li>
                                    <li><a href="page-lock-screen.html">Lock Screen</a></li>
                                    <li><a href="page-400.html">Error 400</a></li>
                                    <li><a href="page-403.html">Error 403</a></li>
                                    <li><a href="page-404.html">Error 404</a></li>
                                    <li><a href="page-404_alt.html">Error 404-alt</a></li>
                                    <li><a href="page-500.html">Error 500</a></li>
                                    <li><a href="page-503.html">Error 503</a></li>
                                </ul>-->
                            </li>



                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <?php echo $dashboardContent; ?>
                    </div> <!-- container -->
                </div> <!-- content -->

                <footer class="footer text-right">
                    Â© 2016. All rights reserved.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>


        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
                
        <script src="<?php // echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php // echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?php // echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?php // echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php // echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php // echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php // echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>

        <script src="<?php // echo base_url(); ?>assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?php // echo base_url(); ?>assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php // echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php // echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?php // echo base_url(); ?>assets/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="<?php // echo base_url(); ?>assets/plugins/datatables/dataTables.colVis.js"></script>
        
        <script src="<?php // echo base_url(); ?>assets/pages/autocomplete.js"></script>

        <script src="<?php // echo base_url(); ?>assets/pages/datatables.init.js"></script>


        <script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

        <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>


        
        
         <script type="text/javascript">
            jQuery(document).ready(function () {
                //Date range picker
                $('.input-daterange-datepicker').daterangepicker({
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-default',
                    cancelClass: 'btn-white'
                });




            });
        </script>
        
        <script type="text/javascript">
            $(document).ready(function () {
                
                $('.input-daterange-datepicker').daterangepicker({
                    buttonClasses: ['btn', 'btn-sm'],
                    applyClass: 'btn-default',
                    cancelClass: 'btn-white'
                });
                
                
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({ajax: "<?php echo base_url(); ?>assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true});
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
            });
            TableManageButtons.init();

        </script>





    </body>
</html>