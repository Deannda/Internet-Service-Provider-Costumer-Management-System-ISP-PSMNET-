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

            <td width="320"><font size="12"><strong>PT. CITRA INFOMEDIA</strong></font>
            </td>
           <td width="200" rowspan="4"align="right"><img src="adminlte/dist/img/logoxs2.png" alt="Image" height="27" width="130"></td>
            </tr>

           

            <tr>
            <td width="400"><font size="11">Kp. Rempak Siak Sri Indarpura</font>
            </td>
            <td width="180"></td>
            </tr>

            <tr>
            <td width="400"><font size="11">Tlp: 0813-6472-2002 / 0812-4064-2020</font>
            </td>
            <td width="180"></td>
            </tr>

            <tr>
            <td width="400"><font size="11">Jl. Tengku Buang Asmara/Sapta Taruna</font>
            </td>
            <td width="180" rowspan="2"><font size="17"><strong>Faktur Tagihan</strong></font></td>
            </tr>

              <tr><td></td><td></td></tr>
             
            <!-- <hr size="60px" width="100%" double #8c8c8c> -->

          <!--   <tr>
            <td width="7">
            </td>
            <td width="300" style="border-top: 1px border-right: 1px border-left: 1px solid #17202A;">
            <div style="background-color:#fff; border: 1px solid #17202A; height: auto; margin: 1px 0px; padding: 0px; text-align: left; width: auto; border-radius: 25px;"><font size="11"><p>PT.CITRA INFOMEDIA</p>
                <p>Jl. Tengku Buang Asmara/Sapta Taruna</p>
                <p>Kp. Rempak Siak Sri Indarpura</p></font>
</div>
            <br>
            </td>
            </tr>


            <tr>
            <td width="7">
            </td>
            <td width="300" style="border-top: 1px border-right: 1px border-left: 1px solid #17202A;"><font size="14"><strong>PT. CITRA INFOMEDIA</strong></font>
            <br>
            </td>
            </tr>
            <tr> -->
 

        
         	
         	<!-- <tr>
            <td width="1">
            </td>
            <td width="270" border="1" rowspan="1"><font size="12"><strong>PT. CITRA INFOMEDIA</strong></font>
            </td>  
            <td width="30">
            </td>     
            
              <td width="230"><font size="15" align="right" rowspan="2"><strong>Faktur Tagihan</strong></font><br>	
              </td>
            
            </tr>	
            <tr>
            <td width="1">
            </td>
            <td width="270" border="1" ><font size="11">Jl. Tengku Buang Asmara/Sapta Taruna</font>
            	<br>
            	<font size="11">Kp. Rempak Siak Sri Indarpura</font>
            	<br>
            	<font size="11">Tlp: 0813-6472-2002 / 0812-4064-2020</font>

            </td>  
            <td width="30">
            </td>     
            
            </tr>	 -->

            <tr>
            <td width="1">
            </td>
            <td width="270">
            </td>  
            <td width="30">
            </td>     
            
            <td width="115" border="1" rowspan="1" style="border-radius: 40px;">
                    <font size="11">No. Tagihan</font><br><font size="10" align="center"><b>11783</b></font>
            </td>
            <!-- <td width="50">
            </td> -->
             <td width="115" border="1"  rowspan="1" style="border-radius: 40px;">
                    <font size="11">Tgl. Tagihan</font>  <br><font size="10" align="center"><b>1 Oktober 2020</b></font>
            </td>
            
            </tr>

               <tr>
             <td width="1">
            </td>
            <td width="270">
            </td>  
            <td width="30">
            </td> 

            <td width="115" border="1"  style="border-radius: 40px;">
                    <font size="11">Terms</font><br><font size="10" align="center"><b>C.O.D</b></font>
            </td>
          
             <td width="115" border="1"  style="border-radius: 40px;">
                    <font size="11">Mata Uang</font>  <br><font size="10" align="center"><b>Rupiah</b></font>
            </td>
            
            </tr>


             <tr>
            <td width="1">
            </td>
            <td width="270">
            </td>  
            <td width="30">
            </td> 
            <td width="230" border="1" rowspan="2" style="border-radius: 40px;">
                    <font size="11">Kirim ke</font><br>	
                    <font size="11"><strong>{{ $layanan->datapelanggan[0]->nama_pelanggan }}</strong></font>
                    <br><font size="11">&nbsp;&nbsp;{{ $layanan->datapelanggan[0]->alamat_instansi }}</font>
            </td>
            <!-- <td width="50">
            </td> -->
            
            <!--  <td width="150" valign="top">
              
                :
                
            </td> -->
            </tr>

            

         <!--    <tr>
            <td width="1">
            </td>
            <td width="330" valign="top">

                   
            </td>
            <td width="100" valign="top">
                    <font size="12">Tgl. Tagihan</font>  <br><font size="1">1 Okt 2020</font>
            </td>
             <td width="150" valign="top">
              
                :
                
            </td>
            </tr> -->


            <tr>
            <td width="1">
            </td>
            <td width="300" valign="top">   
            </td>
           <!--  <td width="120" valign="top">
                    ID. Pelanggan   
            </td>
             <td width="178" valign="top">
              
                : {{ $layanan->id_pelanggan }}
                
            </td> -->
            </tr>

          <!--   <tr>
            <td width="1">
            </td>
            <td width="320" valign="top">

                    <font size="11"></font>
            </td>
            <td width="120" valign="top">
                    NPWP. Pelanggan   
            </td>
             <td width="178" valign="top">
              
                :
            <br>
            </td>
            </tr> -->
