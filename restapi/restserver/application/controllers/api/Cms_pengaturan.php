<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Cms_pengaturan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_cms_pengaturan', 'cms_pengaturan');
        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
    }
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $cms_pengaturan = $this->cms_pengaturan->getCms_pengaturan();
        } else {
            $cms_pengaturan = $this->cms_pengaturan->getCms_pengaturan($id);
        }

        if ($cms_pengaturan) {
            $this->response([
                'status' => true,
                'data' => $cms_pengaturan
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
            if ($this->cms_pengaturan->deleteCms_pengaturan($id) > 0) {
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
            'id_users_pengaturan' => $this->post('id_users_pengaturan'),
            'nama_admin' => $this->post('nama_admin'),

        ];

        if ($this->cms_pengaturan->createCms_pengaturan($data) > 0) {
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
            'id_users_pengaturan' => $this->post('id_users_pengaturan'),
            'nama_admin' => $this->post('nama_admin'),

        ];

        if ($this->cms_pengaturan->updateCms_pengaturan($data, $id) > 0) {
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
