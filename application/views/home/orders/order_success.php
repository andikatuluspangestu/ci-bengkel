<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('./home/partials/head.php') ?>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark fixed-top" id="ftco-navbar" style="background-color: black !important;">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url(); ?>">Okta<span>Garage</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a href="<?= base_url(); ?>" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>about" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>contact" class="nav-link">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="ftco-section">
    <div class="container">
      <div class="card">
        <div class="card">
          <div class="card-body mb-4" id="cetak-area">
            <div class="ucapan-selamat text-center">
              <h1>
                <i class="fa fa-check-circle text-success"></i>
                Orderan Anda Berhasil Dibuat
              </h1>
              <p>
                Terima kasih telah melakukan pemesanan di Okta Garage. Silahkan
                tunggu antrian dan lakukan pembayaran dengan detail berikut :
              </p>
              <table class="table">
                <tr>
                  <td>No. Antrian</td>
                  <td>Tanggal</td>
                  <td>Nama Kustomer</td>
                  <td>Sparepart ID</td>
                  <td>Paket Service</td>
                  <td>Total Biaya</td>
                </tr>
                <tr>
                  <td><?= $no_antrian ?></td>
                  <td><?= $tgl_booking ?></td>
                  <td><?= $nama_customer ?></td>
                  <td><?= $id_sparepart ?></td>
                  <td><?= $jenis_service ?></td>
                  <td>
                    <strong>
                      Rp. <?= number_format($total_biaya, 0, ',', '.') ?>
                    </strong>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <a href="#" class="btn btn-danger btn-sm" onclick="printElement('cetak-area')">
            <i class="fa fa-print"></i> Cetak Struk
          </a>
        </div>
      </div>
    </div>
  </section>

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">
              <a href="#" class="logo">Okta<span>Garage</span></a>
            </h2>
            <p>
              Okta Garage adalah bengkel mobil modern. Menyediakan berbagai
              layanan perawatan mobil profesional, dengan teknisi yang ahli,
              untuk atasi permasalahan mobil secara maksimal.
            </p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate">
                <a href="#"><span class="icon-twitter"></span></a>
              </li>
              <li class="ftco-animate">
                <a href="#"><span class="icon-facebook"></span></a>
              </li>
              <li class="ftco-animate">
                <a href="#"><span class="icon-instagram"></span></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Jam Buka</h2>
            <ul class="list-unstyled">
              <h6 class="py-2 d-block">Senin - Minggu : 09 : 00 - 17 : 00</h6>
              <h6 class="py-2 d-block">Jumat : Libur ( TUTUP )</h6>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Infromation</h2>
            <div class="block-23 mb-3">
              <ul>
                <li>
                  <span class="icon icon-map-marker"></span><span class="text">jl. M Toha Rt. 02 Rw 02 Kel. Bandung. Kec Tegal Selatan</span>
                </li>
                <li>
                  <a href="https://wa.me/6285327069170?&text="><span class="icon icon-phone"></span><span class="text">0853 2706 9170</span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            All rights reserved | Okta Garage
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
  </div>

  <script>
    function printElement(elementId) {
      var printContent = document.getElementById(elementId).innerHTML;
      var originalContent = document.body.innerHTML;

      document.body.innerHTML = printContent;
      window.print();

      document.body.innerHTML = originalContent;
    }
  </script>

  <?php $this->load->view('./home/partials/footer.php') ?>
</body>

</html>