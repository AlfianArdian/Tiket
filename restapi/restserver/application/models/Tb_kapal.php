<?php
class Tb_kapal extends CI_Model
{
    public function getKapal($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_kapal')->result_array();
        } else {
            return $this->db->get_where('tb_kapal', ['id' => $id])->result_array();
        }
    }

    public function deleteKapal($id)
    {
        $this->db->delete('tb_kapal', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createKapal($data)
    {
        $this->db->insert('tb_kapal', $data);
        return $this->db->affected_rows();
    }

    public function updateKapal($data, $id)
    {
        $this->db->update('tb_kapal', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
