<?php
require_once '../../controllers/paymentController.php';
session_start();
$listPay = getPayByID($_SESSION['username']);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Khách hàng</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="users.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Customer</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="users.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>General Information</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Function
            </div>

            <!-- Nav Item - Employee Management -->
            <li class="nav-item ">
                <a class="nav-link" href="users_search.php">
                    <i class="fas fa-users"></i>
                    <span>Search for vacancies</span>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="users_getplaces.php">
                    <i class="fas fa-check"></i>
                    <span>Reserve space in advance</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="users_pay.php">
                    <i class="fas fa-dollar-sign" style="margin-right: 10px;"></i>
                    <span>Recharge</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="users_information.php">
                    <i class="fas fa-id-card"></i>
                    <span>Personal information</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="users_notice.php">
                    <i class="fas fa-comments"></i>
                    <span>Notification</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="users_report.php">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Report</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Manage account balance</h1>
                    <!-- DataTales Example -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Deposit money into your account</h6>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputAmount">Amount of money</label>
                                    <input type="number" class="form-control" id="exampleInputAmount"
                                        placeholder="Enter the amount you want to deposit" required>
                                </div>
                                <div id="amountError" class="mb-3 text-danger" style="display: none;">Please enter a positive amount.</div>
                                <button type="submit" class="btn btn-primary">Recharge</button>
                            </form>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Deposit history</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Amount of money</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listPay as $pay) { ?>
                                            <tr>
                                                <td><?php echo $pay['time']; ?></td>
                                                <td><?php echo $pay['amount']; ?></td>
                                                <td><?php echo $pay['status']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Parking</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function () {
            $('form').submit(function (e) {
                e.preventDefault(); // Ngăn chặn gửi form mặc định

                var amount = $('#exampleInputAmount').val(); // Lấy số tiền từ input
                if (amount <= 0) {
                $('#amountError').show(); // Hiển thị thông báo lỗi
                return; // Ngăn không gửi dữ liệu đi nếu có lỗi
            }
                var functionName = "pay";
                // Gửi dữ liệu qua Ajax
                $.ajax({
                    type: 'POST',
                    url: '../../controllers/paymentController1.php', // Đường dẫn tới file xử lý PHP
                    data: { amount: amount, functionName: functionName }, // Dữ liệu gửi đi (số tiền)
                    success: function (response) {
                        alert("Submitted deposit request successfully"); // Hiển thị thông báo trả về từ server
                        location.reload(); // Tải lại trang sau khi nạp tiền thành công
                    }
                });
            });
        });
    </script>

</body>

</html>