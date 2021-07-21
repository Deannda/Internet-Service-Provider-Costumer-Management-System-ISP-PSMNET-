<?php 


    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
 
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }           
        return $hasil;
    }
 
?>


<!DOCTYPE html>
<html>
<head>
    <title>
    </title>
</head>
<body >

@foreach($dataInvoice as $key => $layanan)
    <table>
        <thead>
            
        </thead>
        <tbody >
            <tr>
            <td width="450">
            </td>
            <td width="200"><font size="20"><strong>INVOICE</strong></font></td>
            </tr>

            <hr size="50px" width="100%" double #8c8c8c>

            <tr>
            <td width="7">
            </td>
            <td width="300"><font size="14"><strong>PT. CITRA INFOMEDIA</strong></font>
            <br>
            </td>
            </tr>

            <tr>
            <td width="1">
            </td>
            <td width="320" valign="top">

                    <font size="11">Jl. Tengku Buang Asmara/</font>
            </td>
            <td width="120" valign="top">
                    No. Invoice   
            </td>
             <td width="178" valign="top">
              
                :
                
            </td>
            </tr>

            <tr>
            <td width="1">
            </td>
            <td width="320" valign="top">

                    <font size="11">Sapta Taruna</font>
            </td>
            <td width="120" valign="top">
                    Tgl. Invoice   
            </td>
             <td width="178" valign="top">
              
                :
                
            </td>
            </tr>

            <tr>
            <td width="1">
            </td>
            <td width="320" valign="top">

                    <font size="11">Kp. Rempak Siak Sri Indarpura</font>
            </td>
            <td width="120" valign="top">
                    ID. Pelanggan   
            </td>
             <td width="178" valign="top">
              
                : {{ $layanan->id_pelanggan }}
                
            </td>
            </tr>

            <tr>
            <td width="1">
            </td>
            <td width="320" valign="top">

                    <font size="11">Tlp: 0813-6472-2002</font>
            </td>
            <td width="120" valign="top">
                    NPWP. Pelanggan   
            </td>
             <td width="178" valign="top">
              
                :
            <br>
            </td>
            </tr>

            <tr>
            <td width="1">
            </td>
            <td width="320" valign="top">

                    <font size="11">NPWP/PKP: </font>

            <br>
            <br>
            </td>
            </tr>

            <tr>
            <td width="2">
            </td>
            <td width="320" valign="top">

                    <font size="11">KEPADA : </font>
            </td>
            </tr>

            <tr>
            <td width="2">
            </td>
            <td width="500">

                    <font size="14"><strong>{{ $layanan->datapelanggan[0]->nama_pelanggan }}</strong></font>

            </td>
            </tr>

            <tr>
            <td width="0.1">
            </td>
            <td width="350">

                    <font size="11"> {{ $layanan->datapelanggan[0]->alamat_instansi }} </font>
            </td>
            </tr>

            <tr>
            <td width="0.1">
            </td>
            <td width="350">

                    <font size="11"> Siak Sri Indrapura, Indonesia </font>
                    <br>
            </td>
            </tr>

            <tr>
            <td width="2">
            </td>
            <td width="350">
                    <font size="11"><strong>Tagihan Bulan {{  \Carbon\Carbon::now()->formatLocalized("%B %Y") }} </strong></font>
            </td>
            </tr>

            <hr size="50px" width="100%" double #8c8c8c>

            <tr>
            <td width="240">
            </td>
            <td width="220">

                    <font size="11"><strong>Uraian</strong></font>
            </td>
            <td width="100">

                    <font size="11">Jumlah</font>
            </td>
            </tr>

            <hr size="50px" width="100%" double #8c8c8c>

            <tr>
            <td width="2">
            </td>
            <td width="440">

                    <font size="11">{{ $layanan->layanan[0]->nama_layanan }}</font>
            </td>
            <td width="350">

                    <font size="11">Rp. {{ number_format($layanan->layanan[0]->harga_layanan,2,',','.') }}</font>
            <br>
            <br>
            <br>
            <br>
            </td>
            </tr>

            <hr size="100px" width="100%" double #8c8c8c>

            <tr>
            <td width="390">
            </td>
            <td width="50">

                    <font size="11"><strong>TOTAL</strong></font>
            </td>
            <td width="100">

                    <font size="11"><strong>Rp. {{ number_format($layanan->layanan[0]->harga_layanan,2,',','.') }}</strong></font>
                    <br>
            </td>
            </tr>

            <tr>
            <td width="2">
            </td>
            <td width="350">

                    <font size="11">TERBILANG :</font>
            </td>
            </tr>

            <tr>
            <td width="2">
            </td>
            <td width="350">

                    <font size="11">{{ strtoupper(terbilang($layanan->layanan[0]->harga_layanan)) }} RUPIAH</font>
                    <br>
            </td>
            </tr>

            <tr>
            <td width="2">
            </td>
            <td width="350">

                    <font size="9">Harga sudah termasuk PPN 10%</font>
                    <br>
                    <br>
                    <br>
            </td>
            </tr>

            <tr>
            <td width="420">
            </td>
            <td width="350">

                    <font size="11">Hormat Kami,</font>
                    <br>
                    <br>

            </td>
            </tr>

            <!-- <hr size="100px" width="10%" double #8c8c8c position-relative="30px"> -->

            <tr>
            <td width="410">
            </td>
            <td width="350">

                    <font size="11">Billing & Colleting</font>
                    <br>
                    <br>
                    <br>

            </td>
            </tr>

            <tr>
            <td width="2">
            </td>
            <td width="350">

                    <font size="11">PEMBAYARAN TRANSFER</font>
               
                    
            </td>
            </tr>

            <tr>
            <td width="2">
            </td>
            <td width="350">

                    <font size="11">BANK RIAU NO. REK 116.08.00833 AN. PT. CITRA INFOMEDIA</font>
               
                    
            </td>
            </tr>

            <tr>
            <td width="2">
            </td>
            <td width="350">

                    <font size="11">BANK BNI NO. REK. 0189044237 AN. DEDI YUDIANSYAH</font>
                    <br>
               
                    
            </td>
            </tr>

            <tr>
            <td width="2">
            </td>
            <td width="600">

                    <font size="10">Mohon untuk mengirimka email konfirmasi pembayaran ke finance@citrainfomedia.net atau menghubung bagian</font>
               
                    
            </td>
            </tr>

            <tr>
            <td width="2">
            </td>
            <td width="500">

                    <font size="10">Billing & Collecting di nomor 0823-8783-8908/0813-6572-2002</font>
               
                    
            </td>
            </tr>

            
        </tbody>
    </table>
@if($key+1 != count($dataInvoice))
<br pagebreak="true"/>
@endif
@endforeach
</body>
</html>
