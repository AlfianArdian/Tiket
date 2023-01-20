<?php
class Tb_pesawat extends CI_Model
{
    public function getPesawat($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_pesawat')->result_array();
        } else {
            return $this->db->get_where('tb_pesawat', ['id' => $id])->result_array();
        }
    }

    public function deletePesawat($id)
    {
        $this->db->delete('tb_pesawat', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createPesawat($data)
    {
        $this->db->insert('tb_pesawat', $data);
        return $this->db->affected_rows();
    }

    public function updatePesawat($data, $id)
    {
        $this->db->update('tb_pesawat', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
