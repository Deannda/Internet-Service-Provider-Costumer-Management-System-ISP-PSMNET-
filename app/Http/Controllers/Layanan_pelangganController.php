<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_layanan_pelanggan;
use App\Data_layanan;
use App\Data_pop;
use App\Data_tipe_bw;
use App\Data_pelanggan;
use App\Ost_user__cdata;
use App\Ost_user;
use App\Ost_user_email;
use App\logDB;
use Auth;



class Layanan_pelangganController extends Controller
{

 public function history_layanan($id)
 {

    $log = logDB::where('id_pelanggan', $id)->with('pelanggan')->get();

    return view('pelanggan/history_layanan_pelanggan', ['loglayanan' => $log]);
}


    //function untuk menampilkan tabel pelanggan all
public function layanan_pelanggan_all($id)
{

    $layanan = Data_layanan::all();
    $pop = Data_pop::all();
    $tipebandwith = Data_tipe_bw::all();
    $data = Ost_user__cdata::where('id_pelanggan', $id)->with('layanan','tipebw','datapelanggan', 'devout', 'devsewa')->get();
    return view('pelanggan/data_layanan_pelanggan_all', ['datalayananpelanggan' => $data, 'datalayanan' => $layanan, 'pop' => $pop, 'nopelanggan' => $id,'datatipebw' => $tipebandwith]);
}

    //function untuk menampilkan tabel pelanggan berbayar
public function layanan_pelanggan_berbayar($id)
{

    $layanan = Data_layanan::all();
    $pop = Data_pop::all();
    $data = Ost_user__cdata::where('id_pelanggan', $id)->where('status_penagihan_layanan', 'Berbayar')->with('layanan', 'datapelanggan', 'devout', 'devsewa')->get();
    return view('pelanggan/data_layanan_pelanggan_berbayar', ['datalayananpelanggan' => $data, 'datalayanan' => $layanan, 'pop' => $pop, 'nopelanggan' => $id]);
}

    //function untuk menampilkan tabel pelanggan free
public function layanan_pelanggan_free($id)
{

    $layanan = Data_layanan::all();
    $pop = Data_pop::all();
    $data = Ost_user__cdata::where('id_pelanggan', $id)->where('status_penagihan_layanan', 'Free')->with('layanan', 'datapelanggan', 'devout', 'devsewa')->get();
    return view('pelanggan/data_layanan_pelanggan_free', ['datalayananpelanggan' => $data, 'datalayanan' => $layanan, 'pop' => $pop, 'nopelanggan' => $id]);
}

    //functin untuk menampilkan form tambah pelanggan all
public function tambah_layanan_pelanggan_all($id)
{

    $layanan = Data_layanan::all();
    $pop = Data_pop::all();
    $tipebandwith = Data_tipe_bw::all();
    return view('pelanggan/tambah_layanan_pelanggan_all', ['nopelanggan' => $id, 'datalayanan' => $layanan, 'pop' => $pop, 'datatipebw' => $tipebandwith]);
}
        //functin untuk menampilkan form tambah pelanggan berbayar
public function tambah_layanan_pelanggan_berbayar($id)
{

    $layanan = Data_layanan::all();
    $pop = Data_pop::all();
    return view('pelanggan/tambah_layanan_pelanggan_berbayar', ['nopelanggan' => $id, 'datalayanan' => $layanan, 'pop' => $pop]);
}

    //function untuk menampilkan form tambah pelanggan free
public function tambah_layanan_pelanggan_free($id)
{

    $layanan = Data_layanan::all();
    $pop = Data_pop::all();
    return view('pelanggan/tambah_layanan_pelanggan_free', ['nopelanggan' => $id, 'datalayanan' => $layanan, 'pop' => $pop]);
}

