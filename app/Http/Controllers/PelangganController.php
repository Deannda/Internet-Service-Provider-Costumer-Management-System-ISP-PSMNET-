<?php

namespace App\Http\Controllers;

use App\Data_layanan_pelanggan;
use Illuminate\Http\Request;
use App\Data_layanan;
use App\Data_kategori;
use App\Data_pop;
use App\Data_sektor;
use App\Data_tipe_pengguna;
use App\Data_pelanggan;
use App\SomeModel;
use App\Ost_user__cdata;
use App\Ost_user;
use App\Ost_user_email;
use App\Data_tipe_bw;


class PelangganController extends Controller
{
    //function untuk menampilkan form tambah data pelanggan all
    public function tambah_pelanggan_all()
    {

        $layanan = Data_layanan::all();
        $kategori = Data_kategori::all();
        $pop = Data_pop::all();
        $sektor = Data_sektor::all();
        $tipe = Data_tipe_pengguna::all();
        $tipebandwith = Data_tipe_bw::all();


        return view('pelanggan/tambah_pelanggan_all', ['datalayanan' => $layanan, 'kategori' => $kategori, 'pop' => $pop, 'sektor' => $sektor, 'tipe' => $tipe, 'datatipebw' => $tipebandwith]);
    }
    //function untuk menampilkan form tambah data pelanggan bayar
    public function tambah_pelanggan_bayar()
    {

        $layanan = Data_layanan::all();
        $kategori = Data_kategori::all();
        $pop = Data_pop::all();
        $sektor = Data_sektor::all();
        $tipe = Data_tipe_pengguna::all();


        return view('pelanggan/tambah_pelanggan_bayar', ['datalayanan' => $layanan, 'kategori' => $kategori, 'pop' => $pop, 'sektor' => $sektor, 'tipe' => $tipe,]);
    }

    //function untuk menampilkan form tambah data pelanggan free
    public function tambah_pelanggan_free()
    {

        $layanan = Data_layanan::all();
        $kategori = Data_kategori::all();
        $pop = Data_pop::all();
        $sektor = Data_sektor::all();
        $tipe = Data_tipe_pengguna::all();


        return view('pelanggan/tambah_pelanggan_free', ['datalayanan' => $layanan, 'kategori' => $kategori, 'pop' => $pop, 'sektor' => $sektor, 'tipe' => $tipe]);
    }

    public function view_all(){
        $layanan = Data_layanan::all();
        $kategori = Data_kategori::all();
        $pop = Data_pop::all();
        $sektor = Data_sektor::all();
        $tipe = Data_tipe_pengguna::all();

        $datapelanggan = Ost_user::with('datalayanan', 'kategoripelanggan', 'datasektor', 'tipepengguna')->get(); //select digunakan untuk memanggil data apa aja yang mau dipanggil
        // return $datapelanggan;
        return view('pelanggan/data_pelanggan_all', ['datalayanan' => $layanan, 'kategori' => $kategori, 'pop' => $pop, 'sektor' => $sektor, 'tipe' => $tipe, 'datapelanggan' => $datapelanggan,'request' => null]);

    }
    //function untuk menampilkan tabel pelanggan berbayar
    public function view_bayar()
    {

        $layanan = Data_layanan::all();
        $kategori = Data_kategori::all();
        $pop = Data_pop::all();
        $sektor = Data_sektor::all();
        $tipe = Data_tipe_pengguna::all();
        $listPelanggan = Data_pelanggan::with('datalayanan', 'kategoripelanggan', 'datapop', 'datasektor', 'tipepengguna')->get(); //select digunakan untuk memanggil data apa aja yang mau dipanggil
        $datapelanggan = [];

        foreach ($listPelanggan as $key => $value) {
            # code...
            $layananPelanggan = Ost_user__cdata::where('id_pelanggan', $value->id_pelanggan)->get();

            $statusPenagihan = [];

            foreach ($layananPelanggan as $key => $lp) {
                # code...
                array_push($statusPenagihan, $lp->status_penagihan_layanan);
            }

            // untuk yang free ubah "Berbayar" jadi "Free"
            if (in_array('Berbayar', $statusPenagihan)) {
                # code...
                array_push($datapelanggan, $value);
            }

        }


        return view('pelanggan/data_pelanggan_bayar', ['datalayanan' => $layanan, 'kategori' => $kategori, 'pop' => $pop, 'sektor' => $sektor, 'tipe' => $tipe, 'datapelanggan' => $datapelanggan, 'request' => null]);


    }

