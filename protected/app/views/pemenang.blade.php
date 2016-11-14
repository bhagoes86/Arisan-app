
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Top Navigation</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="  bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
     <link rel="stylesheet" href=" plugins/datatables/dataTables.bootstrap.css">

    <link rel="stylesheet" href="  dist/css/AdminLTE.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="  dist/css/skins/_all-skins.min.css">
    <style type="text/css">
      .center {
            margin-top:50px;   
        }

        .modal-header {
          padding-bottom: 5px;
        }

        .modal-footer {
              padding: 0;
          }
            
        .modal-footer .btn-group button {
          height:40px;
          border-top-left-radius : 0;
          border-top-right-radius : 0;
          border: none;
          border-right: 1px solid #ddd;
        }
          
        .modal-footer .btn-group:last-child > button {
          border-right: 0;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="./" class="navbar-brand"><b>Arisan</b></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li ><a href="{{route('getlogbayar')}}">Log pembayaran <span class="sr-only">(current)</span></a></li>
                <li ><a href="{{route('getlogmenang')}}">Log pemenang <span class="sr-only">(current)</span></a></li>
                
              </ul>
              
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
             
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">

          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="example-modal" id="modal1">
            <div class="modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal Default</h4>
                  </div>
                  <div class="modal-body">
                    <p>One fine body&hellip;</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
            <h1>
              Hasil Kocokan
              <small>Arisan</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
            </ol>
          </section>

          <!-- Main content -->
          @foreach($pemenang as $pemenang)
          <section class="content">
            <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <h1>SELAMAT KEPADA </h1>
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                  <div class="widget-user-image">
                    <img class="img-circle" src="dist/img/user7-128x128.jpg" alt="User Avatar">
                  </div><!-- /.widget-user-image -->
                  <h3 class="widget-user-username">{{$pemenang->NamaAnggota}}</h3>
                  <h5 class="widget-user-desc">Alamat : {{$pemenang->Alamat}}</h5>
                </div>
                <div class="box-footer no-padding">
                
                </div>
              </div><!-- /.widget-user -->
            </div><!-- /.col -->
            <div class="col-md-3"></div>  
          </div>

            <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <a href="" data-toggle="modal" data-target="#submit">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-key"></i></span>
                <div class="info-box-content">
                  <span class="info-box-number" style="color:#000000"><h2> &nbsp;&nbsp;&nbsp; Kunci pemenang</h2></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </a>
            </div><!-- /.col -->
            <div class="col-md-3"></div> 
          </div>
            
            <div class="modal fade" id="submit" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h3 class="modal-title" id="lineModalLabel">Tambah Anggota</h3>
                </div>
                <div class="modal-body">
                  
                        <!-- content goes here -->
                  <form action="{{route('updatedPemenang')}}" method="post">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Anda yakin ingin mengunci {{$pemenang->NamaAnggota}} sebagai pemenang ???</label>
                            <input type="hidden" name="no" class="form-control" id="exampleInputEmail1" value="{{$pemenang->No}}" placeholder="Enter name">
                          </div>
                         
                         
                         
                          <button type="submit" class="btn btn-default">Ya</button>
                    </form>

                </div>
                
              </div>
              </div>
            </div>
          @endforeach

          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
          </div>
          <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="  plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="  bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="  plugins/slimScroll/jquery.slimscroll.min.js"></script>

    <script src=" plugins/datatables/jquery.dataTables.min.js"></script>
    <script src=" plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="  plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="  dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="  dist/js/demo.js"></script>
       <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
