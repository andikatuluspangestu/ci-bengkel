<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Booking_model extends CI_Model
{

  public $table = 'booking';
  public $id    = 'id_booking';
  public $order = 'DESC';

  function __construct()
  {
    parent::__construct();
  }

  // get all
  function get_all()
  {
    $this->db->select($this->table . '.*, sparepart.nama_sparepart');
    $this->db->from($this->table);
    $this->db->join('sparepart', $this->table . '.id_sparepart = sparepart.kd_sparepart', 'left');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get()->result();
  }

  // get all data for export to pdf
  function get_pdf()
  {
    $this->db->select($this->table . '.*, sparepart.nama_sparepart');
    $this->db->from($this->table);
    $this->db->join('sparepart', $this->table . '.id_sparepart = sparepart.kd_sparepart', 'left');

    $this->db->order_by($this->id, $this->order);

    return $this->db->get()->result();
  }

  // totalDanaBooking
  function totalDanaBooking()
  {
    $this->db->select_sum('total_biaya');
    $this->db->from($this->table);
    $result = $this->db->get()->row();

    if ($result) {
      return $result->total_biaya;
    } else {
      return 0; // Atau nilai default lainnya jika tidak ada hasil query
    }
  }


  // get data by id
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  // get total rows
  function total_rows($q = NULL)
  {
    $this->db->from($this->table);
    $this->db->join('sparepart', $this->table . '.id_sparepart = sparepart.kd_sparepart', 'left');
    $this->db->order_by($this->id, $this->order);
    $this->db->like($this->table . '.id_booking', $q);
    $this->db->or_like($this->table . '.no_antrian', $q);
    $this->db->or_like($this->table . '.tgl_booking', $q);
    $this->db->or_like($this->table . '.total_biaya', $q);
    $this->db->or_like('sparepart.nama_sparepart', $q);
    return $this->db->count_all_results();
  }

  // get data with limit and search
  function get_limit_data($limit, $start = 0, $q = NULL)
  {
    $this->db->select($this->table . '.*, sparepart.nama_sparepart');
    $this->db->from($this->table);
    $this->db->join('sparepart', $this->table . '.id_sparepart = sparepart.kd_sparepart', 'left');
    $this->db->order_by($this->id, $this->order);
    $this->db->like($this->table . '.id_booking', $q);
    $this->db->or_like($this->table . '.no_antrian', $q);
    $this->db->or_like($this->table . '.tgl_booking', $q);
    $this->db->or_like($this->table . '.total_biaya', $q);
    $this->db->or_like('sparepart.nama_sparepart', $q);
    $this->db->limit($limit, $start);
    return $this->db->get()->result();
  }

  // insert data
  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  // update data
  function update($id, $data)
  {
    $this->db->where($this->id, $id);
    $this->db->update($this->table, $data);
  }

  // delete data
  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

  function get_count()
  {
    $this->db->select($this->table . '.*, sparepart.nama_sparepart');
    $this->db->from($this->table);
    $this->db->join('sparepart', $this->table . '.id_sparepart = sparepart.kd_sparepart', 'left');
    $this->db->order_by($this->id, $this->order);
    return $this->db->count_all_results();
  }
}


?>