    //function untuk menampilkan tabel pelanggan free
    public function view_free()
    {

        $layanan = Data_layanan::all();
        $kategori = Data_kategori::all();
        $pop = Data_pop::all();
        $sektor = Data_sektor::all();
        $tipe = Data_tipe_pengguna::all();
        $listPelanggan = Data_pelanggan::with('datalayanan', 'kategoripelanggan', 'datapop', 'datasektor', 'tipepengguna')->get(); //select digunakan untuk memanggil data apa aja yang mau dipanggil
        $datapelanggan = [];

        foreach ($listPelanggan as $key => $value) {
            # code...
            $layananPelanggan = Ost_user__cdata::where('id_pelanggan', $value->id_pelanggan)->get();

            $statusPenagihan = [];

            foreach ($layananPelanggan as $key => $lp) {
                # code...
                array_push($statusPenagihan, $lp->status_penagihan_layanan);
            }

            // untuk yang free ubah "Berbayar" jadi "Free"
            if (in_array('Free', $statusPenagihan)) {
                # code...
                array_push($datapelanggan, $value);
            }

        }


        return view('pelanggan/data_pelanggan_free', ['datalayanan' => $layanan, 'kategori' => $kategori, 'pop' => $pop, 'sektor' => $sektor, 'tipe' => $tipe, 'datapelanggan' => $datapelanggan, 'request' => null]);


    }

