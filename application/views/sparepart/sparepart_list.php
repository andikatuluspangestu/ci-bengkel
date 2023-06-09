<div class="row" style="margin-bottom: 10px">
  <div class="col-md-4">
    <?php echo anchor(site_url('sparepart/create'), 'Tambah Produk', 'class="btn btn-primary"'); ?>
  </div>
  <div class="col-md-4 text-center">
    <div style="margin-top: 8px" id="message">
      <?php if ($this->session->flashdata('message')) : ?>
        <?php echo $this->session->flashdata('message'); ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="col-md-1 text-right">
  </div>
  <div class="col-md-3 text-right">
    <form action="<?php echo site_url('sparepart/index'); ?>" class="form-inline" method="get">
      <div class="input-group">
        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
        <span class="input-group-btn">
          <?php
          if ($q <> '') {
          ?>
            <a href="<?php echo site_url('sparepart'); ?>" class="btn btn-default">Reset</a>
          <?php
          }
          ?>
          <button class="btn btn-primary" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
  </div>
</div>
<table class="table table-bordered" style="margin-bottom: 10px">
  <tr>
    <th>Kode Produk</th>
    <th>Nama Sparepart</th>
    <th>Stok</th>
    <th>Harga Satuan</th>
    <th>Action</th>
  </tr>
  <?php
  foreach ($sparepart_data as $sparepart) {
  ?>
    <tr>
      <td>SP<?php echo str_pad($sparepart->kd_sparepart, 4, "0", STR_PAD_LEFT)  ?></td>
      <td><?php echo $sparepart->nama_sparepart ?></td>
      <td><?php echo number_format($sparepart->qty, 0, ',', '.') ?></td>
      <td>
        <!-- Foemat Rupiah -->
        <?php echo "Rp " . number_format($sparepart->harga, 0, ',', '.') ?>
      </td>
      <td style="text-align:center" width="200px">
        <!-- Gunakan Bootstrap Button -->
        <a href="<?php echo site_url('sparepart/update/' . $sparepart->kd_sparepart) ?>" class="btn btn-info btn-sm"><span class="fa fa-pencil"></span> Edit</a>
        <a href="<?php echo site_url('sparepart/delete/' . $sparepart->kd_sparepart) ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Delete</a>
      </td>
    </tr>
  <?php
  }
  ?>
</table>
<div class="row">
  <div class="col-md-6 text-right">
    <?php echo $pagination ?>
  </div>
</div>