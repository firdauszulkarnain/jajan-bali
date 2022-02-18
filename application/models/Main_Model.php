<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_Model extends CI_Model
{
    // PESANAN START
    public function ambil_pesanan()
    {
        $this->db->join('pelanggan pg', 'pg.id_pelanggan = ps.id_pelanggan');
        $this->db->where('ps.status_pesanan !=', 'Pesanan Selesai');
        $this->db->order_by('id_pesanan', 'desc');
        return $this->db->get('pesanan ps')->result_array();
    }

    // Detail Pelanggan Yang Beli
    public function detail_pelanggan($noPesanan)
    {
        $this->db->join('pelanggan pg', 'pg.id_pelanggan = ps.id_pelanggan');
        $this->db->join('kabupaten kb', 'kb.id_kab = ps.kab_penerima');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = ps.kec_penerima');
        $this->db->where('ps.no_pesanan', $noPesanan);
        return $this->db->get('pesanan ps')->row_array();
    }

    // Detail Produk Yang Dibeli
    public function produk_beli($noPesanan)
    {
        $pesanan = $this->db->get_where('pesanan', ['no_pesanan' => $noPesanan])->row_array();
        $idPesanan = $pesanan['id_pesanan'];

        $this->db->join('produk pd', 'pd.id_produk = pb.id_produk');
        $this->db->where('pb.id_pesanan', $idPesanan);
        return $this->db->get('produk_beli pb')->result_array();
    }

    public function ambil_pembayaran()
    {
        $this->db->join('pesanan ps', 'ps.id_pesanan = pb.id_pesanan');
        $this->db->order_by('id_pembayaran', 'desc');
        return $this->db->get('pembayaran pb')->result_array();
    }

    public function update_status()
    {
        $no_pesanan = $this->input->post('no_pesanan');
        $foto =    $this->input->post('foto');
        $pesanan = [
            'status_pesanan' => 'Pesanan Di Proses'
        ];

        $this->db->where('no_pesanan', $no_pesanan);
        $this->db->update('pesanan', $pesanan);

        $no_pembayaran = $no_pesanan;
        // Hapus File Bukti
        unlink('./assets/img/bukti_pembayaran/' . $foto);
        $this->db->where('no_pesanan', $no_pembayaran);
        $this->db->delete('pembayaran');
    }

    public function ambil_pengiriman()
    {
        $status = array('Menunggu Pembayaran', 'Menunggu Konfirmasi', 'Pesanan Selesai');
        $this->db->where_not_in('status_pesanan', $status);
        $this->db->order_by('id_pesanan', 'desc');
        return $this->db->get('pesanan')->result_array();
    }

    public function update_pengiriman()
    {
        $no_pesanan = $this->input->post('no_pesanan');
        $pesanan = [
            'status_pesanan' => 'Pesanan Di Kirim'
        ];

        $this->db->where('no_pesanan', $no_pesanan);
        $this->db->update('pesanan', $pesanan);
    }

    public function selesai_pesanan()
    {
        $no_pesanan = $this->input->post('no_pesanan');
        $pesanan = [
            'status_pesanan' => 'Pesanan Selesai'
        ];

        $this->db->where('no_pesanan', $no_pesanan);
        $this->db->update('pesanan', $pesanan);

        $data = $this->db->get_where('pesanan', ['no_pesanan' => $no_pesanan])->row_array();
        $invoice = [
            'id_pesanan' => $data['id_pesanan'],
            'id_pelanggan' => $data['id_pelanggan'],
            'no_pesanan' => $data['no_pesanan'],
            'total_invoice' => $data['total_beli'],
            'tgl_pemesanan' => $data['tgl_pesanan'],
            'tgl_selesai' => date('Y-m-d')
        ];

        $this->db->insert('invoice', $invoice);
    }

    public function ambil_invoice()
    {
        $this->db->join('pesanan ps', 'ps.id_pesanan = iv.id_pesanan');
        $this->db->order_by('id_invoice', 'desc');
        return $this->db->get('invoice iv')->result_array();
    }

    public function detail_invoice($noPesanan)
    {
        $this->db->join('pesanan ps', 'ps.id_pesanan = iv.id_pesanan');
        $this->db->join('pelanggan pg', 'pg.id_pelanggan = ps.id_pelanggan');
        $this->db->join('kabupaten kb', 'kb.id_kab = ps.kab_penerima');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = ps.kec_penerima');
        $this->db->where('iv.no_pesanan', $noPesanan);
        return $this->db->get('invoice iv')->row_array();
    }
}
