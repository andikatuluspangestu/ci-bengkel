<?php include 'config/header.php'; ?>
<div class="container-fluid">
  <!--documents-->
  <div class="row row-offcanvas row-offcanvas-left">

    <?php //include 'config/menu.php';
    ?>

    <div class="col-xs-12 col-sm-9 content">

      <div class="panel panel-default">
        <div class="panel-heading">
          <!-- <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> <?php echo $judul; ?></h3> -->
        </div>
        <div class="panel-body">
          <div class="content-row">
            <h2 class="content-row-title">Form Registrasi</h2>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    Silahkan Mendaftar di bawah ini.
                  </div>
                  <div class="panel-body">
                    <form action="app/simpan_reg" method="post">
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="" class="btn btn-primary">Kembali</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div><!-- panel body -->
      </div>

    </div><!-- content -->
  </div>
</div>
<!--footer-->
<?php //include 'config/footer.php';
?>