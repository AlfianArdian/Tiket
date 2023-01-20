<?php
class Tb_cms_pembayaran extends CI_Model
{
    public function getCms_pembayaran($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_cms_pembayaran')->result_array();
        } else {
            return $this->db->get_where('tb_cms_pembayaran', ['id' => $id])->result_array();
        }
    }

    public function deleteCms_pembayaran($id)
    {
        $this->db->delete('tb_cms_pembayaran', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createCms_pembayaran($data)
    {
        $this->db->insert('tb_cms_pembayaran', $data);
        return $this->db->affected_rows();
    }

    public function updateCms_pembayaran($data, $id)
    {
        $this->db->update('tb_cms_pembayaran', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
