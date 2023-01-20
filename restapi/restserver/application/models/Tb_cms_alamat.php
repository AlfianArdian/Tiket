<?php
class Tb_cms_alamat extends CI_Model
{
    public function getCms_alamat($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_cms_alamat')->result_array();
        } else {
            return $this->db->get_where('tb_cms_alamat', ['id' => $id])->result_array();
        }
    }

    public function deleteCms_alamat($id)
    {
        $this->db->delete('tb_cms_alamat', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createCms_alamat($data)
    {
        $this->db->insert('tb_cms_alamat', $data);
        return $this->db->affected_rows();
    }

    public function updateCms_alamat($data, $id)
    {
        $this->db->update('tb_cms_alamat', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
