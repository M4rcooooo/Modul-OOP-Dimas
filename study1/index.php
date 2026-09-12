<?php

class siswa
{
    private string $nama;
    private int $nis;
    private string $kelas;
    private int $nilai;

    public function __construct(

        string $nama, int $nis, string $kelas, int $nilai)
    {
            
        $this->nama = $nama;
        $this->nis = $nis;
        $this->kelas = $kelas;
        $this->nilai = $nilai;
    }
    

    public function tampilkanData()
    {
        echo "Nama: " . $this->nama . "<br>";
        echo "NIS: " . $this->nis . "<br>";
        echo "Kelas: " . $this->kelas . "<br>";
        echo "Nilai: " . $this->nilai . "<br>";
    }
    public function cekKelulusan(){
        if ($this->nilai >=75){
            echo "lulus";
        }
        else{
            echo "tidak lulus";
        }
    }
}

$siswa = [
    new siswa ("Andi", 12345, "XII IPA 1", 80),
    new siswa ("Budi", 12346, "XII IPA 2", 70),
    new siswa ("Mbud", 12347, "XII IPA 3", 90)
];

    

   

    foreach ($siswa as $s){
        $s->tampilkanData();
        $status = $s->cekKelulusan();
        echo "<br>";
    }
     
    

?>