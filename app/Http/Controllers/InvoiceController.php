<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ost_user__cdata;
use App\Data_tagihan;
use App\Data_sektor;
use PDF;

class InvoiceController extends Controller
{
	public function cetakinvoice(Request $request)
	{
		$dataInvoice = [];

		$idSektorPelanggan = '';
		// return $request->id_layanan;

		foreach ($request->id_layanan as $key => $value) {
			# code...
			$dataLayanan = Ost_user__cdata::where('user_id', $value)->with('datapelanggan','layanan')->first();
			array_push($dataInvoice, $dataLayanan);

			$idSektorPelanggan = $dataLayanan->datapelanggan[0]->nama_sektor;

			$cekData = Data_tagihan::where('user_id',$value)->whereMonth('tanggal_tagihan',date('m'))->whereYear('tanggal_tagihan',date('Y'))->first();
			if (is_null($cekData)) {
				# code...
				Data_tagihan::create([
					'id_pelanggan' => $dataLayanan->id_pelanggan,
					'user_id' => $value,
					'tanggal_tagihan' => date('Y-m-d') ,
					'status_tagihan' => 'diterbitkan'
				]);			}

			}

			$jenisSektor = Data_sektor::where('id_sektor', $idSektorPelanggan)->first();
			// return $dataInvoice;
			//note  nama sektor disamakan dengan nama sektor yg di tabel data_sektor
			if ($jenisSektor->nama_sektor == 'Pemerintah') {
				$view = \View::make('penagihan/invoice',['dataInvoice' => $dataInvoice]);
			} else {
				$view = \View::make('penagihan/invoicesoho',['dataInvoice' => $dataInvoice]);
			}

			$html_content = $view->render();

			PDF::SetTitle('Invoice Pelanggan');
			PDF::AddPage('P','A4');
			PDF::writeHTML($html_content, true, false, true, false, '');

			PDF::output('cetakinvoice.pdf');

		}

	}
