<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Komplain_masukan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_komplain_masukan', 'komplain_masukan');
        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
    }
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $komplain_masukan = $this->komplain_masukan->getkomplain_masukan();
        } else {
            $komplain_masukan = $this->komplain_masukan->getkomplain_masukan($id);
        }

        if ($komplain_masukan) {
            $this->response([
                'status' => true,
                'data' => $komplain_masukan
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'ID kosong'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->komplain_masukan->deletekomplain_masukan($id) > 0) {
                $this->response([
                    'status' => true,
                    'nim' => $id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'ID Kosong'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'id' => $this->post('id'),
            'jenis' => $this->post('jenis'),
            'nama_lengkap' => $this->post('nama_lengkap'),
            'email' => $this->post('email'),
            'no_telepon' => $this->post('no_telepon'),
            'pesan' => $this->post('pesan')

        ];

        if ($this->komplain_masukan->createkomplain_masukan($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data berhasil ditambahkan'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data gagal ditambahkan'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');

        $data = [
            'id' => $this->post('id'),
            'jenis' => $this->post('jenis'),
            'nama_lengkap' => $this->post('nama_lengkap'),
            'email' => $this->post('email'),
            'no_telepon' => $this->post('no_telepon'),
            'pesan' => $this->post('pesan')
        ];

        if ($this->komplain_masukan->updatekomplain_masukan($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data berhasil diupdate'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data gagal diupdate'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
