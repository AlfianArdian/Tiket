<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Tiket_kapal extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_tiket_kapal', 'tiket_kapal');
        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
    }
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $tiket_kapal = $this->tiket_kapal->getTiket_kapal();
        } else {
            $tiket_kapal = $this->tiket_kapal->getTiket_kapal($id);
        }

        if ($tiket_kapal) {
            $this->response([
                'status' => true,
                'data' => $tiket_kapal
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
            if ($this->tiket_kapal->deleteTiket_kapal($id) > 0) {
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
            'id_kapal' => $this->post('id_kapal'),
            'id_user' => $this->post('id_user'),
            'tgl_keberangkatan' => $this->post('tgl_keberangkatan'),
            'jml_tiket' => $this->post('jml_tiket'),
            'harga_total' => $this->post('harga_total'),
            'tgl_pemesanan' => $this->post('tgl_pemesanan'),
            'kode_transaksi' => $this->post('kode_transaksi')

        ];

        if ($this->tiket_kapal->createTiket_kapal($data) > 0) {
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
            'id_kapal' => $this->post('id_kapal'),
            'id_user' => $this->post('id_user'),
            'tgl_keberangkatan' => $this->post('tgl_keberangkatan'),
            'jml_tiket' => $this->post('jml_tiket'),
            'harga_total' => $this->post('harga_total'),
            'tgl_pemesanan' => $this->post('tgl_pemesanan'),
            'kode_transaksi' => $this->post('kode_transaksi')
        ];

        if ($this->tiket_kapal->updatetiket_kapal($data, $id) > 0) {
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