    //function untuk create (insert ke db) data pelanggan all
    public function create_all(Request $request)
    {

        // untuk simpan file ke penyimpanan
        $request->file('foto_ktp')->store('foto_ktp');
        //untuk mengambil nama file
        $ktp = $request->file('foto_ktp')->hashName();

        // untuk simpan file ke penyimpanan
        $request->file('file_kontrak')->store('file_kontrak');
        //untuk mengambil nama file
        $kontrak = $request->file('file_kontrak')->hashName();


        // untuk mengambil nilai id_pelanggan terakhir
        $pelanggan = Data_pelanggan::max('id_pelanggan');

        // menampung id pelanggan terakhir
        $lastno = $pelanggan;

        // format id
        $format = '126223';

        if (!is_null($lastno)) {

            $no = explode($format, $lastno);

            $nonow = $no[1] + 1;


        } else {

            $nonow = 1;
        }

        // memisahkan format dengan 3 angka belakang
        

        // menambahkan 1 angka 3 belakang dari idpelanggan


        // menggabungkan format dengan no pelanggan baru
        // $noBaru = $format . sprintf("%03s", $nonow);

        if ((count($request['layanan']) == 1) && ($request['layanan'][0] != null)) {
            for ($i = 0; $i < count($request['layanan']); $i++) {
                $user_id = Ost_user__cdata::max('user_id');

                $ost_email = Ost_user_email::create([
                    'user_id' => $user_id + 1,
                    'address' => $request['email']
                ]);


                Ost_user::create([
                    'org_id' => 0,
                    'default_email_id' => $ost_email->id,
                    'name' => $request['nama_pelanggan'],
                    'id_pelanggan' => $request['id_pelanggan'],
            // 'id_pelanggan' => $noBaru,
                    'kategori_pelanggan' => $request['kategori'],
                    'nama_sektor' => $request['sektor'],
                    'tipe_pengguna' => $request['tipe'],
                    'nama_pelanggan' => $request['nama_pelanggan'],
                    'nik' => $request['nik_pelanggan'],
                    'alamat_ktp' => $request['alamat_ktp'],
                    'alamat_instansi' => $request['alamat_instansi'],
                    'alamat_penagihan' => $request['alamat_penagihan'],
                    'no_hp' => $request['no_hp'],
                    'status_pelanggan' => 'Aktif',
                    'foto_ktp' => $ktp,
                ]);


                Ost_user__cdata::create([
                    'user_id' => $user_id + 1,
                    'id_pelanggan' => $request['id_pelanggan'],
                // 'id_pelanggan' => $noBaru,
                    'id_tipe_bw' => $request['id_tipe_bw'],
                    'id_layanan' => $request['layanan'][$i],
                    'catatan_layanan' => $request['catatan_layanan'],
                    'status_layanan_pelanggan' => 'Aktif',
                    'lokasi_layanan' => $request['alamat'][$i],
                    'status_penagihan_layanan' => $request['status_penagihan'][$i],
                    'tanggal_aktivasi_layanan' => date('Y-m-d', strtotime($request['tanggal_aktivasi_layanan'][$i])),
                    'notes' => $request['notes'][$i],
                    'datek_ip_address' => $request['datek_ip_address'][$i],
                    'file_kontrak' => $kontrak,
                    'hak_khusus' => 'hak_khusus',
                    'penawaran_layanan' => $request['penawaran_layanan']

                    // 'datek_layanan' => $request['datek_layanan'][$i],
                    // 'datek_cpe' => $request['datek_cpe'][$i],
                    // 'datek_router' => $request['datek_router'][$i],
                    // 'datek_switch' => $request['datek_switch'][$i],
                    // 'datek_indoor_ap' => $request['datek_indoor_ap'][$i],
                    // 'datek_server' => $request['datek_server'][$i],
                    // 'datek_kabel' => $request['datek_kabel'][$i],
                    // 'datek_besi' => $request['datek_besi'][$i],
                    // 'datek_poe' => $request['datek_poe'][$i],
                    // 'datek_adaptor' => $request['datek_adaptor'][$i],
                    // 'datek_ssid_pop' => $request['datek_ssid_pop'][$i],
                    // 'datek_gps_pos' => $request['datek_gps_pos'][$i],
                    // 'datek_antenna' => $request['datek_antena'][$i],
                    // 'phone' => $request['no_hp']
                ]);
            }
        }
        // Data_pelanggan::create([
        //     'id_pelanggan' => $request['id_pelanggan'],
        //     // 'id_pelanggan' => $noBaru,
        //     'kategori_pelanggan' => $request['kategori'],
        //     'nama_sektor' => $request['sektor'],
        //     'tipe_pengguna' => $request['tipe'],
        //     'nama_pelanggan' => $request['nama_pelanggan'],
        //     'nik' => $request['nik_pelanggan'],
        //     'alamat_ktp' => $request['alamat_ktp'],
        //     'alamat_instansi' => $request['alamat_instansi'],
        //     'alamat_penagihan' => $request['alamat_penagihan'],
        //     'no_hp' => $request['no_hp'],
        //     'email' => $request['email'],
        //     'status_pelanggan' => 'Aktif',
        //     'foto_ktp' => $ktp,

        // ]);


        return redirect('pelanggan_all');
    }

