
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Arisan</title>
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
                <li><a href="{{route('getlogbayar')}}">Log pembayaran <span class="sr-only">(current)</span></a></li>
                <li><a href="{{route('getlogmenang')}}">Log pemenang <span class="sr-only">(current)</span></a></li>
                
              </ul>
              
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
             
              </div><!-- /.navbar-custom-menu -->
         
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
              Data Anggota
              <small>Arisan</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box">
            <div class="box-body">
              @if(Session::has('message'))
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Berhasil!</h4>
                    {{ Session::get('message') }}
                  </div>
              @endif
              @if(Session::has('messageupdated'))
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Berhasil!</h4>
                    {{ Session::get('messageupdated') }}
                  </div>
              @endif
               @if(Session::has('messagehapus'))
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> Berhasil!</h4>
                    {{ Session::get('messagehapus') }}
                  </div>
              @endif
              @if(Session::has('gagal'))
                   <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> gagal!</h4>
                    {{ Session::get('message') }}
                  </div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Alamat</th>
                        <th>Status Bayar</th>
                        <th>Status Menang</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $No = 1; ?>
                    @foreach($dataanggota as $data)
                    <?php
                    if ($data->KocokArisan == 'sudah menang') {
                      $warna = 'style="background-color:#FF5C5C"';
                    }else{
                      $warna = '';
                    }
                    ?>
                      <tr <?php echo $warna; ?>>
                        <td>{{$No++}}</td>
                        <td>{{$data->NamaAnggota}}</td>
                        <td>{{$data->Alamat}}</td>
                        <td>{{$data->StatusBayar}}</td>
                        <td>{{$data->KocokArisan}}</td>
                        <?php
                        if ($data->StatusBayar == 'sudah bayar') {
                        ?>
                           <td><a href="" data-toggle="modal" data-target="#edit{{$data->No}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a href="" data-toggle="modal" data-target="#hapus{{$data->No}}"><i class="fa fa-remove"></i></a></td>
                        <?php
                        }else{
                        ?>
                        <td><a href="" data-toggle="modal" data-target="#edit{{$data->No}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a href="" data-toggle="modal" data-target="#hapus{{$data->No}}"><i class="fa fa-remove"></i></a>&nbsp;&nbsp;&nbsp;<a href="" data-toggle="modal" data-target="#bayar{{$data->No}}"><i class="fa fa-money"></i></a></td>
                        <?php } ?>
                      </tr>
                      <!-- Edit -->
                      <div class="modal fade" id="edit{{$data->No}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                          <h3 class="modal-title" id="lineModalLabel">Edit Profile {{$data->NamaAnggota}}</h3>
                        </div>
                        <div class="modal-body">
                          
                                <!-- content goes here -->
                          <form action="{{route('editAnggota')}}" method="post">
                                  <div class="form-group">
                                    <input type="hidden" name="no" class="form-control" id="exampleInputEmail1" value="{{$data->No}}" placeholder="Enter name">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="{{$data->NamaAnggota}}" placeholder="Enter name">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Alamat</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" value="{{$data->Alamat}}" name="alamat" placeholder="Enter address">
                                  </div>
                                 
                                 
                                  <button type="submit" class="btn btn-default">Tambah</button>
                            </form>

                        </div>
                        
                      </div>
                      </div>
                    </div>

                    <!-- Hapus -->
                    <div class="modal fade" id="hapus{{$data->No}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                          <h3 class="modal-title" id="lineModalLabel">Hapus {{$data->NamaAnggota}}</h3>
                        </div>
                        <div class="modal-body">
                          
                                <!-- content goes here -->
                          <form action="{{route('hapusAnggota')}}" method="post">
                                  
                                  
                                    <label for="exampleInputPassword1">Anda yakin ingin menghapus {{$data->NamaAnggota}} ???</label><br>
                                    <input type="hidden" class="form-control" id="exampleInputPassword1" value="{{$data->No}}" name="no" placeholder="Enter address">
                                 
                                 
                                 
                                  <button type="submit" class="btn btn-default">Hapus</button>
                            </form>

                        </div>
                        
                      </div>
                      </div>
                    </div>

                    <!-- Bayar -->
                    <div class="modal fade" id="bayar{{$data->No}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                          <h3 class="modal-title" id="lineModalLabel">Pembayaran {{$data->NamaAnggota}}</h3>
                        </div>
                        <div class="modal-body">
                          
                                <!-- content goes here -->
                          <form action="{{route('bayarAnggota')}}" method="post">
                                  
                                  
                                    <label for="exampleInputPassword1">Anda yakin {{$data->NamaAnggota}} sudah membayar ???</label><br>
                                    <input type="hidden" class="form-control" id="exampleInputPassword1" value="{{$data->No}}" name="no" placeholder="Enter address">
                                 
                                 
                                 
                                  <button type="submit" class="btn btn-default">Ok</button>
                            </form>

                        </div>
                        
                      </div>
                      </div>
                    </div>
                     @endforeach
                    </tbody>
                    <tfoot>
                      
                    </tfoot>
              </table>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <a href="" data-toggle="modal" data-target="#squarespaceModal">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">&nbsp;</span>
                  <span class="info-box-number" style="color:#000000">Tambah Anggota</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </a>
            </div><!-- /.col -->
            <div class="col-md-6 col-sm-6 col-xs-12">
              <a href="{{route('pemenang')}}" disabled>
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-refresh"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">&nbsp;</span>
                  <span class="info-box-number" style="color:#000000">Kocok Arisan</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </a>
            </div><!-- /.col -->
          </div>
            

            <!-- line modal -->
            <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h3 class="modal-title" id="lineModalLabel">Tambah Anggota</h3>
                </div>
                <div class="modal-body">
                  
                        <!-- content goes here -->
                  <form action="{{route('tambahAnggota')}}" method="post">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="alamat" placeholder="Enter address">
                          </div>
                         
                         
                          <button type="submit" class="btn btn-default">Submit</button>
                    </form>

                </div>
                
              </div>
              </div>
            </div>

            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h3 class="modal-title" id="lineModalLabel">Tambah Anggota</h3>
                </div>
                <div class="modal-body">
                  
                        <!-- content goes here -->
                  <form action="{{route('tambahAnggota')}}" method="post">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="alamat" placeholder="Enter address">
                          </div>
                         
                         
                          <button type="submit" class="btn btn-default">Submit</button>
                    </form>

                </div>
                
              </div>
              </div>
            </div>


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
