<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Customer extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Customer_model');
    $this->load->model('No_urut');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $q = urldecode($this->input->get('q', TRUE));
    $start = intval($this->input->get('start'));

    if ($q <> '') {
      $config['base_url'] = base_url() . 'customer/index.html?q=' . urlencode($q);
      $config['first_url'] = base_url() . 'customer/index.html?q=' . urlencode($q);
    } else {
      $config['base_url'] = base_url() . 'customer/index.html';
      $config['first_url'] = base_url() . 'customer/index.html';
    }

    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;
    $config['total_rows'] = $this->Customer_model->total_rows($q);
    $customer = $this->Customer_model->get_limit_data($config['per_page'], $start, $q);

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data = array(
      'customer_data' => $customer,
      'q' => $q,
      'pagination' => $this->pagination->create_links(),
      'total_rows' => $config['total_rows'],
      'start' => $start,
      'konten' => 'customer/customer_list',
      'judul' => 'Data Customer',
    );
    $this->load->view('dashboard', $data);
  }

  public function create()
  {
    $data = array(
      'button' => 'Create',
      'action' => site_url('customer/create_action'),
      'kd_customer' => $this->No_urut->buat_kode('customer', 'id_customer', 'CS'),
      'id_customer' => set_value('id_customer'),
      'nama_customer' => set_value('nama_customer'),
      'alamat' => set_value('alamat'),
      'no_tlp' => set_value('no_tlp'),
      'no_stnk' => set_value('no_stnk'),
      'konten' => 'customer/customer_form',
      'judul' => 'Data Customer',
    );
    $this->load->view('dashboard', $data);
  }

  public function create_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $data = array(
        'nama_customer' => $this->input->post('nama_customer', TRUE),
        'alamat' => $this->input->post('alamat', TRUE),
        'no_tlp' => $this->input->post('no_tlp', TRUE),
        'no_stnk' => $this->input->post('no_stnk', TRUE),
      );

      $this->Customer_model->insert($data);
      $this->session->set_flashdata('message', 'Create Record Success');
      redirect(site_url('customer'));
    }
  }

  public function update($id)
  {
    $row = $this->Customer_model->get_by_id($id);

    if ($row) {
      $data = array(
        'button' => 'Update',
        'action' => site_url('customer/update_action'),
        'id_customer' => set_value('id_customer', $row->id_customer),
        'kd_customer' => 'CS' . set_value('kd_customer', str_pad($row->id_customer, 4, "0", STR_PAD_LEFT)),
        'nama_customer' => set_value('nama_customer', $row->nama_customer),
        'alamat' => set_value('alamat', $row->alamat),
        'no_tlp' => set_value('no_tlp', $row->no_tlp),
        'no_stnk' => set_value('no_stnk', $row->no_stnk),
        'konten' => 'customer/customer_form',
        'judul' => 'Data customer',
      );
      $this->load->view('dashboard', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('customer'));
    }
  }

  public function update_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->update($this->input->post('id_customer', TRUE));
    } else {
      $data = array(
        'nama_customer' => $this->input->post('nama_customer', TRUE),
        'alamat' => $this->input->post('alamat', TRUE),
        'no_tlp' => $this->input->post('no_tlp', TRUE),
        'no_stnk' => $this->input->post('no_stnk', TRUE),
      );

      $this->Customer_model->update($this->input->post('id_customer', TRUE), $data);
      $this->session->set_flashdata('message', 'Update Record Success');
      redirect(site_url('customer'));
    }
  }

  public function delete($id)
  {
    $row = $this->Customer_model->get_by_id($id);

    if ($row) {
      $this->Customer_model->delete($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('customer'));
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('customer'));
    }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nama_customer', 'nama customer', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('no_tlp', 'no_tlp', 'trim|required');
    $this->form_validation->set_rules('no_stnk', 'no_stnk', 'trim|required|max_length[8]');

    $this->form_validation->set_rules('id_customer', 'id_customer', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }
}
