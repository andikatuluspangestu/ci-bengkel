<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class No_urut extends CI_Model
{
    function buat_kode($table, $id, $prefix = 'KD')
    {
        $this->db->select('RIGHT(' . $table . '.' . $id . ',4) as kode', FALSE);
        $this->db->order_by($id, 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($table);

        //cek dulu apakah ada sudah ada kode di tabel.
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = $prefix . $kodemax;
        return $kodejadi;
    }
}
