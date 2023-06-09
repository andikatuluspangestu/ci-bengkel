<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('./home/partials/head.php') ?>
<style>
  ul,
  ol {
    list-style-type: none;
  }

  .desc-center {
    display: flex;
    justify-content: center;
    align-items: center;
    /* Ubah sesuai kebutuhan Anda */
  }
</style>

<body>

  <?php $this->load->view('./home/partials/header.php') ?>

  <section class="hero-wrap hero-wrap-2" style="background-image: url('https://source.unsplash.com/random?car')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <h1 class="mb-3 bread"><?= $service->jenis_service; ?></h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Detail Services</span>
          <h2 class="mb-3"><?= $service->jenis_service; ?></h2>
        </div>
      </div>
      <div class="Center">
        <div class="col-center-7">
          <div class="services services-2 w-100 text-center">
            <div class="text w-100">
              <h2 class="mb-2"><span>Rp. <?= number_format($service->biaya, 0, ',', '.'); ?></span></h2>
              <p>
                Pengerjaan services dilakukan oleh para mekanik mekanik handal dan sudah berpengalaman
              </p>
              <h3 class="center">Servis Meliputi : </h3>
              <div class="desc-center">
                <table>
                  <tbody>
                    <?php
                    $deskripsi = $service->deskripsi;
                    // Menghapus tag <ol> dan <ul>
                    $deskripsi = preg_replace('/<\/?ol[^>]*>/', '', $deskripsi);
                    $deskripsi = preg_replace('/<\/?ul[^>]*>/', '', $deskripsi);
                    // Menghapus tag <li> dan mengganti dengan tag <tr> dan <td>
                    $deskripsi = preg_replace('/<li[^>]*>/', '<tr><td>', $deskripsi);
                    $deskripsi = preg_replace('/<\/li>/', '</td></tr>', $deskripsi);
                    // Mengganti tag <ul> dan <ol> dengan <table>
                    $deskripsi = preg_replace('/<ul[^>]*>/', '<table>', $deskripsi);
                    $deskripsi = preg_replace('/<ol[^>]*>/', '<table>', $deskripsi);
                    echo $deskripsi;
                    ?>
                  </tbody>
                </table>
              </div>
              <hr>
              <h6 class="center">Noted : biaya sudah termasuk jasa services</h6>
              </p>
            </div>
            <p class="text-md-center">
              <a href="<?= base_url('home/services'); ?>" class="btn btn-primary btn-outline-primary">Back</a>
              <a href="<?= base_url('home/booknow/' . $service->id_service); ?>" class="btn btn-primary btn-outline-primary">Booking</a>
            </p>
          </div>
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

  <?php $this->load->view('./home/partials/footer.php') ?>
</body>

</html>