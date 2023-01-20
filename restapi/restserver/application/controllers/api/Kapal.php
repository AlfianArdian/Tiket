<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Kapal extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_kapal', 'kapal');
        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
    }
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $kapal = $this->kapal->getKapal();
        } else {
            $kapal = $this->kapal->getKapal($id);
        }

        if ($kapal) {
            $this->response([
                'status' => true,
                'data' => $kapal
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
            if ($this->kapal->deleteKapal($id) > 0) {
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
            'nama_kapal' => $this->post('nama_kapal'),
            'kode_kapal' => $this->post('kode_kapal'),
            'pelabuhan_asal' => $this->post('pelabuhan_tujuan'),
            'pelabuhan_tujuan' => $this->post('pelabuhan_tujuan'),
            'jam_keberangkatan' => $this->post('jam_keberangkatan'),
            'jam_tiba' => $this->post('jam_tiba'),
            'harga' => $this->post('harga'),
            'tersedia' => $this->post('tersedia'),
            'stok' => $this->post('stok')

        ];

        if ($this->kapal->createKapal($data) > 0) {
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
            'nama_pesawat' => $this->post('nama_pesawat'),
            'kode_pesawat' => $this->post('kode_pesawat'),
            'tujuan' => $this->post('tujuan'),
            'jam_keberangkatan' => $this->post('jam_keberangkatan'),
            'jam_tiba' => $this->post('jam_tiba'),
            'kelas_penerbangan' => $this->post('kelas_penerbangan'),
            'harga' => $this->post('harga'),
            'tersedia' => $this->post('tersedia')
        ];

        if ($this->kapal->updateKapal($data, $id) > 0) {
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
