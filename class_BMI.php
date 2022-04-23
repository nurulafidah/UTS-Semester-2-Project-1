<?php
class BMI {
    public $berat;
    public $tinggi;
    public $bmi;
    public $BMIstatus = '';

    function _construct($berat,$tinggi){
        $this->berat = $berat;
        $this->tinggi = $tinggi;
    }
}
?>