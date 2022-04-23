<?php
require_once 'class_pasien.php'; 
require_once 'class_bmi.php';

class BMIPasien extends Pasien{
    public $bmi;
    public $tanggal;

    function __construct($kode,$nama,$tmp_lahir,$tgl_lahir,$email,$gender,$tanggal){
        parent::__construct($kode,$nama,$tmp_lahir,$tgl_lahir,$email,$gender);
        $this->tanggal = $tanggal;
    }

    public function nilaiBMI(){
        $this->tinggi = $this->tinggi / 100;
        $this->bmi = $this->berat / ($this->tinggi * $this->tinggi);
        return $this->bmi;
    }

    public function statusBMI(){
        if ($this->bmi < 18.5){
            return $this->BMIstatus = 'Kekurangan Berat Badan';
        }elseif ($this->bmi >= 18.5 && $this->bmi <= 24.9){
            return $this->BMIstatus = 'Normal (ideal)';
        }elseif ($this->bmi >= 25.0 && $this->bmi <= 29.9){
            return $this->BMIstatus = 'Kelebihan Berat Badan';
        }else {
            return $this->BMIstatus = 'Kegemukan (Obesitas)';
        }
    }
}
?>