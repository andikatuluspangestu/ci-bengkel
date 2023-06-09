<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="varchar">Kode Produk <?php echo form_error('id_sparepart') ?></label>
    <input type="text" class="form-control" name="id_sparepart" id="id_sparepart" placeholder="Kode Spare Part" value="<?php echo $id_sparepart; ?>" disabled />
  </div>

  <div class="form-group">
    <label for="varchar">Nama Sparepart <?php echo form_error('nama_sparepart') ?></label>
    <input type="text" class="form-control" name="nama_sparepart" id="nama_sparepart" placeholder="Nama Spare Part" value="<?php echo $nama_sparepart; ?>" />
  </div>

  <div class="form-group">
    <label for="qty">Stok Tersedia <?php echo form_error('qty') ?></label>
    <input type="text" class="form-control" name="qty" id="qty" placeholder="Masukan jumlah yang tersedia" value="<?php echo $qty; ?>" />
  </div>

  <div class="form-group">
    <label for="harga">Harga <?php echo form_error('harga') ?></label>
    <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Satuan" value="<?php echo $harga; ?>" />
  </div>

  <input type="hidden" name="kd_sparepart" value="<?php echo $kd_sparepart; ?>" />
  <button type="submit" class="btn btn-primary">Simpan Data</button>
  <a href="<?php echo site_url('sparepart') ?>" class="btn btn-default">Batal</a>
</form>