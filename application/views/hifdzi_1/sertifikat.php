<?php
    function tgl_arab($tgl){
        $data = explode("-", $tgl);
        $hari = angka_arab($data[0]);
        $bulan = bulan_arab($data[1]);
        // $tahun = angka_arab($data[2]);

        return $hari . " مِنْ " . $bulan;
    }

    function tgl_indo($tgl){
        $data = explode("-", $tgl);
        $hari = $data[0];
        $bulan = $data[1];
        $tahun = $data[2];

        if($bulan == "01") $bulan = "Januari";
        if($bulan == "02") $bulan = "Februari";
        if($bulan == "03") $bulan = "Maret";
        if($bulan == "04") $bulan = "April";
        if($bulan == "05") $bulan = "Mei";
        if($bulan == "06") $bulan = "Juni";
        if($bulan == "07") $bulan = "Juli";
        if($bulan == "08") $bulan = "Agustus";
        if($bulan == "09") $bulan = "September";
        if($bulan == "10") $bulan = "Oktober";
        if($bulan == "11") $bulan = "November";
        if($bulan == "12") $bulan = "Desember";

        return $hari . " " . $bulan . " " . $tahun;
    }
    
    function angka_arab($data){
        $data = str_replace("0", "٠", $data);
        $data = str_replace("1", "١", $data);
        $data = str_replace("2", "٢", $data);
        $data = str_replace("3", "٣", $data);
        $data = str_replace("4", "٤", $data);
        $data = str_replace("5", "٥", $data);
        $data = str_replace("6", "٦", $data);
        $data = str_replace("7", "٧", $data);
        $data = str_replace("8", "٨", $data);
        $data = str_replace("9", "٩", $data);

        return $data;
    }

    function bulan_arab($data){
        if($data == "01") return "يناير";
        if($data == "02") return "فبراير";
        if($data == "03") return "مارس";
        if($data == "04") return "أبريل";
        if($data == "05") return "مايو";
        if($data == "06") return "يونيو";
        if($data == "07") return "يوليو";
        if($data == "08") return "أغسطس";
        if($data == "09") return "سبتمبر";
        if($data == "10") return "أكتوبر";
        if($data == "11") return "نوفمبر";
        if($data == "12") return "ديسمبر";
    }
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>

        .nama{
			position: absolute;
			left: 630px;
			top: 353px;
            font-size: 15px;
		}
        .ttl{
			position: absolute;
			left: 630px;
			top: 392px;
            font-size: 15px;
		}
        .alamat{
			position: absolute;
			left: 630px;
			top: 436px;
            font-size: 15px;
		}

        .p1{
			position: absolute;
			/* left: 565px; */
            right: 230px;
			top: 500px;
            font-size: 22px;
            font-family: 'arab';
            direction: 'rtl';
            word-spacing: 3px;
        }
        
        .p2{
			position: absolute;
			/* left: 570px; */
            right: 230px;
			top: 530px;
            font-size: 22px;
            font-family: 'arab';
            direction: 'rtl';
            word-spacing: 3px;
        }
        
        .p3{
			position: absolute;
			left: 500;
			top: 560px;
            font-size: 22px;
            font-family: 'arab';
            direction: 'rtl';
            word-spacing: 3px;
        }
    </style>
</head>
    <body>
        <img src="<?= base_url()?>assets/img/sertifikat/hifdzi1.jpg" alt="" srcset="">
        <p class="nama"><b><?= $peserta['nama']?></b></p>
        <p class="ttl"><b><?= $peserta['t4_lahir']?>, <?= tgl_indo(date("d-m-Y", strtotime($peserta['tgl_lahir'])))?></b></p>
        <p class="alamat"><b><?= $peserta['alamat']?></b></p>

        <p class="p1">قَدْ دَرَسَ /دَرَسَتْ اللغة العربيّة فِي الْفَصْل "حفظي ١" مِنَ التَّارِيْخ <?= tgl_arab(date("j-m", strtotime($kelas["tgl_mulai"])))?> </p>
        <p class="p2">إِلَى <?= tgl_arab(date("j-m", strtotime($kelas["tgl_selesai"])))?> <?= angka_arab(date("Y", strtotime($kelas["tgl_selesai"])))?> وَ قَدْ نَجَحَ /تْ فِي الإمتِحَانِ النِّهَائ بِتَقْدِيْرِيْ <u><?= $nilai?></u></p>
    </body>
</html>