<div class="row" style="margin-bottom: 10px">
  <div class="col-md-4">
    <?php echo anchor(site_url('service/create'), 'Tambah Paket', 'class="btn btn-primary"'); ?>
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
    <th>Kode Paket</th>
    <!-- <th>Thumbnail</th> -->
    <th>Nama Paket</th>
    <th>Biaya</th>
    <th>Action</th>
  </tr>
  <?php foreach ($service_data as $data) : ?>
    <tr>
      <td>SP<?php echo str_pad($data->id_service, 4, "0", STR_PAD_LEFT)  ?></td>
      <!-- <td><img src="<?php echo $data->gambar ?>" width="64" /></td> -->
      <td><?php echo $data->jenis_service ?></td>
      <td>
        <!-- Format Rupiah -->
        <?php echo 'Rp ' . number_format($data->biaya, 0, ',', '.') ?>
      </td>
      <td style="text-align:center" width="200px">
        <!-- Gunakan Bootstrap Button -->
        <a href="<?php echo site_url('service/update/' . $data->id_service) ?>" class="btn btn-info btn-sm"><span class="fa fa-pencil"></span></a>
        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModal<?php echo $data->id_service ?>"><span class="fa fa-eye"></span></a>
        <a href="<?php echo site_url('service/delete/' . $data->id_service) ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
      </td>
    </tr>
    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal<?php echo $data->id_service ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?php echo $data->id_service ?>" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="detailModalLabel<?php echo $data->id_service ?>">Detail Paket Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Tampilkan detail data paket service di sini -->
            <p>Kode Paket: SP<?php echo str_pad($data->id_service, 4, "0", STR_PAD_LEFT) ?></p>
            <p>Nama Paket: <?php echo $data->jenis_service ?></p>
            <p>Biaya: <?php echo 'Rp ' . number_format($data->biaya, 0, ',', '.') ?></p>
            <p>Deskripsi: <?php echo $data->deskripsi ?></p>
            <!-- Tambahkan informasi lainnya yang diperlukan -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Detail Modal -->
  <?php endforeach; ?>
</table>
<div class="row">
  <div class="col-md-6 text-right">
    <?php echo $pagination ?>
  </div>
</div>