    //function untuk create (insert ke db) data pelanggan berbayar
    public function create(Request $request)
    {

        // untuk simpan file ke penyimpanan
        $request->file('foto_ktp')->store('foto_ktp');
        //untuk mengambil nama file
        $ktp = $request->file('foto_ktp')->hashName();

        // untuk mengambil nilai id_pelanggan terakhir
        $pelanggan = Data_pelanggan::max('id_pelanggan');

        // menampung id pelanggan terakhir
        $lastno = $pelanggan;

        // format id
        $format = '126223';

        if (!is_null($lastno)) {

            $no = explode($format, $lastno);

            $nonow = $no[1] + 1;


        } else {

            $nonow = 1;
        }
        // menambahkan 1 angka 3 belakang dari idpelanggan
        // $nonow = $no[1] + 1;

        // menggabungkan format dengan no pelanggan baru
        // $noBaru = $format . sprintf("%03s", $nonow);


        for ($i = 0; $i < count($request['layanan']); $i++) {
            $user_id = Ost_user__cdata::max('user_id');

            $ost_email = Ost_user_email::create([
                'user_id' => $user_id + 1,
                'address' => $request['email']
            ]);


            Ost_user::create([
                'org_id' => 0,
                'default_email_id' => $ost_email->id,
                'name' => $request['nama_pelanggan']
            ]);


            Ost_user__cdata::create([
                'user_id' => $user_id + 1,
                'id_pelanggan' => $request['id_pelanggan'],
                // 'id_pelanggan' => $noBaru,
                'id_layanan' => $request['layanan'][$i],
                'status_layanan_pelanggan' => 'Aktif',
                'status_penagihan_layanan' => 'Berbayar',
                'lokasi_layanan' => $request['alamat'][$i],
                'tanggal_aktivasi_layanan' => date('Y-m-d', strtotime($request['tanggal_aktivasi_layanan'][$i])),
                'notes' => $request['notes'][$i],
                'datek_ip_address' => $request['datek_ip_address'][$i],
                // 'datek_layanan' => $request['datek_layanan'][$i],
                // 'datek_cpe' => $request['datek_cpe'][$i],
                // 'datek_router' => $request['datek_router'][$i],
                // 'datek_switch' => $request['datek_switch'][$i],
                // 'datek_indoor_ap' => $request['datek_indoor_ap'][$i],
                // 'datek_server' => $request['datek_server'][$i],
                // 'datek_kabel' => $request['datek_kabel'][$i],
                // 'datek_besi' => $request['datek_besi'][$i],
                // 'datek_poe' => $request['datek_poe'][$i],
                // 'datek_adaptor' => $request['datek_adaptor'][$i],
                // 'datek_ssid_pop' => $request['datek_ssid_pop'][$i],
                // 'datek_gps_pos' => $request['datek_gps_pos'][$i],
                // 'datek_antenna' => $request['datek_antena'][$i],
                // 'phone' => $request['no_hp']
            ]);
        }

        Data_pelanggan::create([
            'id_pelanggan' => $request['id_pelanggan'],
            // 'id_pelanggan' => $noBaru,
            'kategori_pelanggan' => $request['kategori'],
            'nama_sektor' => $request['sektor'],
            'tipe_pengguna' => $request['tipe'],
            'nama_pelanggan' => $request['nama_pelanggan'],
            'nik' => $request['nik_pelanggan'],
            'alamat_ktp' => $request['alamat_ktp'],
            'alamat_instansi' => $request['alamat_instansi'],
            'alamat_penagihan' => $request['alamat_penagihan'],
            'no_hp' => $request['no_hp'],
            'email' => $request['email'],
            'status_pelanggan' => 'Aktif',
            'foto_ktp' => $ktp
        ]);


        return redirect('pelanggan_berbayar');
    }

    //function untuk create (insert ke db) data pelanggan free
    public function create_free(Request $request)
    {

        // untuk simpan file ke penyimpanan
        $request->file('foto_ktp')->store('foto_ktp');
        //untuk mengambil nama file
        $ktp = $request->file('foto_ktp')->hashName();

        // untuk mengambil nilai id_pelanggan terakhir
        $pelanggan = Data_pelanggan::max('id_pelanggan');

        // menampung id pelanggan terakhir
        $lastno = $pelanggan;

        $format = '126223';

        if (!is_null($lastno)) {

            $no = explode($format, $lastno);

            $nonow = $no[1] + 1;


        } else {

            $nonow = 1;
        }

        // menambahkan 1 angka 3 belakang dari idpelanggan
        // $nonow = $no[1] + 1;

        // menggabungkan format dengan no pelanggan baru
        // $noBaru = $format . sprintf("%03s", $nonow);


        for ($i = 0; $i < count($request['layanan']); $i++) {
            $user_id = Ost_user__cdata::max('user_id');

            $ost_email = Ost_user_email::create([
                'user_id' => $user_id + 1,
                'address' => $request['email']
            ]);


            Ost_user::create([
                'org_id' => 0,
                'default_email_id' => $ost_email->id,
                'name' => $request['nama_pelanggan']
            ]);


            Ost_user__cdata::create([
                'user_id' => $user_id + 1,
                'id_pelanggan' => $request['id_pelanggan'],
                // 'id_pelanggan' => $noBaru,
                'id_layanan' => $request['layanan'][$i],
                'status_layanan_pelanggan' => 'Aktif',
                'status_penagihan_layanan' => 'Free',
                'alamat' => $request['lokasi_layanan'][$i],
                'tanggal_aktivasi_layanan' => date('Y-m-d', strtotime($request['tanggal_aktivasi_layanan'][$i])),
                'notes' => $request['notes'][$i],
                'datek_ip_address' => $request['datek_ip_address'][$i],
                // 'datek_layanan' => $request['datek_layanan'][$i],
                // 'datek_cpe' => $request['datek_cpe'][$i],
                // 'datek_router' => $request['datek_router'][$i],
                // 'datek_switch' => $request['datek_switch'][$i],
                // 'datek_indoor_ap' => $request['datek_indoor_ap'][$i],
                // 'datek_server' => $request['datek_server'][$i],
                // 'datek_kabel' => $request['datek_kabel'][$i],
                // 'datek_besi' => $request['datek_besi'][$i],
                // 'datek_poe' => $request['datek_poe'][$i],
                // 'datek_adaptor' => $request['datek_adaptor'][$i],
                // 'datek_ssid_pop' => $request['datek_ssid_pop'][$i],
                // 'datek_gps_pos' => $request['datek_gps_pos'][$i],
                // 'datek_antenna' => $request['datek_antena'][$i],
                // 'phone' => $request['no_hp']
            ]);
        }

        Data_pelanggan::create([
            'id_pelanggan' => $request['id_pelanggan'],
            // 'id_pelanggan' => $noBaru,
            'kategori_pelanggan' => $request['kategori'],
            'nama_sektor' => $request['sektor'],
            'tipe_pengguna' => $request['tipe'],
            'nama_pelanggan' => $request['nama_pelanggan'],
            'nik' => $request['nik_pelanggan'],
            'alamat_ktp' => $request['alamat_ktp'],
            'alamat_instansi' => $request['alamat_instansi'],
            'alamat_penagihan' => $request['alamat_penagihan'],
            'no_hp' => $request['no_hp'],
            'email' => $request['email'],
            'status_pelanggan' => 'Aktif',
            'foto_ktp' => $ktp
        ]);


        return redirect('pelanggan_free');
    }

