
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Test Levo - Cashier</title>

    <!-- Custom fonts for this template-->
    <link href="{{url("assets/vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{url("assets/vendor/jquery-ui/jquery-ui.css")}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url("assets/css/sb-admin-2.min.css")}}" rel="stylesheet">

    <style>
        .form-label .row {
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .form-label .row label{
            width: 30% !important;
        }
    </style>

    <script>
        var beli = [],
            current = [];
    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url("/")}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Cashier <sup>App</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url("/")}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Cashier</span></a>
            </li>
            <!-- menu for list data -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url("/list_transaksi")}}">
                    <i class="fas fa-fw fa-box"></i>
                    <span>List Transaksi</span></a>
            </li>

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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Cashier 1</span>
                                <img class="img-profile rounded-circle"
                                    src="{{url("assets/img/undraw_profile.svg")}}">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Cashier</h1>
                    </div>

                    <!-- content of body dashboard -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="col-md-7"><h6>List Barang</h6></div>
                                        <div class="col-md-5">
                                            <h6><button type="button" class="btn btn-danger btn-sm" onclick="save()"><i class="fa fa-save"></i></button>
                                                <strong>Total Beli : <span class="total">0</span></strong></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Subtotal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="6" class="text-center">Belum ada barang</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <label for="fill_noun">Input Barang</label>
                                    <input type="text" name="fill_noun" id="fill_noun" placeholder="Masukan Nama Barang">
                                </div>
                            </div>

                            <br/>

                            <div class="card">
                                <div class="card-body form-label">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="nama_barang">Nama Barang</label>
                                            <input type="text" readonly name="nama_barang" id="nama_barang" placeholder="Masukan Nama Barang">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="harga_barang">Harga</label>
                                            <input type="text" readonly name="harga_barang" id="harga_barang">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="text" name="jumlah" id="jumlah">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                        <input type="hidden" name="id" id="id">
                                        <input class="btn btn-success" type="button" id="submit" value="Beli">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end of content of body dashboard -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{url("assets/vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{url("assets/vendor/jquery-ui/jquery-ui.js")}}"></script>
    <script src="{!!url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js")!!}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url("assets/vendor/jquery-easing/jquery.easing.min.js")}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url("assets/js/sb-admin-2.min.js")}}"></script>


    <script>
        $(document).ready(function(){
            $("#fill_noun").autocomplete({
                source: "{{url("api/master_barang/autocomplete")}}",
                minLength: 1,
                select: function( event, ui ) {
                    current = ui.item;
                    console.log( "Selected: " + ui.item.label + " aka " + ui.item.id );
                    $("#nama_barang").val(ui.item.nama_barang);
                    $("#harga_barang").val(ui.item.harga_satuan);
                    $("#id").val(ui.item.id);
                    $("#jumlah").focus();
                }
            });

            $("#submit").click(function(){
                var id = $("#id").val();
                if(id != ""){
                    if(typeof beli[id] == "undefined"){
                        beli[id] = current;
                        beli[id]["jumlah"] = parseInt($("#jumlah").val());
                    } else {
                        beli[id]["jumlah"] += parseInt($("#jumlah").val());
                    }
                }
                console.log(beli);
                list_barang();
                resetForm();
                $("#fill_noun").focus();
            });

        });

        var list_barang = function(){
            var lists = $(".table tbody"),
                html = "",
                sub = 0,
                total = 0,
                urut = 1;
            lists.html("");

            if(beli.length > 0){
                $.each(beli, function(k,v){
                    if(typeof v != "undefined"){
                        console.log(k);
                        console.log(v);
                        html = "<tr><td>"+urut+"</td>";
                        html += "<td>"+v.nama_barang+"</td>";
                        html += "<td>"+v.jumlah+"</td>";
                        html += "<td>"+v.harga_satuan+"</td>";
                        sub = v.jumlah * parseInt(v.harga_satuan);
                        html += "<td>"+sub+"</td>";
                        html += "<td><a href='javascript:void(0)' onclick='del("+v.id+")'><i class='fa fa-trash'></i></a></td></tr>";

                        lists.append(html);
                        urut++;
                        total += sub;
                    }
                });
            } else {
                lists.html('<tr><td colspan="6" class="text-center">Belum ada barang</td></tr>');
            }
            $(".total").html(total);
        },
        del = function(id){
            beli.splice(id,1);
            list_barang();
        },
        resetForm = function(){
            $("#nama_barang").val("");
            $("#harga_barang").val("");
            $("#id").val("");
            $("#jumlah").val("");
            $("#fill_noun").val("");
        },
        save = function(){
            beli = beli.filter(function( element ) {
                return element !== undefined;
            });
            $.ajax({
                url:"{{url("api/beli/save")}}",
                type: "POST",
                data: {data : beli, total : $(".total").text()},
                success: function(r){
                    if(r.status == 1){
                        beli = [];
                        list_barang();
                    }
                },
                error: function(e){ console.log(e); }
            });
        };
    </script>

</body>

</html>