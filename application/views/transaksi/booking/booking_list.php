<div class="row" style="margin-bottom: 10px">
  <div class="col-md-4">
    <!-- Export PDF Button -->
    <a href="<?= base_url('/booking/exportpdf'); ?>">
      Export PDF
    </a>
  </div>

  <div class="col-md-4 text-center">
    <!-- <div style="margin-top: 8px" id="message">
      <?php if ($this->session->flashdata('message')) : ?>
        <?php echo $this->session->flashdata('message'); ?>
      <?php endif; ?>
    </div> -->
  </div>
  <div class="col-md-1 text-right">
  </div>
  <div class="col-md-3 text-right">
    <form action="<?php echo site_url('transaksi/booking/index'); ?>" class="form-inline" method="get">
      <div class="input-group">
        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
        <span class="input-group-btn">
          <?php
          if ($q <> '') {
          ?>
            <a href="<?php echo site_url('transaksi/booking/index'); ?>" class="btn btn-default">Reset</a>
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
    <th>Kode</th>
    <th>No. Antrian</th>
    <th>Service</th>
    <th>Sparepart</th>
    <th>Tanggal</th>
    <th>Total Biaya</th>
    <th>Action</th>
  </tr>
  <?php foreach ($booking_data as $booking) { ?>
    <tr>
      <td>BK<?php echo str_pad($booking->id_booking, 4, "0", STR_PAD_LEFT)  ?></td>
      <td><?= $booking->no_antrian ?></td>
      <td><?= $booking->jenis_service ?></td>
      <td><?= $booking->nama_sparepart ?></td>
      <td><?= $booking->tgl_booking ?></td>
      <td><?= number_format($booking->total_biaya, 0, ',', '.') ?></td>
      <td style="text-align:center">
        <a href="<?php echo site_url('transaksi/booking/update/' . $booking->id_booking) ?>" class="btn btn-info btn-sm "><span class="fa fa-pencil"></span> Edit</a>
        <a href="<?php echo site_url('transaksi/booking/delete/' . $booking->id_booking) ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span> Delete</a>
        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#bookingModal<?php echo $booking->id_booking; ?>"><span class="fa fa-eye"></span> View</a>
        <!-- Tombol Print -->
        <a href="<?= base_url('transaksi/booking/print_booking/' . $booking->id_booking); ?>" class="btn btn-success btn-sm" target="_blank"><span class="fa fa-print"></span> Print</a>

      </td>
    </tr>

    <!-- Modal -->
    <div class="modal fade" id="bookingModal<?php echo $booking->id_booking; ?>" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel<?php echo $booking->id_booking; ?>" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="bookingModalLabel<?php echo $booking->id_booking; ?>">Booking Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p><strong>Kode: </strong>BK<?php echo str_pad($booking->id_booking, 4, "0", STR_PAD_LEFT)  ?></p>
            <p><strong>No. Antrian: </strong><?php echo $booking->nama_customer; ?></p>
            <p><strong>No. Antrian: </strong><?php echo $booking->no_antrian; ?></p>
            <p><strong>Service: </strong><?php echo $booking->jenis_service; ?></p>
            <p><strong>Sparepart: </strong><?php echo $booking->nama_sparepart; ?></p>
            <p><strong>Tanggal: </strong><?php echo $booking->tgl_booking; ?></p>
            <p><strong>Total Biaya: </strong><?php echo number_format($booking->total_biaya, 0, ',', '.'); ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</table>

<div class="row">
  <div class="col-md-6 text-right">
    <?php echo $pagination ?>
  </div>
</div>