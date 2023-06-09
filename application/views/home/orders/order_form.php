<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('./home/partials/head.php') ?>

<body>


  <?php $this->load->view('./home/partials/header.php') ?>

  <section class="hero-wrap hero-wrap-2" style="background-image: url('https://source.unsplash.com/random?car')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <h1 class="mb-3 bread">
            Formulir Pemesanan
            <?php  ?>
          </h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="card">
        <div class="card">
          <div class="card-body">
            <form action="<?php echo base_url('home/order'); ?>" method="post">
              <input type="hidden" name="tgl_booking" value="<?php echo date('Y-m-d'); ?>">
              <input type="hidden" name="id_service" value="<?php echo $service->id_service; ?>">

              <div class="mb-3">
                <label for="nama_customer" class="form-label">Nama Customer:</label>
                <input type="text" name="nama_customer" id="nama_customer" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="id_sparepart">Sparepart:</label>
                <select name="id_sparepart" id="id_sparepart" class="form-control" required>
                  <option value="">Pilih Sparepart</option>
                  <?php foreach ($spareparts as $sparepart) : ?>
                    <option value="<?php echo $sparepart->kd_sparepart; ?>">
                      <?php echo $sparepart->nama_sparepart; ?> - Rp <?php echo number_format($sparepart->harga, 0, ',', '.'); ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>


              <div class="mb-3">
                <label for="jenis_service" class="form-label">Jenis Service:</label>
                <input type="text" name="jenis_service" id="jenis_service" class="form-control" value="<?= $service->jenis_service; ?>" required>
              </div>

              <!-- Total Biaya Services ( diambil dari biaya jenis service ) + Harga Sparepart -->
              <div class="total-biaya">
                <?php
                $biayaJenisService = $service->biaya;
                $selectedSparepart = $_POST['kd_sparepart']; // Ambil nilai terpilih dari $_POST
                $hargaSparepart = 0; // Default harga sparepart

                // Cari harga sparepart yang sesuai dengan nilai terpilih
                foreach ($spareparts as $sparepart) {
                  if ($sparepart->kd_sparepart === $selectedSparepart) {
                    $hargaSparepart = $sparepart->harga;
                    break;
                  }
                }

                $totalBiaya = $biayaJenisService + $hargaSparepart;
                ?>

                <label for="total_biaya" class="form-label">Total Biaya: Rp <?= number_format($totalBiaya, 0, ',', '.'); ?></label>
                <input type="text" name="total_biaya" id="total_biaya" class="form-control" value="<?= $totalBiaya; ?>" readonly>
              </div>

              <div class="form-group">
                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
              </div>
            </form>

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