<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <input type="text" class="form-control" name="id_service" id="id_service" value="<?php echo $id_service; ?>" disabled />
  </div>

  <div class="form-group">
    <label for="varchar">Nama atau Jenis Service </label>
    <input type="text" class="form-control" name="jenis_service" id="jenis_service" placeholder="Jenis Service" value="<?php echo $jenis_service; ?>" />
  </div>

  <div class="form-group">
    <label for="qty">Deskripsi Service</label>
    <!-- Textarea -->
    <div class="form-group">
      <textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo $deskripsi; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="varchar">Link Gambar</label>
    <input type="text" class="form-control" name="gambar" id="gambar" placeholder="Gambar" value="<?php echo $gambar; ?>" />
  </div>

  <div class="form-group">
    <label for="biaya">Harga</label>
    <input type="text" class="form-control" name="biaya" id="biaya" placeholder="Masukan Harga Paket Service" value="<?php echo $biaya; ?>" />
  </div>

  <input type="hidden" name="id_service" value="<?php echo $id_service; ?>" />
  <button type="submit" class="btn btn-primary">Simpan Data</button>
  <a href="<?php echo site_url('service') ?>" class="btn btn-default">Batal</a>
</form>