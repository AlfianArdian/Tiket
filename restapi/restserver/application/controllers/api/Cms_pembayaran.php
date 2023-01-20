<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Cms_pembayaran extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_cms_pembayaran', 'cms_pembayaran');
        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
    }
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $cms_pembayaran = $this->cms_pembayaran->getCms_pembayaran();
        } else {
            $cms_pembayaran = $this->cms_pembayaran->getCms_pembayaran($id);
        }

        if ($cms_pembayaran) {
            $this->response([
                'status' => true,
                'data' => $cms_pembayaran
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
            if ($this->cms_pembayaran->deleteCms_pembayaran($id) > 0) {
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
            'nama_bank' => $this->post('nama_bank'),
            'no_rekening' => $this->post('no_rekening'),
            'atas_nama' => $this->post('atas_nama'),
            'img_bank' => $this->post('img_bank')

        ];

        if ($this->cms_pembayaran->createCms_pembayaran($data) > 0) {
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
            'nama_bank' => $this->post('nama_bank'),
            'no_rekening' => $this->post('no_rekening'),
            'atas_nama' => $this->post('atas_nama'),
            'img_bank' => $this->post('img_bank')
        ];

        if ($this->cms_pembayaran->updateCms_pembayaran($data, $id) > 0) {
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