    //funtion untuk create pelanggan all
public function create_layanan_pelanggan_all($nopelanggan, Request $request)
{
    $user_id = Ost_user__cdata::max('user_id');

    $dataPelanggan = Data_pelanggan::where('id_pelanggan', $nopelanggan)->first();
    $no_hp = $dataPelanggan->no_hp;

    $ost_email = Ost_user_email::create([
        'user_id' => $user_id + 1,
        'address' => $dataPelanggan->email
    ]);

    Ost_user::create([
        'org_id' => 0,
        'default_email_id' => $ost_email->id,
        'name' => $dataPelanggan->nama_pelanggan
    ]);


    Ost_user__cdata::create([
        'user_id' => $user_id + 1,
        'id_pelanggan' => $nopelanggan,
        'id_tipe_bw' => $request['id_tipe_bw'],
        'id_layanan' => $request['layanan'],
        'catatan_layanan' => $request['catatan_layanan'],
        'status_layanan_pelanggan' => 'Aktif',
        'status_penagihan_layanan' => $request['status_penagihan'],
        'tanggal_aktivasi_layanan' => date('Y-m-d', strtotime($request['tanggal_aktivasi_layanan'])),
        'id_pop' => $request['pop'],
        'notes' => $request['notes'],
        'lokasi_layanan' => $request['lokasi_layanan'],
            // 'datek_layanan' => $request['datek_layanan'],
        'datek_ip_address' => $request['datek_ip_address'],
            // 'datek_cpe' => $request['datek_cpe'],
            // 'datek_router' => $request['datek_router'],
            // 'datek_switch' => $request['datek_switch'],
            // 'datek_indoor_ap' => $request['datek_indoor_ap'],
            // 'datek_server' => $request['datek_server'],
            // 'datek_kabel' => $request['datek_kabel'],
            // 'datek_besi' => $request['datek_besi'],
            // 'datek_poe' => $request['datek_poe'],
            // 'datek_adaptor' => $request['datek_adaptor'],
            // 'datek_ssid_pop' => $request['datek_ssid_pop'],
            // 'datek_gps_pos' => $request['datek_gps_pos'],
            // 'datek_antenna' => $request['datek_antena'],
            // 'phone' => '0' . $no_hp,
    ]);

    return redirect('data_layanan_pelanggan_all/' . $nopelanggan);
}

    //funtion untuk create pelanggan berbayar
public function create_layanan_pelanggan_berbayar($nopelanggan, Request $request)
{
    $user_id = Ost_user__cdata::max('user_id');

    $dataPelanggan = Data_pelanggan::where('id_pelanggan', $nopelanggan)->first();
    $no_hp = $dataPelanggan->no_hp;

    $ost_email = Ost_user_email::create([
        'user_id' => $user_id + 1,
        'address' => $dataPelanggan->email
    ]);

    Ost_user::create([
        'org_id' => 0,
        'default_email_id' => $ost_email->id,
        'name' => $dataPelanggan->nama_pelanggan
    ]);


    Ost_user__cdata::create([
        'user_id' => $user_id + 1,
        'id_pelanggan' => $nopelanggan,
        'id_layanan' => $request['layanan'],
        'catatan_layanan' => $request['catatan_layanan'],
        'status_layanan_pelanggan' => 'Aktif',
        'status_penagihan_layanan' => 'Berbayar',
        'tanggal_aktivasi_layanan' => date('Y-m-d', strtotime($request['tanggal_aktivasi_layanan'])),
        'id_pop' => $request['pop'],
        'notes' => $request['notes'],
        'alamat' => $request['lokasi_layanan'],
            // 'datek_layanan' => $request['datek_layanan'],
        'datek_ip_address' => $request['datek_ip_address'],
            // 'datek_cpe' => $request['datek_cpe'],
            // 'datek_router' => $request['datek_router'],
            // 'datek_switch' => $request['datek_switch'],
            // 'datek_indoor_ap' => $request['datek_indoor_ap'],
            // 'datek_server' => $request['datek_server'],
            // 'datek_kabel' => $request['datek_kabel'],
            // 'datek_besi' => $request['datek_besi'],
            // 'datek_poe' => $request['datek_poe'],
            // 'datek_adaptor' => $request['datek_adaptor'],
            // 'datek_ssid_pop' => $request['datek_ssid_pop'],
            // 'datek_gps_pos' => $request['datek_gps_pos'],
            // 'datek_antenna' => $request['datek_antena'],
            // 'phone' => '0' . $no_hp,
    ]);

    return redirect('data_layanan_pelanggan_berbayar/' . $nopelanggan);
}

