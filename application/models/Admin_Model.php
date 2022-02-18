<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
    public function update_password($admin_id)
    {
        $data = [
            "password" => htmlspecialchars(password_hash($this->input->post('password1'), PASSWORD_DEFAULT))
        ];

        $this->db->where('id_admin', $admin_id);
        $this->db->update('admin', $data);
    }

    public function hitung_produk()
    {
        return $this->db->get('produk')->num_rows();
    }

    public function hitung_pelanggan()
    {
        return $this->db->get('pelanggan')->num_rows();
    }

    public function hitung_pesanan()
    {
        return $this->db->get('pesanan')->num_rows();
    }
}
