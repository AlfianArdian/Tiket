<?php
class Tb_tiket_pesawat extends CI_Model
{
    public function getTiket_pesawat($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_tiket_pesawat')->result_array();
        } else {
            return $this->db->get_where('tb_tiket_pesawat', ['id' => $id])->result_array();
        }
    }

    public function deleteTiket_pesawat($id)
    {
        $this->db->delete('tb_tiket_pesawat', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createTiket_pesawat($data)
    {
        $this->db->insert('tb_tiket_pesawat', $data);
        return $this->db->affected_rows();
    }

    public function updateTiket_pesawat($data, $id)
    {
        $this->db->update('tb_tiket_pesawat', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
