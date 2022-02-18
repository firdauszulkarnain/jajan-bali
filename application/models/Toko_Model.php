<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Toko_Model extends CI_Model
{
    // HOME PRODUK Limit 8
    public function produk_home()
    {
        return $this->db->get('produk', 8)->result_array();
    }

    public function ambil_catering()
    {
        $this->db->join('kategori k', 'k.id_kategori = p.kategori_id');
        $this->db->where('k.nama_kategori', 'Catering');
        return $this->db->get('produk p')->result_array();
    }

    public function hitung_produk()
    {
        $this->db->join('kategori k', 'k.id_kategori = p.kategori_id');
        $this->db->where('k.nama_kategori !=', 'Catering');
        if ($this->session->userdata('kategori')) {
            if ($this->session->userdata('kategori') != 'all') {
                $this->db->where('kategori_id', $this->session->userdata('kategori'));
            }
        }
        return $this->db->get('produk p')->num_rows();
    }

    public function hitung_search($like)
    {
        $this->db->join('kategori k', 'k.id_kategori = p.kategori_id');
        $this->db->where('k.nama_kategori !=', 'Catering');
        if ($this->session->userdata('kategori')) {
            if ($this->session->userdata('kategori') != 'all') {
                $this->db->where('kategori_id', $this->session->userdata('kategori'));
            }
        }
        $this->db->like('nama_produk', $like);
        return $this->db->get('produk p')->num_rows();
    }

    // SHOP PRODUK
    public function ambil_produk($limit, $start)
    {
        if (!$start) {
            $start = 0;
        }

        $this->db->join('kategori k', 'k.id_kategori = p.kategori_id');
        $this->db->where('k.nama_kategori !=', 'Catering');
        if ($this->session->userdata('kategori')) {
            if ($this->session->userdata('kategori') != 'all') {
                $this->db->where('kategori_id', $this->session->userdata('kategori'));
            } else {
                $this->db->order_by('id_produk', 'asc');
            }
        }
        return $this->db->get('produk p', $limit, $start)->result_array();
    }

    // SHOP PRODUK
    public function ambil_search($limit, $start, $like)
    {
        if (!$start) {
            $start = 0;
        }

        $this->db->join('kategori k', 'k.id_kategori = p.kategori_id');
        $this->db->where('k.nama_kategori !=', 'Catering');
        if ($this->session->userdata('kategori')) {
            if ($this->session->userdata('kategori') != 'all') {
                $this->db->where('kategori_id', $this->session->userdata('kategori'));
            } else {
                $this->db->order_by('id_produk', 'asc');
            }
        }
        $this->db->like('nama_produk', $like);
        return $this->db->get('produk p', $limit, $start)->result_array();
    }

    public function detail_produk($id_produk)
    {
        $this->db->join('kategori k', 'k.id_kategori = p.kategori_id', 'left');
        $this->db->where('p.id_produk', $id_produk);
        return $this->db->get('produk p')->row_array();
    }

    public function ambil_relatedProduk($id_produk)
    {
        $this->db->where('id_produk !=', $id_produk);
        $this->db->order_by('id_produk', 'desc');
        return $this->db->get('produk', 4)->result_array();
    }

    // Counter Nomor Pesanan
    public function nomor_pesanan()
    {
        $query = "SELECT MAX(MID(no_pesanan,9,4)) AS nomor FROM pesanan WHERE MID(no_pesanan,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            $row = $result->row();
            $tmp = ((int)$row->nomor) + 1;
            $no = sprintf("%'.04d", $tmp);
        } else {
            $no = "0001";
        }

        $nomorPesanan = "JB" . date('ymd') . $no;
        return $nomorPesanan;
    }

    // Input Pesanan
    public function input_pesanan($noPesanan)
    {
        $ongkir = $this->input->post('harga_ongkir');
        $data = [
            "no_pesanan" => $noPesanan,
            "id_pelanggan" => $this->input->post('id_pelanggan'),
            "nama_penerima" => htmlspecialchars(trim($this->input->post('nama_penerima', true))),
            "telp_penerima" => htmlspecialchars(trim($this->input->post('notelp', true))),
            'kab_penerima' => $this->input->post('kabupaten'),
            'kec_penerima' => $this->input->post('kecamatan'),
            "alamat_penerima" => htmlspecialchars(trim($this->input->post('alamat', true))),
            "ongkir" => $ongkir,
            "subtotal" => $this->cart->total(),
            "total_beli" => $this->cart->total() + $ongkir,
            "status_pesanan" => 'Menunggu Pembayaran',
            "catatan" => htmlspecialchars(trim($this->input->post('catatan', true)))
        ];
        $this->db->insert('pesanan', $data);

        $this->db->order_by('id_pesanan', 'desc');
        $pesanan =  $this->db->get('pesanan', 1)->row_array();
        $id_pesanan = $pesanan['id_pesanan'];

        // Masukan Produk Beli Pelanggan
        foreach ($this->cart->contents() as $item) {

            $data = [
                'id_pesanan' => $id_pesanan,
                'id_produk' => $item['id'],
                'qty' => $item['qty'],
                'harga' => $item['price'],
                'subtotal' => $item['subtotal'],
            ];

            $this->db->insert('produk_beli', $data);
        }
        return true;
    }

    public function ambil_kabupaten()
    {

        $this->db->select('kab.id_kab, kab.nama_kab');
        $this->db->from('ongkir o');
        $this->db->join('kabupaten kab', 'kab.id_kab = o.id_kabupaten');
        $this->db->group_by("kab.id_kab");
        return $this->db->get()->result_array();

        // return $this->db->get('kabupaten')->result_array();
    }

    public function ambil_kecamatan($id_kabupaten)
    {
        $this->db->select('kec.id_kecamatan, kec.nama_kec');
        $this->db->from('ongkir o');
        $this->db->join('kecamatan kec', 'kec.id_kecamatan = o.id_kecamatan');
        $this->db->where('o.id_kabupaten', $id_kabupaten);
        $this->db->group_by("kec.id_kecamatan");
        return $this->db->get()->result_array();

        // return $this->db->get_where('kecamatan', ['id_kabupaten' => $id_kabupaten])->result_array();
    }

    public function ambil_pesanan($id_pelanggan)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->order_by('id_pesanan', 'desc');
        return $this->db->get('pesanan')->result_array();
    }

    public function cari_catering($noPesanan)
    {
        $pesanan = $this->db->get_where('pesanan', ['no_pesanan' => $noPesanan])->row_array();
        $idPesanan = $pesanan['id_pesanan'];

        $this->db->join('produk pd', 'pd.id_produk = pb.id_produk');
        $this->db->join('kategori kt', 'kt.id_kategori = pd.kategori_id');
        $this->db->where('pb.id_pesanan', $idPesanan);
        $this->db->where('kt.nama_kategori', 'Catering');
        return $this->db->get('produk_beli pb')->num_rows();
    }

    // Update Kuantitas Produk Keranjang
    public function update_keranjang()
    {
        $row = $this->input->post('rowid');
        $i = 1;
        foreach ($row as $item) {
            $data = [
                'rowid' => $item,
                'qty' => $this->input->post('qty' . $i),
            ];
            $this->cart->update($data);
            $i++;
        }
    }

    public function konfirmasi_pesanan($noPesanan)
    {
        return $this->db->get_where('pesanan', ['no_pesanan' => $noPesanan])->row_array();
    }

    public function produk_beli($noPesanan)
    {
        $pesanan = $this->db->get_where('pesanan', ['no_pesanan' => $noPesanan])->row_array();
        $idPesanan = $pesanan['id_pesanan'];

        $this->db->join('produk pd', 'pd.id_produk = pb.id_produk');
        $this->db->where('pb.id_pesanan', $idPesanan);
        return $this->db->get('produk_beli pb')->result_array();
    }

    public function kirim_bukti($foto)
    {
        $noPesanan = $this->input->post('no_pesanan');
        $pesanan = $this->db->get_where('pesanan', ['no_pesanan' => $noPesanan])->row_array();
        $id_pesanan = $pesanan['id_pesanan'];
        $total = $pesanan['total_beli'];
        $tgl_kirim = $this->input->post('tanggal_kirim');
        $inputTanggal = date("Y-m-d", strtotime($tgl_kirim));
        $update = [
            'status_pesanan' => 'Menunggu Konfirmasi',
            'tgl_kirim' =>   $inputTanggal,
            'tgl_pesanan' => date('Y-m-d')
        ];

        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->update('pesanan', $update);

        $data = [
            'id_pesanan' => $id_pesanan,
            'no_pesanan' => $noPesanan,
            'total_pesanan' => $total,
            'foto_bukti' => $foto
        ];

        $this->db->insert('pembayaran', $data);
    }

    public function detail_pesanan($noPesanan)
    {
        $this->db->join('pelanggan pg', 'pg.id_pelanggan = ps.id_pelanggan');
        $this->db->join('kabupaten kb', 'kb.id_kab = ps.kab_penerima');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = ps.kec_penerima');
        $this->db->where('ps.no_pesanan', $noPesanan);
        return  $this->db->get('pesanan ps')->row_array();
    }
}
