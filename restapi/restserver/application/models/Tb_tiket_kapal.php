<?php
class Tb_tiket_kapal extends CI_Model
{
    public function getTiket_kapal($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_tiket_kapal')->result_array();
        } else {
            return $this->db->get_where('tb_tiket_kapal', ['id' => $id])->result_array();
        }
    }

    public function deleteTiket_kapal($id)
    {
        $this->db->delete('tb_tiket_kapal', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createTiket_kapal($data)
    {
        $this->db->insert('tb_tiket_kapal', $data);
        return $this->db->affected_rows();
    }

    public function updateTiket_kapal($data, $id)
    {
        $this->db->update('tb_tiket_kapal', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
