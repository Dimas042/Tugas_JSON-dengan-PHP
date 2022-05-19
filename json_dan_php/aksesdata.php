<?php
    //membuat Lib / metode
    $ch = curl_init();

    //setting option (setopt) u/url yang akan dibuka
    curl_setopt($ch, CURLOPT_URL, "http://localhost/tugasjson/data.json");

    //settion option (setopt) u/ hasil hiturl bisa ada kembalian (return)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    //eksekusi curl
    $output = curl_exec($ch);

    //close curl
    curl_close($ch);

    //cek perubahan jason to array
    $data = json_decode($output);
    //echo "<pre>"; print_r($data); echo "</pre>";

    //echo $data[0]->nama;

?>

<html>
    <head>
        <title>Biodata MAHASISWA</title>
    </head>
    <body>
        <?php
            foreach($data as $mhs){
                echo '
                    <label>Nama Mahasiswa :</label>
                    '.$mhs->nama.'
                    <br/>
                    <label>NIM : </label>
                    '.$mhs->nim.'
                    <br/>
                    <br/>Riwayat Pendidikan = </label>
                    <br/>Riwayat SD : </label>
                    '.$mhs->riwayat_pendidikan->sd.'
                    <br/>Riwayat SMP : </label>
                    '.$mhs->riwayat_pendidikan->smp.'
                    <br/>Riwayat SMA : </label>
                    '.$mhs->riwayat_pendidikan->sma.'
                    <br/>
                    
                ';

                echo "<br/><label>Hobi : </label><br/>";
                foreach ($mhs->hobi as $hobi){
                    echo "- ".$hobi;
                    echo "<br/>";
                }

                echo "<hr/>";
            }
        ?>
    </body>
</html>