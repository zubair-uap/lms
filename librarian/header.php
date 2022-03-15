<?php
session_start();
require_once('../db.php');
if (!isset($_SESSION['user_status'])) {

    header('location: login.php');
}
// echo $_SERVER['PHP_SELF'];
$page = explode('/', $_SERVER['PHP_SELF']);
$page = end($page);
// echo $page;
// die();
$email = $_SESSION['email'];
$get_query = "SELECT * FROM libraians Where email='$email'";

$result = mysqli_query($db_conect, $get_query);
$after_assoc_lib = mysqli_fetch_assoc($result);
// echo $after_assoc_lib->first_name;
// die();

?>
<!doctype html>
<html lang="en" class="fixed left-sidebar-top">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Helsinki</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--load progress bar-->
    <script src="../assets/vendor/pace/pace.min.js"></script>
    <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">


    <!--dataTable-->
    <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--Notification msj-->
    <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">

    <!--Select with searching & tagging-->
    <link rel="stylesheet" href="../assets/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/vendor/select2/css/select2-bootstrap.min.css">
    <!--Date picker-->
    <link rel="stylesheet" href="../assets/vendor/bootstrap_date-picker/css/bootstrap-datepicker3.min.css">
    <!--Time picker-->
    <link rel="stylesheet" href="../assets/vendor/bootstrap_time-picker/css/timepicker.css">
    <!--Color picker-->
    <link rel="stylesheet" href="../assets/vendor/bootstrap_color-picker/css/bootstrap-colorpicker.min.css">


    <!--TEMPLATE css-->

    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">


</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.html" class="on-click">
                        <!-- <img alt="logo" src="../assets/images/header-logo.png" /> -->
                        <h4>LMS</h4>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--SEARCH HEADERBOX-->

                <!--NOCITE HEADERBOX-->
                <div class="header-section hidden-xs" id="notice-headerbox">

                    <!--alerts notices-->
                    <div class="notice" id="alerts-notice">
                        <i class="fa fa-bell-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger">7</span></i>

                        <div class="dropdown-box basic">
                            <div class="drop-header">
                                <h3><i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</h3>
                                <span class="badge x-danger b-rounded">7</span>

                            </div>
                            <div class="drop-content">
                                <div class="widget-list list-left-element list-sm">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-warning color-warning"></i></div>
                                                <div class="text">
                                                    <span class="title">8 Bugs</span>
                                                    <span class="subtitle">reported today</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-flag color-danger"></i></div>
                                                <div class="text">
                                                    <span class="title">Error</span>
                                                    <span class="subtitle">sevidor C down</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-cog color-dark"></i></div>
                                                <div class="text">
                                                    <span class="title">New Configuration</span>
                                                    <span class="subtitle"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-tasks color-success"></i></div>
                                                <div class="text">
                                                    <span class="title">14 Task</span>
                                                    <span class="subtitle">completed</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
                                                <div class="text">
                                                    <span class="title">21 Menssage</span>
                                                    <span class="subtitle"> (see more)</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="drop-footer">
                                <a>See all notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="header-separator"></div>
                </div>
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="../assets/images/avatar/avatar_user.jpg" />
                        </div>
                        <div class="user-info">

                            <span class="user-name"><?= ucwords($after_assoc_lib['first_name'] . ' ' . $after_assoc_lib['last_name']) ?></span>
                            <span class="user-profile">Admin</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li> <a href="logout.php"><i class="fa fa-user" aria-hidden="true"></i> Logout</a></li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="pages_sign-in.html" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->

                                <li class="<?= $page == 'index.php' ? 'active-item' : ' ' ?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>

                                <li class="<?= $page == 'student.php' ? 'active-item' : ' ' ?>"><a href="student.php"><i class="fa fa-user" aria-hidden="true"></i><span>Students</span></a></li>


                                <li class="has-child-item <?= $page == 'add_book.php' || 'manage_book.php' ? 'open-item' : ' ' ?>">
                                    <a><i class="fa fa-book" aria-hidden="true"></i><span>Books</span> </a>
                                    <ul class="nav child-nav level-1">
                                        <li class="<?= $page == 'add_book.php' ? 'active-item' : ' ' ?>"><a href="add_book.php">Add Books</a></li>
                                        <li class="<?= $page == 'manage_book.php' ? 'active-item' : ' ' ?>"><a href="manage_book.php">Manage Books</a></li>

                                    </ul>
                                </li>

                                <li class="<?= $page == 'issue_book.php' ? 'active-item' : ' ' ?>"><a href="issue_book.php"><i class="fa fa-home" aria-hidden="true"></i><span>Issue Book</span></a></li>

                                <li class="<?= $page == 'return_book_view.php' ? 'active-item' : ' ' ?>"><a href="return_book_view.php"><i class="fa fa-home" aria-hidden="true"></i><span>Return Book</span></a></li>


                                <!--  -->
                                <!--UI ELEMENTENTS-->
                                <!-- <li class="has-child-item close-item">
                                    <a><i class="fa fa-cubes" aria-hidden="true"></i><span>UI Elements</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="ui-elements_panels.html">Panels</a></li>
                                        <li><a href="ui-elements_accordions.html">Accordions</a></li>
                                        <li><a href="ui-elements_tabs.html">Tabs</a></li>
                                        <li><a href="ui-elements_buttons.html">Buttons</a></li>
                                        <li><a href="ui-elements_typography.html">Typography</a></li>
                                        <li><a href="ui-elements_alerts.html">Alerts</a></li>
                                        <li><a href="ui-elements_modals.html">Modals</a></li>
                                        <li><a href="ui-elements_lightbox.html">Lightbox</a></li>
                                        <li class="has-child-item close-item">
                                            <a>Notifications</a>
                                            <ul class="nav child-nav level-2 ">
                                                <li><a href="ui-elements_notifications-pnotify.html">PNotify</a></li>
                                                <li><a href="ui-elements_notifications-toastr.html">Toastr</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="ui-elements_animations-appear.html">Animations</a></li>
                                        <li><a href="ui-elements_badges-tags.html">Badge & Tags</a></li>
                                    </ul>
                                </li> -->
                                <!--CHARTS-->
                                <!-- <li class="has-child-item close-item">
                                    <a><i class="fa fa-pie-chart" aria-hidden="true"></i><span>Charts</span> </a>
                                    <ul class="nav child-nav level-1">
                                        <li><a href="charts_chart-js.html">CharJS</a></li>
                                        <li><a href="charts_morris.html">Morris</a></li>
                                        <li><a href="charts_peity.html">Peity</a></li>
                                    </ul>
                                </li> -->
                                <!--FORMS-->


                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">