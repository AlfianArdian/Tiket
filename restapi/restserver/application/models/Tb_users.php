<?php
class Tb_users extends CI_Model
{
    public function getUsers($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_users')->result_array();
        } else {
            return $this->db->get_where('tb_users', ['id' => $id])->result_array();
        }
    }

    public function deleteUsers($id)
    {
        $this->db->delete('tb_users', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createUsers($data)
    {
        $this->db->insert('tb_users', $data);
        return $this->db->affected_rows();
    }

    public function updateUsers($data, $id)
    {
        $this->db->update('tb_users', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
