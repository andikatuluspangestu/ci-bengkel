<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Sparepart_model extends CI_Model
{

  public $table = 'sparepart';
  public $id = 'kd_sparepart';
  public $order = 'DESC';

  function __construct()
  {
    parent::__construct();
  }

  // get all
  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  // get data by id
  public function get_by_id($id)
  {
    $query = $this->db->get_where('sparepart', array('kd_sparepart' => $id));
    return $query->row_array();
  }

  // get total rows
  function total_rows($q = NULL)
  {
    $this->db->like('kd_sparepart', $q);
    $this->db->or_like('nama_sparepart', $q);
    $this->db->or_like('qty', $q);
    $this->db->or_like('harga', $q);
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

  // get data with limit and search
  function get_limit_data($limit, $start = 0, $q = NULL)
  {
    $this->db->order_by($this->id, $this->order);
    $this->db->like('kd_sparepart', $q);
    $this->db->or_like('nama_sparepart', $q);
    $this->db->or_like('qty', $q);
    $this->db->or_like('harga', $q);
    $this->db->limit($limit, $start);
    return $this->db->get($this->table)->result();
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
    $query = $this->db->get('sparepart');
    return $query->num_rows();
  }
}
