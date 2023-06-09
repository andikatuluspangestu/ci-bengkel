<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Service_model extends CI_Model
{

  public $table = 'service';
  public $id    = 'id_service';
  public $order = 'DESC';

  function __construct()
  {
    parent::__construct();
  }

  // Ambil semua data
  function get_all()
  {
    $query = $this->db->get('service');
    return $query->result_array();
  }

  // Ambil semua data dan limit 3
  function get_all_limit()
  {
    $this->db->limit(3);
    $query = $this->db->get('service');
    return $query->result_array();
  }

  // Ambil data berdasarkan id
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  // get total rows
  function total_rows($q = NULL)
  {
    $this->db->like($this->table . '.id_service', $q);
    $this->db->or_like($this->table . '.jenis_service', $q);
    $this->db->or_like($this->table . '.deskripsi', $q);
    $this->db->or_like($this->table . '.biaya', $q);
    $this->db->from($this->table);

    return $this->db->count_all_results();
  }

  // get data with limit and search
  function get_limit_data($limit, $start = 0, $q = NULL)
  {
    $this->db->order_by($this->id, $this->order);
    $this->db->like($this->table . '.id_service', $q);
    $this->db->or_like($this->table . '.jenis_service', $q);
    $this->db->or_like($this->table . '.deskripsi', $q);
    $this->db->or_like($this->table . '.biaya', $q);
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

  // jumlah paket services
  function get_count()
  {
    $query = $this->db->get('service');
    return $query->num_rows();
  }

  // Generate Data Dummy
  public function generate_dummy_data()
  {
    $services = [];

    $jenis_services = [];
    for ($i = 1; $i <= 10; $i++) {
      $jenis_services[] = "Service " . $i;
    }

    $deskripsi = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in arcu pulvinar, consectetur lorem eu, tristique est. Sed mollis ipsum id eros egestas semper. Nulla vitae tortor at metus laoreet dictum.";
    $base_url = "https://source.unsplash.com/random?car";

    foreach ($jenis_services as $index => $jenis_service) {
      $random_keyword = substr(md5(uniqid(rand(), true)), 0, 10); // Kata kunci acak dan unik
      $biaya = ceil(rand(10, 150) / 10) * 1000; // Menghasilkan kelipatan 000

      $service = [
        'id_service' => $index + 1,
        'jenis_service' => $jenis_service,
        'deskripsi' => $deskripsi,
        'gambar' => $base_url . '&' . $random_keyword,
        'biaya' => $biaya
      ];
      $services[] = $service;
    }


    // Insert the dummy data into the database
    $this->db->insert_batch('service', $services);
  }


}
