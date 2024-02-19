<?php include 'config/header.php';?>

<head>
  <style>
    .card {
      margin-top: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
      background-color: #ffffff;
      border-radius: 8px;
      padding: 20px;
    }
  </style>
</head>

<div class="container-fluid">
  <div class="row row-offcanvas row-offcanvas-left">
    <?php include 'config/menu.php';?>
    <div class="col-xs-12 col-sm-9 content">
      <div class="panel panel-default" style="height: 100vh; min-height: 100%;">
        <div class="panel-body mt-5">
          <div class="content-row">
            <h2 class="content-row-title"><?php echo $judul; ?></h2>
            <div class="row">
              <div class="col-md-12">
                <!-- Jika judul == dashboard -->
                <?php if ($judul == "Dashboard"): ?>
                  <div class="row">
                    <!-- Card Jumlah Booking -->
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Jumlah Booking</h5>
                          <p class="card-text"><?php echo $jumlah_booking; ?></p>
                        </div>
                      </div>
                    </div>

                    <!-- Card Sparepart -->
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Sparepart</h5>
                          <p class="card-text"><?php echo $jumlah_sparepart; ?></p>
                        </div>
                      </div>
                    </div>

                    <!-- Card Paket Services -->
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Paket Services</h5>
                          <p class="card-text"><?php echo $jumlah_paket_services; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php else: ?>
                  <?php include $konten . '.php';?>
                <?php endif;?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="assets/bootstrap-datepicker.js"></script>

<script type="text/javascript">
  $('.tgl').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    //startView: 2,
    todayBtn: true,
    todayHighlight: true,
    //clearBtn: true,
    language: 'id'
  });
</script>