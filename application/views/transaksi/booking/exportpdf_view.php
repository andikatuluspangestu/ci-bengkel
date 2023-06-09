<!DOCTYPE html>
<html>

<head>
  <title>Booking Data</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid black;
      padding: 8px;
    }
  </style>
</head>

<body>
  <h2>Booking Data</h2>
  <table>
    <tr>
      <th>Kode</th>
      <th>No. Antrian</th>
      <th>Service</th>
      <th>Sparepart</th>
      <th>Tanggal</th>
      <th>Total Biaya</th>
    </tr>
    <?php foreach ($booking_data as $booking) { ?>
      <tr>
        <td>BK<?php echo str_pad($booking->id_booking, 4, "0", STR_PAD_LEFT)  ?></td>
        <td><?= $booking->no_antrian ?></td>
        <td><?= $booking->jenis_service ?></td>
        <td><?= $booking->nama_sparepart ?></td>
        <td><?= $booking->tgl_booking ?></td>
        <td>Rp <?= number_format($booking->total_biaya, 0, ',', '.') ?></td>
      </tr>
    <?php } ?>
    <!-- Total Keseluruhan -->
    <tr>
      <td colspan="5" style="text-align: center;"><b>Total Keseluruhan</b></td>
      <td style="text-align: left;">
        <b>
          <!-- Format Rupiah -->
          Rp <?= number_format($total_booking, 0, ',', '.') ?>
        </b>
      </td>
    </tr>
  </table>
</body>

</html>