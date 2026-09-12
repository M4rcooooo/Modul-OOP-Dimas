<?php

class menu
{
    private int $kode;
    private string $nama;


    protected float $harga;
    protected string $kategori;
    protected int $stok;


    public function __construct( int $kode, string $nama, float $harga, string $kategori, int $stok
    ){
        if($harga < 0){
            throw new Exception("Harga tidak boleh negatif");

        }
        if ($stok < 0){
            throw new Exception("Stok tidak boleh negatif");

        }
        $this->kode = $kode;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
        $this->stok = $stok;
    }

    public function tambahStok(int $jumlah): string
    {
        if ($jumlah < 0) {
            return "Jumlah stok harus lebih dari 0";
        }

        $this->stok += $jumlah;
        
        return "Stok berhasil ditambahkan";
    }
    
    public function kurangiStok(int $jumlah): string
    {
        if($jumlah <= 0){
            return "jumlah pembelian harus lebih dari 0";
        }
        if ($jumlah >$this->stok){
            return"pembelian melebihi stok";
        }
        $this->stok -= $jumlah;

        return "Pembelian berhasil";

    }

    public function hitungTotalHarga(int $jumlah): float
    {
        if($jumlah <= 0){
            return 0;
        }

        if ($jumlah > $this->stok){
            return 0;
        }
        return $this->harga * $jumlah;
    }
    public function getStatus(): string
    {
        if ($this->stok === 0){
            return"habis";
        }
        return "tersedia";
    }

    public function getData(): array
    {
        $kode = $this->kode;
        $nama = $this->nama;
        $harga = $this->harga;
        $kategori = $this->kategori;
        $stok = $this->stok;
        $status = $this->getStatus();

        return compact(
            'kode',
            'nama',
            'harga',
            'kategori',
            'stok',
            'status'
        );
    }

}

class MenuMinuman extends menu
{
    public function __construct(
        int $kode,
        string $nama,
        float $harga,
        int $stok
    ){
        parent:: __construct(
            $kode,
            $nama,
            $harga,
            "Minuman",
            $stok
        );
    }
}

$daftarMenu = [
    new Menu(1, "pangsit", 5000, "Makanan", 100),
    new Menu(2, "dada ayam", 10000, "Makanan", 10),
    new Menu(3, "Ayam Geprek", 18000, "Makanan", 5),
    new MenuMinuman(4, "air putih", 5000, 15),
    new MenuMinuman(5, "susu", 12000, 7)
];

//uji coba pembelian

echo $daftarMenu[0]->kurangiStok(2) . "<br>";
echo "Total Harga: RPp " . $daftarMenu[0]->hitungTotalHarga(2) . "<br>";
echo "stok sekarang : " . $daftarMenu[0]->getData()['stok'] . "<br>";

echo"<hr>";

//pembelian melebihi stok
echo $daftarMenu[2]->kurangiStok(5) . "<br>";
echo "Status: " . $daftarMenu[2]->getStatus() . "<br>";

echo "<hr>";


echo $daftarMenu[1]->kurangiStok(20) . "<br>";

echo "<hr>";
echo "<h3>Menu Makanan</h3>";

foreach ($daftarMenu as $menu) {

    $data = $menu->getData();

    if ($data['kategori'] === "Makanan") {

        echo "Kode: " . $data['kode'] . "<br>";
        echo "Nama: " . $data['nama'] . "<br>";
        echo "Harga: Rp " . $data['harga'] . "<br>";
        echo "Kategori: " . $data['kategori'] . "<br>";
        echo "Stok: " . $data['stok'] . "<br>";
        echo "Status: " . $data['status'] . "<br>";

        echo "<hr>";
    }
}

echo "<h3>Menu Minuman</h3>";

foreach ($daftarMenu as $menu) {

    $data = $menu->getData();

    if ($data['kategori'] === "Minuman") {

        echo "Kode: " . $data['kode'] . "<br>";
        echo "Nama: " . $data['nama'] . "<br>";
        echo "Harga: Rp " . $data['harga'] . "<br>";
        echo "Kategori: " . $data['kategori'] . "<br>";
        echo "Stok: " . $data['stok'] . "<br>";
        echo "Status: " . $data['status'] . "<br>";

        echo "<hr>";
    }
}
