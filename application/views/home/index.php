<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('./home/partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('./home/partials/header.php') ?>

  <!-- Home Banner -->
  <div class="hero-wrap ftco-degree-bg" style="background-image: url('<?= base_url(); ?>assets/home/images/dr.jpg')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
        <div class="col-lg-8 ftco-animate">
          <div class="text w-100 text-center mb-md-5 pb-md-5">
            <h1 class="mb-4">Build Your Engine Now!</h1>
            <p style="font-size: 18px">
              Okta garage is a repair shop with reliable technicians
            </p>
            <a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Home Banner -->

  <!-- Booking Service Items -->
  <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <span class="subheading">Okta Garage</span>
          <h2 class="mb-2">
            Penuhi Kebutuhan Anda
          </h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="carousel-car owl-carousel">
            <?php foreach ($services as $data) : ?>

              <!-- Var Dump -->
              <!-- <pre>
                <?php var_dump($data) ?>
              </pre> -->

              <div class="item">
                <div class="car-wrap rounded ftco-animate">
                  <div class="img rounded d-flex align-items-end" style="background-image: url(<?= $data["gambar"] ?>)"></div>
                  <div class="text">
                    <h2 class="mb-0">
                      <a href="booknowpaket.html">
                        <?= $data["jenis_service"] ?>
                      </a>
                    </h2>
                    <hr>
                    <div class="d-flex mb-0 d-block">
                      <!-- Tombol Detail-->
                      <a href="<?= base_url('home/detail/' . $data["id_service"]) ?>" class="btn btn-primary py-2 mr-1">
                        Detail
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="text-center">
        <a href="<?= base_url('home/services') ?>" class="btn btn-primary py-3 px-5">
          Lihat Semua Layanan
        </a>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-about">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?= base_url(); ?>assets/home/images/masalah.jpg)"></div>
        <div class="col-md-6 wrap-about ftco-animate">
          <div class="heading-section heading-section-black pl-md-5">
            <h2 class="mb-4 text-black">MERASAKAN MASALAH INI PADA MOBIL ANDA?</h2>
            <p>
            <h4 class="mb-4 text-white">Lakukan General <br> Check Up<br> Di Okta Garage Sekarang!</h4> <br>
            <h5 class="mb-4 text-white">Cek Kondisi mobill kesayangan anda agar terhindar dari kerusakan parah <br>
              dan membuat biaya perbaikannya makin mahal. Periksa Kondisi komponen mobil <br>
              anda dengan General Check Up di Okta Garage.</h5>
            </p>
            <p>
              <a href="bookGeneralcheckup.html" class="btn btn-primary py-3 px-4">General Check Up</a>
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
              Okta Garage adalah bengkel mobil modern.
              Menyediakan berbagai layanan perawatan mobil profesional, dengan
              teknisi yang ahli, untuk atasi permasalahan mobil secara maksimal.
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
              <H6 class="py-2 d-block">Senin - Minggu : 09 : 00 - 17 : 00 </H6>
              <H6 class="py-2 d-block">Jumat : Libur ( TUTUP )</H6>
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