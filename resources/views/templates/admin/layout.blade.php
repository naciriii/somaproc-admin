<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title or "MYC Console"}}</title>

    <link rel="shortcut icon" type="image/png" href="{{asset('admin/images/favicon.png')}}"/>
    <!-- Bootstrap -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin/css/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admin/css/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('admin/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('admin/css/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="{{asset('admin/css/custom.min.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('admin/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js" type="text/javascript"></script>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>MYC Console</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{{asset('admin/images/img.jpg')}}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                           <h3> <u>Roles :</u> </h3>
                           <ul >

                            @foreach(Auth::user()->roles as $r)
                            <li> <h3>{{$r->name}}</h3></li>
                            @endforeach
                            </ul>

                            <ul class="nav side-menu">
                                <li><a hef="{{url('/')}}"><i class="fa fa-home"></i> Home </a></li>
                              
                                  @role('Master_admin')
                                    <li><a><i class="fa fa-edit"></i> Console Users <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        
                                        <li><a href="{{route('cons_users.index')}}">Cons_Users list</a></li>


                                    </ul>
                                </li>
                                 <li><a><i class="fa fa-edit"></i> Accounts <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        
                                        <li><a href="{{route('accounts.index')}}">Accounts list</a></li>


                                    </ul>
                                </li>
                                     <li><a><i class="fa fa-edit"></i> Permission Categories <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        
                                        <li><a href="{{route('permission_categories.index')}}">Permission Categories list</a></li>


                                    </ul>
                                </li>
                                  <li><a><i class="fa fa-edit"></i> Group Permissions <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        
                                        <li><a href="{{route('group_permissions.index')}}">Group Permissions list</a></li>


                                    </ul>
                                </li>

                                      <li><a><i class="fa fa-edit"></i> Permissions <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        
                                        <li><a href="{{route('permissions.index')}}">Permissions list</a></li>


                                    </ul>
                                </li>
                                     <li><a><i class="fa fa-edit"></i> Industries <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        
                                        <li><a href="{{route('industries.index')}}">Industries list</a></li>


                                    </ul>
                                </li>
                                 <li><a><i class="fa fa-edit"></i> Skills <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        
                                        <li><a href="{{route('skills.index')}}">Skills list</a></li>


                                    </ul>
                                </li>
                                   <li><a><i class="fa fa-edit"></i> Languages <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        
                                        <li><a href="{{route('languages.index')}}">Languages list</a></li>


                                    </ul>
                                </li>
                                     <li><a><i class="fa fa-edit"></i> Job Roles <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        
                                        <li><a href="{{route('job_roles.index')}}">Job Roles list</a></li>


                                    </ul>
                                </li>
                                      <li><a><i class="fa fa-edit"></i> Levels <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        
                                        <li><a href="{{route('levels.index')}}">Levels list</a></li>
                                          <li><a href="{{route('degree_levels.index')}}">Degree Levels list</a></li>


                                    </ul>
                                </li>
                                 <li><a><i class="fa fa-edit"></i> Countries <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        
                                        <li><a href="{{route('countries.index')}}">Countries list</a></li>


                                    </ul>
                                </li>
                                    <li><a><i class="fa fa-edit"></i> Content <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">		
											<li><a href="{{url('/menu/list')}}">Menus list</a></li>
											<li><a href="{{url('/module/list')}}">Modules list</a></li>
											<li><a href="{{url('/package/list')}}">Packages list</a></li>
											<li><a href="{{url('/tab/list')}}">Tabs list</a></li>
											<li><a href="{{url('/module/tab/list')}}">Module Tab list</a></li>
											<li><a href="{{url('/module/menu/list')}}">Module Menu list</a></li>
											<li><a href="{{url('/package_modules/list')}}">Package's Modules</a></li>
										</ul>
									</li>
                                    <li><a><i class="fa fa-edit"></i> Insurances <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">		
											<li><a href="{{url('/list/business_insurance')}}">Business Insurance Types</a></li>
											<li><a href="{{url('/list/user_insurance')}}">User Insurance Types</a></li>
											<li><a href="{{url('/list/vehicle_insurance')}}">Vehicle Insurance Types</a></li>
										</ul>
									</li>
                                    <li><a><i class="fa fa-edit"></i> Vehicle <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">		
											<li><a href="{{url('/list/vehicle_body')}}">Vehicle Bodies</a></li>
											<li><a href="{{url('/list/vehicle_make')}}">Vehicle Makes</a></li>
											<li><a href="{{url('/vehicle_model/list')}}">Vehicle Models</a></li>
										</ul>
									</li>
                                    <li><a><i class="fa fa-edit"></i> Licence <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">		
											<li><a href="{{url('/list/licence_type')}}">Licence Types</a></li>
										</ul>
									</li>


                                @endrole
                                     @role('Translator_team')
                                              <li><a><i class="fa fa-edit"></i> Language <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">     
                                            <li><a href="{{url('/file_list/en')}}">English</a></li>
                                            <li><a href="{{url('/file_list/es')}}">Spanish</a></li>
                                            <li><a href="{{url('/file_list/fr')}}">French</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i> Validation translate <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                        <li><a href="{{url('/tagvalidation')}}">Tags Validation</a></li>     
                                            <li><a href="{{url('/validation')}}">Update Validation</a></li>
                                            
                                            
                                        </ul>
                                    </li>


                                     @endrole
                               
                                      
                                
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('admin/images/img.jpg')}}" alt="">{{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="#"> Profile</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                @include('templates.admin.partials.alerts')
                @yield('content')
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <!-- Bootstrap -->
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('admin/js/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('admin/js/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('admin/js/icheck.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('admin/js/datatables.scroller.min.js')}}"></script>
    <script src="{{asset('admin/js/jszip.min.js')}}"></script>
    <script src="{{asset('admin/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/js/vfs_fonts.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('admin/js/custom.min.js')}}"></script>

    <!-- Datatables -->
    <script>
        $(document).ready(function() {
            var handleDataTableButtons = function() {
                if ($("#datatable-buttons").length) {
                    $("#datatable-buttons").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                        ],
                        responsive: true
                    });
                }
            };

            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                        handleDataTableButtons();
                    }
                };
            }();

            $('#datatable').dataTable();

            $('#datatable-keytable').DataTable({
                keys: true
            });

            $('#datatable-responsive').DataTable();

            $('#datatable-scroller').DataTable({
                ajax: "js/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });

            $('#datatable-fixed-header').DataTable({
                fixedHeader: true
            });

            var $datatable = $('#datatable-checkbox');

            $datatable.dataTable({
                'order': [[ 1, 'asc' ]],
                'columnDefs': [
                { orderable: false, targets: [0] }
                ]
            });
            $datatable.on('draw.dt', function() {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-green'
                });
            });

            TableManageButtons.init();
        });
    </script>
    <!-- /Datatables -->
</body>
</html>