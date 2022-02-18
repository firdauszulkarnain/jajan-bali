<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Model extends CI_Model
{
    // -------------------Produk Start------------------\\
    public function ambil_produk()
    {
        $this->db->join('kategori k', 'k.id_kategori = p.kategori_id');
        return $this->db->get('produk p')->result_array();
    }

    public function detail_produk($id_produk)
    {
        $this->db->join('kategori k', 'k.id_kategori = p.kategori_id', 'left');
        $this->db->where('p.id_produk', $id_produk);
        return $this->db->get('produk p')->row_array();
    }

    public function tambah_produk($foto)
    {
        $data = [
            'kategori_id' => $this->input->post('kategori'),
            'nama_produk' => htmlspecialchars(trim($this->input->post('nama_produk'))),
            'harga_produk' => htmlspecialchars(trim(str_replace(".", "", $this->input->post('harga')))),
            'stock' => 0,
            'foto_produk' => $foto,
            'deskripsi' => $this->input->post('deskripsi')
        ];

        $this->db->insert('produk', $data);
    }

    public function tambah_stock()
    {
        $id_produk = $this->input->post('id_produk');
        $add_stock = $this->input->post('stock');

        // Ambil Stock Saat ini
        $data_produk['produk'] = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
        $stock_now = $data_produk['produk']['stock'];

        // Jumlahkan Stock Baru
        $jumlah_stock = $stock_now + $add_stock;
        $data = [
            'stock' => $jumlah_stock
        ];

        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk', $data);
    }

    public function hapus_produk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }
    // -------------------Produk END------------------\\

    // -------------------Pelanggan Start------------------\\
    public function ambil_pelanggan()
    {
        return $this->db->get('pelanggan')->result_array();
    }

    public function detail_pelanggan($idPelanggan)
    {
        $this->db->join('kabupaten kb', 'kb.id_kab = pg.id_kabupaten');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = pg.id_kecamatan');
        $this->db->where('pg.id_pelanggan', $idPelanggan);
        return $this->db->get('pelanggan pg')->row_array();
    }

    public function hapus_pelanggan()
    {
        $id_pelanggan = $this->input->post('id_pelanggan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->delete('pelanggan');
    }
    // ----------------Pelanggan Start------------------\\


    // -------------------Ongkir Start------------------\\
    public function ambil_ongkir()
    {
        $this->db->join('kabupaten kb', 'kb.id_kab = o.id_kabupaten');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = o.id_kecamatan');
        return $this->db->get('ongkir o')->result_array();
    }

    public function ambil_kabupaten()
    {
        // Variabel Untuk Menampung id Kabupaten Yang Kecamatannya Sudah Isi Semua
        $sudahIsi = [];
        // Ambil Semua Kabupaten
        $data =  $this->db->get('kabupaten')->result_array();

        foreach ($data as $item) {

            // Hitung Kecamatan dari yang sudah di Inputkan Ke Ongkir
            $ongkir = $this->db->get_where('ongkir', ['id_kabupaten' => $item['id_kab']])->num_rows();

            // Hitung Kecamatan yang ada di Kabupaten
            $kecamatan = $this->db->get_where('kecamatan', ['id_kabupaten' => $item['id_kab']])->num_rows();

            // Jika jumlah kecamatan kabupaten sama dengan jumlah yang diinputkan ke ongkir
            if ($kecamatan == $ongkir) {
                // maka kabupaten sudah isi semua, dan dihilangkan dari daftar tambah data ongkir
                $sudahIsi = ['id_kab !=' => $item['id_kab']];
            }
        }

        $this->db->where($sudahIsi);
        return $this->db->get('kabupaten')->result_array();
    }

    public function ambil_kecamatan($id_kabupaten)
    {
        return $this->db->get_where('kecamatan', ['id_kabupaten' => $id_kabupaten])->result_array();
    }

    public function cari_kecamatan($id_kabupaten)
    {
        // Cari Kecamatan Yang sudah ada di database ongkir
        $ada = $this->db->get_where('ongkir', ['id_kabupaten' => $id_kabupaten])->result_array();

        if ($ada) {
            // kalo ada, ambil semua kecamatannya
            $this->db->where('id_kabupaten', $id_kabupaten);
            foreach ($ada as $row) {
                // kalo udah ada di ongkir, berarti ilangin dari daftar tambah ongkri
                $this->db->where('id_kecamatan !=', $row['id_kecamatan']);
            }
            return $this->db->get('kecamatan')->result_array();
        } else {
            // kalo gak ada di ongkir, tampilin semua kecamatan dari kabupaten
            return $this->db->get_where('kecamatan', ['id_kabupaten' => $id_kabupaten])->result_array();
        }
    }

    public function tambah_ongkir()
    {
        $data = [
            'id_kabupaten' => $this->input->post('kabupaten'),
            'id_kecamatan' => $this->input->post('kecamatan'),
            'harga_ongkir' => htmlspecialchars(trim(str_replace(".", "", $this->input->post('harga_ongkir')))),
        ];

        $this->db->insert('ongkir', $data);
    }

    public function detail_ongkir($id_ongkir)
    {
        $this->db->join('kabupaten kb', 'kb.id_kab = o.id_kabupaten');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = o.id_kecamatan');
        $this->db->where('o.id_ongkir', $id_ongkir);
        return $this->db->get('ongkir o')->row_array();
    }

    public function update_ongkir()
    {
        $id_ongkir = $this->input->post('id_ongkir');
        $data = [
            'harga_ongkir' => htmlspecialchars(trim(str_replace(".", "", $this->input->post('harga_ongkir'))))
        ];

        $this->db->where('id_ongkir', $id_ongkir);
        $this->db->update('ongkir', $data);
    }

    public function hapus_ongkir()
    {
        $id_ongkir = $this->input->post('id_ongkir');
        $this->db->where('id_ongkir', $id_ongkir);
        $this->db->delete('ongkir');
    }
    // -------------------Ongkir END------------------\\


    // -------------------Kategori Start------------------\\
    public function ambil_kategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function tambah_kategori()
    {
        $data = [
            'nama_kategori' => htmlspecialchars(trim(ucwords($this->input->post('nama_kategori')))),
            'foto' => 'default.png'
        ];

        $this->db->insert('kategori', $data);
    }

    public function update_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $data = [
            'nama_kategori' => htmlspecialchars((ucwords($this->input->post('nama_kategori'))))
        ];

        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }

    public function hapus_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }
    // -------------------Kategori END------------------\\
}
