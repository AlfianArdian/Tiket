<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Users extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_users', 'users');
        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
    }
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $users = $this->users->getUsers();
        } else {
            $users = $this->users->getUsers($id);
        }

        if ($users) {
            $this->response([
                'status' => true,
                'data' => $users
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
            if ($this->users->deleteUsers($id) > 0) {
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
            'email' => $this->post('email'),
            'username' => $this->post('username'),
            'nama_lengkap' => $this->post('tujuan'),
            'no_telp' => $this->post('no_telp'),
            'no_ktp' => $this->post('no_ktp'),
            'alamat' => $this->post('alamat'),
            'password' => $this->post('password'),
            'status' => $this->post('status'),
            'hak_akses' => $this->post('hak_akses')
        ];

        if ($this->kapal->createUsers($data) > 0) {
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
            'email' => $this->post('email'),
            'username' => $this->post('username'),
            'nama_lengkap' => $this->post('tujuan'),
            'no_telp' => $this->post('no_telp'),
            'no_ktp' => $this->post('no_ktp'),
            'alamat' => $this->post('alamat'),
            'password' => $this->post('password'),
            'status' => $this->post('status'),
            'hak_akses' => $this->post('hak_akses')
        ];

        if ($this->users->updateUsers($data, $id) > 0) {
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
