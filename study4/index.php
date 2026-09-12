<?php


class Kendaraan
{
   
    protected string $kode;
    protected string $merek;
    protected float $tarifPerHari;
    protected string $status;

   
    public function __construct(
        string $kode,
        string $merek,
        float $tarifPerHari
    ) {
        $this->kode = $kode;
        $this->merek = $merek;
        $this->tarifPerHari = $tarifPerHari;
        $this->status = "Tersedia";
    }

 
    public function sewa(): string
    {
        if ($this->status === "Disewa") {
            return "Kendaraan sedang disewa";
        }

        $this->status = "Disewa";

        return "Kendaraan berhasil disewa";
    }


    public function kembalikan(): string
    {
        if ($this->status === "Tersedia") {
            return "Kendaraan belum disewa";
        }

        $this->status = "Tersedia";

        return "Kendaraan berhasil dikembalikan";
    }

   
    public function hitungBiaya(int $lamaSewa): float
    {
        return $this->tarifPerHari * $lamaSewa;
    }

    
    public function getData(): array
    {
        return [
            "kode" => $this->kode,
            "merek" => $this->merek,
            "tarifPerHari" => $this->tarifPerHari,
            "status" => $this->status
        ];
    }
}



class Mobil extends Kendaraan
{
    protected float $asuransi;

    public function __construct(
        string $kode,
        string $merek,
        float $tarifPerHari,
        float $asuransi
    ) {
        parent::__construct(
            $kode,
            $merek,
            $tarifPerHari
        );

        $this->asuransi = $asuransi;
    }
    public function hitungBiaya(int $lamaSewa): float
    {
        $biayaSewa = $this->tarifPerHari * $lamaSewa;

        return $biayaSewa + $this->asuransi;
    }
}



class Motor extends Kendaraan
{
  

    public function hitungBiaya(int $lamaSewa): float
    {
        return $this->tarifPerHari * $lamaSewa;
    }
}



$daftarKendaraan = [
    new Mobil("1", "BMW", 500000, 100000),
    new Mobil("2", "AVANZA", 200000, 75000),
    new Motor("1", "Vario", 100000),
    new Motor("2", "NMAX", 350000)
];



echo "<h3>Biaya Mobil</h3>";

$mobil = $daftarKendaraan[0];

echo "Kendaraan: " . $mobil->getData()["merek"] . "<br>";
echo "Tarif per hari: Rp " . $mobil->getData()["tarifPerHari"] . "<br>";
echo "Lama sewa: 3 hari<br>";
echo "Total biaya: Rp " . $mobil->hitungBiaya(3) . "<br>";

echo "<hr>";



echo "<h3>Biaya Motor</h3>";

$motor = $daftarKendaraan[3];

echo "Kendaraan: " . $motor->getData()["merek"] . "<br>";
echo "Tarif per hari: Rp " . $motor->getData()["tarifPerHari"] . "<br>";
echo "Lama sewa: 3 hari<br>";
echo "Total biaya: Rp " . $motor->hitungBiaya(3) . "<br>";

echo "<hr>";



echo "<h3>Sewa</h3>";

echo $mobil->sewa() . "<br>";
echo $mobil->sewa() . "<br>";

echo "<hr>";



echo "<h3>Pengembalian</h3>";

echo $mobil->kembalikan() . "<br>";
echo "Status akhir: " . $mobil->getData()["status"] . "<br>";

echo "<hr>";



echo "<h3>Daftar Kendaraan</h3>";

foreach ($daftarKendaraan as $kendaraan) {

    $data = $kendaraan->getData();

    echo "Kode: " . $data["kode"] . "<br>";
    echo "Merek: " . $data["merek"] . "<br>";
    echo "Tarif per hari: Rp " . $data["tarifPerHari"] . "<br>";
    echo "Status: " . $data["status"] . "<br>";

    echo "<hr>";
}