    //function untuk create pelanggan free
public function create_layanan_pelanggan_free($nopelanggan, Request $request)
{

    $user_id = Ost_user__cdata::max('user_id');

    $dataPelanggan = Data_pelanggan::where('id_pelanggan', $nopelanggan)->first();
    $no_hp = $dataPelanggan->no_hp;

    $cek_Ost_email = Ost_user_email::where('address', $dataPelanggan->email)->first();

    if (is_null($cek_Ost_email)) {
            # code...
        $ost_email = Ost_user_email::create([
            'user_id' => $user_id + 1,
            'address' => $dataPelanggan->email
        ]);
    }


    Ost_user::create([
        'org_id' => 0,
        'default_email_id' => $ost_email->id,
        'name' => $dataPelanggan->nama_pelanggan
    ]);


    Ost_user__cdata::create([
        'user_id' => $user_id + 1,
        'id_pelanggan' => $nopelanggan,
        'id_layanan' => $request['layanan'],
        'status_layanan_pelanggan' => 'Aktif',
        'status_penagihan_layanan' => 'Free',
        'tanggal_aktivasi_layanan' => date('Y-m-d', strtotime($request['tanggal_aktivasi_layanan'])),
        'id_pop' => $request['pop'],
        'notes' => $request['notes'],
            // 'datek_layanan' => $request['datek_layanan'],
        'alamat' => $request['lokasi_layanan'],
        'datek_ip_address' => $request['datek_ip_address'],
            // 'datek_cpe' => $request['datek_cpe'],
            // 'datek_router' => $request['datek_router'],
            // 'datek_switch' => $request['datek_switch'],
            // 'datek_indoor_ap' => $request['datek_indoor_ap'],
            // 'datek_server' => $request['datek_server'],
            // 'datek_kabel' => $request['datek_kabel'],
            // 'datek_besi' => $request['datek_besi'],
            // 'datek_poe' => $request['datek_poe'],
            // 'datek_adaptor' => $request['datek_adaptor'],
            // 'datek_ssid_pop' => $request['datek_ssid_pop'],
            // 'datek_gps_pos' => $request['datek_gps_pos'],
            // 'datek_antenna' => $request['datek_antena'],
            // 'lokasi_layanan' => $request['lokasi_layanan'],
            // 'phone' => '0' . $no_hp,
    ]);

    return redirect('data_layanan_pelanggan_free' . $nopelanggan);
}


