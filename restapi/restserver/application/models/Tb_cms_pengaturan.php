<?php
class Tb_cms_pengaturan extends CI_Model
{
    public function getCms_pengaturan($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_cms_pengaturan')->result_array();
        } else {
            return $this->db->get_where('tb_cms_pengaturan', ['id' => $id])->result_array();
        }
    }

    public function deleteCms_pengaturan($id)
    {
        $this->db->delete('tb_cms_pengaturan', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createCms_pengaturan($data)
    {
        $this->db->insert('tb_cms_pengaturan', $data);
        return $this->db->affected_rows();
    }

    public function updateCms_pengaturan($data, $id)
    {
        $this->db->update('tb_cms_pengaturan', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
