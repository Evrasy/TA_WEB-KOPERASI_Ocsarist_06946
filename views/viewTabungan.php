<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Tabungan anggota | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>LP</b>HRD</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RT</b>|47</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

     <?php include("navbar.php") ?>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php include("sidebar.php") ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tabugan Warga
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data tabungan</h3>
            </div>
            <div class="box-footer">
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Daftar</button>
            </div>
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No Tabungan</th>
                  <th>No Simpan</th>
                  <th>Tabungan</th>
                </tr>
                </thead>
                <tbody>
<?php
require '../models/modelTabungan.php';
$objmodelTab=new modelTabungan();
$objmodelTab->select();
$dataTab=$objmodelTab->getData();
foreach ($dataTab as $key)
{
?>

                <tr>
                  <td><?php echo $key['NO_TABUNGAN'] ?>  </td>
                  <td><?php echo $key['NO_SIMPAN'] ?></td>
                  <td><?php echo $key['TABUNGAN'] ?></td>
                  
                  <td>
                    <a class="btn btn-social-icon" title="Detail"><i class="fa fa-book" data-toggle="modal" href="#mymodal2<?php echo $key['NO_TABUNGAN']; ?>"></i></a>

                     <a class="btn btn-social-icon" title="Edit"><i class="fa fa-edit" data-toggle="modal" href="#mymodal<?php echo $key['NO_TABUNGAN']; ?>"></i></a>
                    <a class="btn btn-social-icon" title="Hapus" href="../proses/prosesTabungan.php?aksi=hapus&notabpus=<?php echo $key['NO_TABUNGAN'];?>"><i class="fa fa-bitbucket">  </i></a>
                  </td>
                </tr>
        <div class="modal fade" id="mymodal<?php echo $key['NO_TABUNGAN']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">update tabungan</h4>
              </div>
              <div class="modal-body">
                <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="../proses/prosesTabungan.php?aksi=edit" method="post">
              <div class="box-body">
                 <div class="form-group">
                  <label for="inputIdbendahara">No tabungan</label>
                  <input type="text" class="form-control" id="inputNotabungan" name="notabBaru" value="<?php echo $key['NO_TABUNGAN'];?> "placeholder="Enter" readonly>
                </div>
                <div class="form-group">
                  <label for="input nama">No simpan</label>
                  <input type="input" class="form-control" id="inputNosimpan" name="nosimbaru" value="<?php echo $key['NO_SIMPAN'];?>" >
                </div>
                <div class="form-group">
                  <label for="input noHp">Tabungan</label>
                  <input type="input" class="form-control" id="inputTabungan" name="tabunganbaru" value="<?php echo $key['TABUNGAN'];?>">
                </div>
               <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


        <div class="modal fade" id="mymodal2<?php echo $key['NO_TABUNGAN'];  ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Tabungan</h4>
              </div>
              <div class="modal-body">
                <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="../proses/prosesTabungan.php?aksi=cek" method="post">
                 <div class="box" id="mymodal2<?php echo $key['NO_TABUNGAN'];  ?>">
                </div>
                <div class="box-body">
                  <div class="form-group">
                   <div class="form-group">
                  <label for="inputIdbendahara">No tabungan</label>
                  <input type="text" class="form-control" id="inputNotabungan" name="notab" value="<?php echo $key['NO_TABUNGAN'];?> "placeholder="Enter" readonly>
                </div>
                 <div class="form-group">
                  <label for="inputIdbendahara">No simpan</label>
                  <input type="text" class="form-control" id="inputNosimpan" name="nosim" value="<?php echo $key['NO_SIMPAN'];?> "placeholder="Enter" readonly>
                </div>
                 <div class="form-group">
                  <label for="inputIdbendahara">Tabung</label>
                  <input type="text" class="form-control" id="inputTabunganbaru" name="tab" value="<?php echo $key['TABUNGAN'];?> "placeholder="Enter" readonly>
                </div>
                </div>
                <!-- /.box-body -->
              </form>
                <!-- /.box-footer-->
              </div>
              <!-- /.box -->
              
              </div>
              <!-- /.box-body -->
            </form>
          </div>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
}
?>

                </tfoot>
              </table>
            </div>  
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Masukin Data tabungan</h4>
              </div>
              <div class="modal-body">
                <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal"    action="../proses/prosesTabungan.php?aksi=tambah" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No tabungan</label>

                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="inputNotabungan" name="notabinput">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">no Ktp</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="nosimpanput">
                      <option  selected="selected" value="">Pilih no simpan</option>
<?php
require '../models/modelSimpan.php';
$objmodelSimpan=new modelSimpan();
$objmodelSimpan->select();
$dataSimpan=$objmodelSimpan->getData();
foreach ($dataSimpan as $key)
{
?>
                      <option value="<?php echo $key['NO_KTP']; ?>"><?php echo $key['NO_SIMPAN']; ?></option>
<?php
}
?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tabungan</label>

                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="inputTabungan" name="tabunganput">
                  </div>
                </div>  
               <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              
              </div>
              <!-- /.box-body -->
            </form>
          </div>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">

  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../asset/dist/js/demo.js"></script>
<script src="../asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