    //function untuk edit data pelanggan berbayar
    public function edit(Request $request, $id)
    {

        $pelanggan = Data_pelanggan::where('id_pelanggan', '=', $id);

        if ($request->file('foto_ktp')) {
            # code...
            $request->file('foto_ktp')->store('foto_ktp');
            $ktp = $request->file('foto_ktp')->hashName();

            $pelanggan->update([
                'kategori_pelanggan' => $request['kategori'],
                'nama_sektor' => $request['sektor'],
                'tipe_pengguna' => $request['tipe'],
                'nama_pelanggan' => $request['nama_pelanggan'],
                'nik' => $request['nik_pelanggan'],
                'alamat_ktp' => $request['alamat_ktp'],
                'alamat_instansi' => $request['alamat_instansi'],
                'alamat_penagihan' => $request['alamat_penagihan'],
                'no_hp' => $request['no_hp'],
                'email' => $request['email'],
                'status_pelanggan' => $request['status_pelanggan'],
                'foto_ktp' => $ktp
            ]);

            return redirect('pelanggan_berbayar');
        }

        $pelanggan->update([
            'kategori_pelanggan' => $request['kategori'],
            'nama_sektor' => $request['sektor'],
            'tipe_pengguna' => $request['tipe'],
            'nama_pelanggan' => $request['nama_pelanggan'],
            'nik' => $request['nik_pelanggan'],
            'alamat_ktp' => $request['alamat_ktp'],
            'alamat_instansi' => $request['alamat_instansi'],
            'alamat_penagihan' => $request['alamat_penagihan'],
            'no_hp' => $request['no_hp'],
            'email' => $request['email'],
            'status_pelanggan' => $request['status_pelanggan'],
            'foto_ktp' => $request['foto_ktp']
        ]);

        return redirect('pelanggan_all');

    }