<!-- 
            <tr>
            <td width="1">
            </td>
            <td width="120" valign="top">
<br><br>
                    <font size="10">No. Pelanggan &nbsp;:&nbsp;</font>

         
            </td>
            </tr>

               <tr>
            <td width="1">
            </td>
            <td width="120" valign="top">

                    <font size="10">Nama Pelanggan&nbsp;:&nbsp;</font>

          
            </td>
            </tr>

             <tr>
            <td width="1">
            </td>
            <td width="120" valign="top">

                    <font size="10">Alamat&nbsp;:&nbsp;</font>

            </td>
            </tr>
 -->

            <!-- <tr>
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
            </tr> -->

            <!-- <hr size="50px" width="100%" double #8c8c8c> -->
            <br><br>

    <table border="1">
    	<thead>
        <tr>
        			<td bgcolor="#FFFFFF"  border="1" width="120" style="vertical-align : middle;text-align:center;" ><font size="11"><strong>Item</strong></font></td>
					<td bgcolor="#FFFFFF"  border="1" width="150" style="vertical-align : middle;text-align:center;" ><font size="11"><strong>Deskripsi</strong></font></td>
					<td bgcolor="#FFFFFF"  border="1" width="60" style="vertical-align : middle;text-align:center;" ><font size="11"><strong>QTY</strong></font></td>
					<td bgcolor="#FFFFFF"  border="1" width="80" style="vertical-align : middle;text-align:center;" ><font size="11"><strong>Harga</strong></font></td>
					<td bgcolor="#FFFFFF"  border="1" width="50" style="vertical-align : middle;text-align:center;" ><font size="11"><strong>Disc %</strong></font></td>
					<td bgcolor="#FFFFFF"  border="1" width="80" style="vertical-align : middle;text-align:center;" ><font size="11"><strong>Jumlah</strong></font></td>
					

           <!--  <th>Item</th>
            <th>Deskripsi</th>
            <th>QTY</th>
            <th>Harga</th>
            <th>Disc %</th>
            <th>Jumlah</th> -->
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="6" width="120" ><font size="10">&nbsp;{{ $layanan->layanan[0]->nama_layanan }}</font></td>
            <td rowspan="6" width="150"><font size="10">&nbsp;{{ $layanan->layanan[0]->nama_layanan }}</font></td>
            <td rowspan="6" width="60" style="vertical-align : middle;text-align:center;">1</td>
            <td rowspan="6" width="80" style="vertical-align : middle;text-align:center;" ><font size="10"> {{ number_format($layanan->layanan[0]->harga_layanan,0,',','.') }}</font></td>
            <td rowspan="6" width="50" style="vertical-align : middle;text-align:center;" >0</td>
            <td rowspan="6" width="80" style="vertical-align : middle;text-align:right;"><font size="10"> {{ number_format($layanan->layanan[0]->harga_layanan,0,',','.') }}</font></td>

        </tr>
       
        <tr>
        	<td></td>
        	
        </tr>

 		<tr>
        	<td></td>
        	
        </tr>

        <tr>
        	<td></td>
        	
        </tr>

         <tr>
        	<td></td>
        	
        </tr>

         <tr>
        	
        	<td></td>
        </tr>

       


 
       </tbody>
    </table>


