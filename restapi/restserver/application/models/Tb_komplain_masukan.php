<?php
class Tb_komplain_masukan extends CI_Model
{
    public function getKomplain_masukan($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_komplain_masukan')->result_array();
        } else {
            return $this->db->get_where('tb_komplain_masukan', ['id' => $id])->result_array();
        }
    }

    public function deleteKomplain_masukan($id)
    {
        $this->db->delete('tb_komplain_masukan', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createKomplain_masukan($data)
    {
        $this->db->insert('tb_komplain_masukan', $data);
        return $this->db->affected_rows();
    }

    public function updateKomplain_masukan($data, $id)
    {
        $this->db->update('tb_komplain_masukan', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
