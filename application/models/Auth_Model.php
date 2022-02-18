<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Model extends CI_Model
{
    public function register()
    {
        $data = [
            "nama_lengkap" => htmlspecialchars(trim($this->input->post('nama', true))),
            "email" => htmlspecialchars(trim($this->input->post('email', true))),
            "password" => htmlspecialchars(password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)),
            "id_kabupaten" => htmlspecialchars(trim($this->input->post('kabupaten', true))),
            "id_kecamatan" => htmlspecialchars(trim($this->input->post('kecamatan', true))),
            "alamat" => htmlspecialchars(trim($this->input->post('alamat', true))),
            "nomor_telepon" => htmlspecialchars($this->input->post('notelp', true))
        ];
        $this->db->insert('pelanggan', $data);
    }

    public function ambil_kabupaten()
    {
        return $this->db->get('kabupaten')->result_array();
    }

    public function ambil_kecamatan($id_kabupaten)
    {
        return $this->db->get_where('kecamatan', ['id_kabupaten' => $id_kabupaten])->result_array();
    }
}
