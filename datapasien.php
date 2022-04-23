<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
            margin: 1em;
        }
        h2, h3 {
            margin: 2em;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    require_once 'class_pasien.php'; 
    require_once 'class_bmi.php';
    require_once 'class_BMIPasien.php';

    $ps1 = new BMIPasien ("P001","Ahmad","Jakarta","01-01-1999","ahmad01@gmail.com","L","2022-01-10");
    $ps1->berat = 69.8;
    $ps1->tinggi = 169;

    $ps2 = new BMIPasien ("P002","Rina","Bogor","02-12-2002","rina0212@gmail.com","P","2022-01-10");
    $ps2->berat = 55.3;
    $ps2->tinggi = 165;

    $ps3 = new BMIPasien ("P003","Lutfi","Bojonggede","11-02-1998","lutfi1102@gmail.com","L","2022-01-11");
    $ps3->berat = 45.2;
    $ps3->tinggi = 171;

    // $ps1 = ['kode' => "P001", 'nama' => "Ahmad", 'gender' => "L", 'tanggal' => "2022-01-10", 'berat' => 69.8, 'tinggi' => 169];
    // $ps2 = ['kode' => "P002", 'nama' => "Rina", 'gender' => "P", 'tanggal' => "2022-01-10", 'berat' => 55.3, 'tinggi' => 165];
    // $ps3 = ['kode' => "P003", 'nama' => "Lutfi", 'gender' => "L", 'tanggal' => "2022-01-11", 'berat' => 45.2, 'tinggi' => 171];
    // $ps4 = ['kode' => $pasien->kode, 'nama' => $pasien->nama, 'gender' => $pasien->gender, 'tanggal' => $pasien->tanggal, 'berat' => $pasien->berat, 'tinggi' => $pasien->tinggi];

    $ps4 = new BMIPasien ($kode,$nama,$tmp_lahir,$tgl_lahir,$email,$gender,$tanggal);
    $ps4->berat = $berat;
    $ps4->tinggi = $tinggi;

    $ar_ps = [$ps1,$ps2,$ps3,$ps4];

    if(isset($_GET['proses'])) { 
        $ps4 = new BMIPasien;     
        $ps4->kode = $_GET['kode'];
        $ps4->nama = $_GET['nama'];
        $ps4->gender = $_GET['gender'];
        $ps4->tanggal = $_GET['tanggal'];
        $ps4->berat = $_GET['berat'];
        $ps4->tinggi = $_GET['tinggi'];

        return $ps4;
    }


    ?>

<h2>Hasil BMI Anda</h2>
<table border= "1" width="100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Periksa</th>
            <th>Kode Pasien</th>
            <th>Nama Pasien</th>
            <th>Gender</th>
            <th>Berat (kg)</th>
            <th>Tinggi (cm)</th>
            <th>Nilai BMI</th>
            <th>Status BMI</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nomor=1;
            foreach($ar_ps as $ps){
        ?>
            <tr>
                <td>
                    <?=$nomor?>
                </td>
                <td>
                    <?=$ps->tanggal?>
                </td>
                <td>
                    <?=$ps->kode?>
                </td>
                <td>
                    <?=$ps->nama?>
                </td>
                <td>
                    <?=$ps->gender?>
                </td>
                <td>
                    <?=$ps->berat?>
                </td>
                <td>
                    <?=$ps->tinggi?>
                </td>
                <td>
                    <?=$ps->nilaiBMI()?>
                </td>
                <td>
                    <?=$ps->statusBMI()?>
                </td>
            </tr>
        <?php
            $nomor++;
            }
        ?>
    </tbody>
</table>
</body>
</html>