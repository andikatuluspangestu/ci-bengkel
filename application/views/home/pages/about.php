<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('./home/partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('./home/partials/header.php') ?>

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?= base_url(); ?>assets/home/images/mustang.jpg')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs">
            <span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span>
            <span>About us <i class="ion-ios-arrow-forward"></i></span>
          </p>
          <h1 class="mb-3 bread">About Us</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-about">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?= base_url(); ?>assets/home/images/piston.jpg)"></div>
        <div class="col-md-6 wrap-about ftco-animate">
          <div class="heading-section heading-section-white pl-md-5">
            <span class="subheading">About us</span>
            <h2 class="mb-4">Welcome to OktaGarage</h2>

            <p>
              Okta Garage merupakan bengkel yang terus memfokuskan diri untuk
              terus berkembang dan merawat mesin mobil kesayangan Anda.
            </p>
            <h2 class="mb-4">Visi Misi Perusahaan</h2>
            <p>
              Menjadi yang terbaik, terpercaya dan terdepan dalam bidang
              otomotif bagi mitra dan konsumen <br />
              Misi : <br />
              - Menyajikan pelayanan berkualitas tinggi dengan harga terbaik
              <br />
              - Memberikan pelayanan terbaik kepada mitra dan pelanggan <br />
              - Memberikan transparansi data dalam segala pelayanan <br />
              - Memberikan inovasi terdepan dalam bidang otomotif
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
              <a class="logo">Okta<span>Garage</span></a>
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
                  <span class="icon icon-map-marker"></span><span class="text">jl. M Toha Rt. 02 Rw 02 Kel. Bandung. Kec Tegal
                    Selatan</span>
                </li>
                <li></li>
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