<!-- 
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
 -->
         <!--    <hr size="100px" width="100%" double #8c8c8c>

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
            </tr> -->
<br><br>	
            <tr>
            <td width="1">
            </td>
            <td width="380">

                    <font size="11">TERBILANG :</font>
            </td>
            <td width="165" border="1" style="vertical-align : middle;text-align:left;">

                    <font size="11">Total Tagihan&nbsp;:&nbsp;<b>Rp. {{ number_format($layanan->layanan[0]->harga_layanan,0,',','.') }}</b></font>                  
            </td>

            </tr>

            <tr>
            <td width="1">
            </td>
            <td width="500">

                    <font size="10">{{ strtoupper(terbilang($layanan->layanan[0]->harga_layanan)) }} RUPIAH</font>
                    <br>
            </td>
            </tr>

            <tr>
            <td width="1">
            </td>
            <td width="390">

                    <font size="11">KETERANGAN :</font>                  
            </td>

             <!-- <td width="150">

                    <font size="11"><b>Total Tagihan : {{ number_format($layanan->layanan[0]->harga_layanan,2,',','.') }}</b></font>                  
            </td> -->
            </tr>
            <tr>
            <td width="1">
            </td>
            <td width="350">

                    <font size="10">Tagihan Bulan Oktober</font>
                    <br>	                  
            </td>
            </tr>

           <br>	
            <tr>
            <td width="1">
            </td>
            <td width="330">

                    <font size="9">PEMBAYARAN TRANSFER</font><br>	
                    <font size="9">BANK RIAU NO. REK 1160800833 AN. PT. CITRA INFOMEDIA</font><br>
                    <font size="9">BANK BNI NO. REK. 0189044237 AN. DEDI YUDIANSYAH</font><br>	
                    <font size="9">BANK MANDIRI NO. REK 1080004344777 AN. PT. CITRA INFOMEDIA</font><br>
                    <font size="9">BANK BRI NO. REK. 119001001606506 AN. DEDI YUDIANSYAH</font>	
                    


               
                    
            </td>
            <td width="10">	</td>
            <td width="120">	<font size="9">Billing & Colleting</font></td>
            <td width="10">	</td>
            <td width="120">	<font size="9">Diterima Oleh</font></td>
            </tr>

             <tr>
            <td width="1">
            </td>
            <td width="330">
            </td>
             <td width="10">	</td>
            <td width="120"><font size="9">------------------------</font><br></td>
            <td width="10">	</td>
            <td width="120"><font size="9">------------------------</font><br><font size="9">Tgl:</font></td>
            </tr>

            <!-- <tr>
            <td width="1">
            </td>
            <td width="280">

                    <font size="9">BANK RIAU NO. REK 116.08.00833 AN. PT. CITRA INFOMEDIA</font>
               
                    
            </td>
            </tr>

            <tr>
            <td width="1">
            </td>
            <td width="270">

                    <font size="9">BANK BNI NO. REK. 0189044237 AN. DEDI YUDIANSYAH</font>
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
            </tr> -->

            
        </tbody>
    </table>
@if($key+1 != count($dataInvoice))
<br pagebreak="true"/>
@endif
@endforeach
</body>
</html>