    //function untuk edit data pelanggan free
    public function edit_free(Request $request, $id)
    {
        $pelanggan = Data_pelanggan::where('id_pelanggan', '=', $id);

        if ($request->file('foto_ktp')) {
            # code...
            $request->file('foto_ktp')->store('foto_ktp');
            $ktp = $request->file('foto_ktp')->hashName();

            $pelanggan->update([
                'layanan' => $request['layanan'],
                'kategori_pelanggan' => $request['kategori'],
                'pop' => $request['pop'],
                'nama_sektor' => $request['sektor'],
                'tipe_pengguna' => $request['tipe'],
                'nama_pelanggan' => $request['nama_pelanggan'],
                'nik' => $request['nik_pelanggan'],
                'alamat_ktp' => $request['alamat_ktp'],
                'alamat_instansi' => $request['alamat_instansi'],
                'alamat_penagihan' => $request['alamat_penagihan'],
                'no_hp' => $request['no_hp'],
                'email' => $request['email'],
                'status_pelanggan' => $request['status_pelanggan'],
                'status_layanan' => $request['status_layanan'],
                'foto_ktp' => $ktp
            ]);

            return redirect('pelanggan_free');
        }

        $pelanggan->update([
            'layanan' => $request['layanan'],
            'kategori_pelanggan' => $request['kategori'],
            'pop' => $request['pop'],
            'nama_sektor' => $request['sektor'],
            'tipe_pengguna' => $request['tipe'],
            'nama_pelanggan' => $request['nama_pelanggan'],
            'nik' => $request['nik_pelanggan'],
            'alamat_ktp' => $request['alamat_ktp'],
            'alamat_instansi' => $request['alamat_instansi'],
            'alamat_penagihan' => $request['alamat_penagihan'],
            'no_hp' => $request['no_hp'],
            'email' => $request['email'],
            'status_pelanggan' => $request['status_pelanggan'],
            'status_layanan' => $request['status_layanan'],
            'foto_ktp' => $request['foto_ktp']
        ]);

        return redirect('pelanggan_free');
    }

    //function untuk delete data pelanggan
    public function delete($id,$status)
    {

        $pelanggan = Data_pelanggan::where('id_pelanggan', '=', $id);
        $pelanggan->delete();

        if ($status == 'berbayar'){
            return redirect('pelanggan_berbayar');
        } elseif ($status == 'free'){
            return redirect('pelanggan_free');
        } else {
            return redirect('pelanggan_all');
        }

    }

    // fungsi store untuk mengolah data yang dikirim dari
    public function store()
    {
        return "store";
    }

    public function riwayat_tagihan(){

      return view ('penagihan/riwayat_penagihan');
  }

    //function klasifikasi data pelanggan
  public function klasifikasi(Request $request)
  {
        // return $request;
    $layanan = Data_layanan::all();
    $kategori = Data_kategori::all();
    $pop = Data_pop::all();
    $sektor = Data_sektor::all();
    $tipe = Data_tipe_pengguna::all();

        //coding melakukan klasifikasi
    $kondisi = [];

    if (!is_null($request['kategori'])) {
        array_push($kondisi, ['kategori_pelanggan', $request['kategori']]);
    }

    if (!is_null($request['tipe'])) {
        array_push($kondisi, ['tipe_pengguna', $request['tipe']]);
    }

    if (!is_null($request['sektor'])) {
        array_push($kondisi, ['nama_sektor', $request['sektor']]);
    }

    if (!is_null($request['statusPelanggan'])) {
        array_push($kondisi, ['status_pelanggan', $request['statusPelanggan']]);
    }

    $datapelanggan = Ost_user::where($kondisi)->with('datalayanan', 'kategoripelanggan', 'datasektor', 'tipepengguna')->get();



    $pelanggan = [];
    foreach ($datapelanggan as $data) {
        $layananPelanggan = Ost_user__cdata::where('id_pelanggan', $data->id_pelanggan)->get();

        $statusLayanan = [];

        foreach ($layananPelanggan as $key => $lp) {
                    # code...
            if (!is_null($request['status_tagihan'])) {

                if ($lp->status_penagihan_layanan == $request['status_tagihan']) {
                        # code...
                    if (!is_null($request['layanan'])) {
                        array_push($statusLayanan, $lp->id_layanan);
                    }else {
                        array_push($pelanggan, $data);
                    }
                }
            } else {
               if (!is_null($request['layanan'])) {
                array_push($statusLayanan, $lp->id_layanan);
            }else {
                array_push($pelanggan, $data);
            }
        }
    }
    if (!is_null($request['layanan'])) {
                    # code...
        if (in_array($request['layanan'], $statusLayanan)) {
            array_push($pelanggan, $data);
        }

    }
}

return view('pelanggan/data_pelanggan_all', ['datalayanan' => $layanan, 'kategori' => $kategori, 'pop' => $pop, 'sektor' => $sektor, 'tipe' => $tipe, 'datapelanggan' => $pelanggan, 'request' => $request]);



}
}

