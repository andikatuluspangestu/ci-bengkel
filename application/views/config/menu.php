<div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
  <ul class="list-group panel">

    <!-- Judul Menu -->
    <li class="list-group-item">
      <b>MENU UTAMA</b>
    </li>

    <li class="list-group-item"><a href="dashboard"><i class="glyphicon glyphicon-home"></i>Dashboard </a></li>

    <?php
    if ($this->session->userdata('level') == 'admin') : ?>
      <li>
        <a href="#data_master" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-th-large"></i>Data Master <span class="glyphicon glyphicon-chevron-right"></span></a>
      <li class="collapse" id="data_master">
        <a href="sparepart" class="list-group-item">Produk Sparepart</a>
        <a href="service" class="list-group-item">Paket Service</a>
      </li>
      </li>
      <li>
        <a href="#data_transaksi" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-folder-open"></i>Data Transaksi <span class="glyphicon glyphicon-chevron-right"></span></a>
      <li class="collapse" id="data_transaksi">
        <a href="transaksi/booking" class="list-group-item">Pesanan Service</a>
        <!-- <a href="transaksi/service" class="list-group-item">Service</a> -->
      </li>
      </li>
      <li class="list-group-item"><a href="users"><i class="glyphicon glyphicon-user"></i>Data Pengguna </a></li>
      <li class="list-group-item"><a href="<?php echo base_url() ?>app/logout"><i class="glyphicon glyphicon-share"></i>Logout </a></li>
    <?php endif; ?>

  </ul>
</div>