    //function untuk edit pelanggan berbayar dan free
public function edit_layanan_pelanggan($userid, $idPelanggan, Request $request)
{

    $dataUser = Ost_user__cdata::where('user_id', $userid)->first();

    $layananLama = Data_layanan::where('id_layanan', $dataUser->id_layanan)->first();
    $layananBaru = Data_layanan::where('id_layanan', $request['layanan'])->first();

    $bandwithLama = Data_tipe_bw::where('id_tipe_bw', $dataUser->id_tipe_bw)->first();
    $bandwithBaru = Data_tipe_bw::where('id_tipe_bw', $request['id_tipe_bw'])->first();

    if (($dataUser->id_layanan != $request['layanan']) and ($dataUser->id_tipe_bw != $request['id_tipe_bw'])) {
            # code...
        LogDB::record(Auth::user(), $idPelanggan, 'Perbarui Jenis Layanan dan bandwith. Notes: '.$request['notes'], 'Layanan: '.$layananLama->nama_layanan. ' => '.$layananBaru->nama_layanan.', Bandwith: '.$bandwithLama->tipe_bw. ' => '. $bandwithBaru->tipe_bw);

    } elseif ($dataUser->id_layanan != $request['layanan']) {
               # code...
        LogDB::record(Auth::user(), $idPelanggan, 'Perbarui Jenis Layanan. Notes: '.$request['notes'], $layananLama->nama_layanan. ' => '.$layananBaru->nama_layanan);

    } elseif ($dataUser->id_tipe_bw != $request['id_tipe_bw']) {
            # code...
        LogDB::record(Auth::user(), $idPelanggan, 'Perbarui bandwith. Notes: '.$request['notes'], $bandwithLama->tipe_bw. ' => '. $bandwithBaru->tipe_bw);
    }



    $data = Ost_user__cdata::where('user_id', $userid);

    if ($request['status_penagihan'] == 'all'){
        $data->update([
            'id_layanan' => $request['layanan'],
            'catatan_layanan' => $request['catatan_layanan'],
            'id_tipe_bw' => $request['id_tipe_bw'],
            'tanggal_aktivasi_layanan' => date('Y-m-d', strtotime($request['tanggal_aktivasi_layanan'])),
            'tanggal_nonaktif_layanan' => date('Y-m-d', strtotime($request['tanggal_nonaktif_layanan'])),
            'id_pop' => $request['pop'],
            'notes' => $request['notes'],
            'status_penagihan_layanan' => $request['status_penagihan_layanan'],
                // 'datek_layanan' => $request['datek_layanan'],
            'datek_ip_address' => $request['datek_ip_address'],
                // 'datek_cpe' => $request['datek_cpe'],
                // 'datek_router' => $request['datek_router'],
                // 'datek_switch' => $request['datek_switch'],
                // 'datek_indoor_ap' => $request['datek_indoor_ap'],
                // 'datek_server' => $request['datek_server'],
                // 'datek_kabel' => $request['datek_kabel'],
                // 'datek_besi' => $request['datek_besi'],
                // 'datek_poe' => $request['datek_poe'],
                // 'datek_adaptor' => $request['datek_adaptor'],
                // 'datek_ssid_pop' => $request['datek_ssid_pop'],
                // 'datek_gps_pos' => $request['datek_gps_pos'],
                // 'datek_antenna' => $request['datek_antena'],
            'lokasi_layanan' => $request['lokasi_layanan'],
        ]);
    } else {
        $data->update([
            'id_layanan' => $request['layanan'],
            'catatan_layanan' => $request['catatan_layanan'],
            'id_tipe_bw' => $request['id_tipe_bw'],
            'tanggal_aktivasi_layanan' => date('Y-m-d', strtotime($request['tanggal_aktivasi_layanan'])),
            'tanggal_nonaktif_layanan' => date('Y-m-d', strtotime($request['tanggal_nonaktif_layanan'])),
            'id_pop' => $request['pop'],
            'notes' => $request['notes'],
                // 'datek_layanan' => $request['datek_layanan'],
            'datek_ip_address' => $request['datek_ip_address'],
                // 'datek_cpe' => $request['datek_cpe'],
                // 'datek_router' => $request['datek_router'],
                // 'datek_switch' => $request['datek_switch'],
                // 'datek_indoor_ap' => $request['datek_indoor_ap'],
                // 'datek_server' => $request['datek_server'],
                // 'datek_kabel' => $request['datek_kabel'],
                // 'datek_besi' => $request['datek_besi'],
                // 'datek_poe' => $request['datek_poe'],
                // 'datek_adaptor' => $request['datek_adaptor'],
                // 'datek_ssid_pop' => $request['datek_ssid_pop'],
                // 'datek_gps_pos' => $request['datek_gps_pos'],
                // 'datek_antenna' => $request['datek_antena'],
            'lokasi_layanan' => $request['lokasi_layanan'],
        ]);
    }


    if ($request['status_penagihan'] == 'Berbayar') {
            # code...
        return redirect('data_layanan_pelanggan_berbayar/' . $idPelanggan);
    } elseif($request['status_penagihan'] == 'Berbayar') {
        return redirect('data_layanan_pelanggan_free/' . $idPelanggan);
    }else {
        return redirect('data_layanan_pelanggan_all/' . $idPelanggan);
    }

}

public function pemutusan_layanan($userid, $idPelanggan, Request $request)
{

    $data = Ost_user__cdata::where('user_id', $userid);

    if ($request->file('berkas_pemutusan')) {
            # code...
        $request->file('berkas_pemutusan')->store('berkas_pemutusan');
        $berkas = $request->file('berkas_pemutusan')->hashName();

        if ($request['status_penagihan'] == 'all'){
            $data->update([

             'status_layanan_pelanggan' => 'Non Aktif',
             'tanggal_nonaktif_layanan' => date('Y-m-d', strtotime($request['tanggal_nonaktif_layanan'])),
             'alasan_pemutusan' => $request['alasan_pemutusan'],
             'berkas_pemutusan' => $berkas,

         ]);
        } else {
            $data->update([

               'status_layanan_pelanggan' => 'Non Aktif',
               'tanggal_nonaktif_layanan' => date('Y-m-d', strtotime($request['tanggal_nonaktif_layanan'])),
               'alasan_pemutusan' => $request['alasan_pemutusan'],
               'berkas_pemutusan' => $berkas,
           ]);
        }

        if ($request['status_penagihan'] == 'Berbayar') {
            # code...
            return redirect('data_layanan_pelanggan_berbayar/' . $idPelanggan);
        } elseif($request['status_penagihan'] == 'Berbayar') {
            return redirect('data_layanan_pelanggan_free/' . $idPelanggan);
        }else {
            return redirect('data_layanan_pelanggan_all/' . $idPelanggan);
        }

    }
}



    //function untuk delete data layanan pelanggan
public function delete_layanan_pelanggan($id, $idPelanggan, Request $request)
{

    $data = Ost_user__cdata::where('user_id', $id);
    $data->delete();


    return redirect('data_layanan_pelanggan_all/' . $idPelanggan);

}

}


 // public function delete_layanan_pelanggan($id, $idPelanggan, Request $request)
 //    {

 //        $data = Ost_user__cdata::where('user_id', $id);
 //        $data->delete();

 //        if ($request['status_penagihan'] == 'Berbayar') {
 //            # code...
 //            return redirect('data_layanan_pelanggan_berbayar/' . $idPelanggan);
 //        } else {
 //            return redirect('data_layanan_pelanggan_free/' . $idPelanggan);
 //        }

 //    }
