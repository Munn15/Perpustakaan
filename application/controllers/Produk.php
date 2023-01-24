<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Produk_model"); //load model Produk
    }

    //method pertama yang akan di eksekusi
    public function index()
    {

        $data["title"] = "List Data Produk";
        //ambil fungsi getAll untuk menampilkan semua data produk
        $data["data_produk"] = $this->Produk_model->getAll();
        //load view header.php pada folder views/templates
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        //load view index.php pada folder views/produk
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    //method add digunakan untuk menampilkan form tambah data produk
    public function add()
    {
        $produk = $this->Produk_model; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($produk->rules()); //menerapkan rules validasi pada produk_model
        //kondisi jika semua kolom telah divalidasi, maka akan menjalankan method save pada produk_model
        if ($validation->run()) {
            $produk->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Produk berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("produk");
        }
        $data["title"] = "Tambah Data Produk";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('produk/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit($no = null)
    {
        if (!isset($no)) redirect('produk');

        $produk = $this->Produk_model;
        $validation = $this->form_validation;
        $validation->set_rules($produk->rules());

        if ($validation->run()) {
            $produk->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Produk berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("produk");
        }
        $data["title"] = "Edit Data Produk";
        $data["data_produk"] = $produk->getById($no);
        if (!$data["data_produk"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('produk/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $no = $this->input->get('no');
        if (!isset($no)) show_404();
        $this->Produk_model->delete($no);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Produk berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}