```php
<?php

class Buku
{
    private string $kode;
    private string $judul;
    private string $penulis;
    private int $tahunTerbit;
    private bool $sedangDipinjam;

    public function __construct(
        string $kode,
        string $judul,
        string $penulis,
        int $tahunTerbit
    ) {
        $this->kode = $kode;
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahunTerbit = $tahunTerbit;
        $this->sedangDipinjam = false;
    }

    public function pinjam(): string
    {
        if ($this->sedangDipinjam === true) {
            return "Buku sedang dipinjam";
        }

        $this->sedangDipinjam = true;

        return "Buku berhasil dipinjam";
    }

    public function kembalikan(): string
    {
        if ($this->sedangDipinjam === false) {
            return "Buku tidak sedang dipinjam";
        }

        $this->sedangDipinjam = false;

        return "Buku berhasil dikembalikan";
    }

    public function getStatus(): string
    {
        if ($this->sedangDipinjam === true) {
            return "Buku sedang dipinjam";
        }

        return "Buku tersedia";
    }

    public function getData(): array
    {
        $kode = $this->kode;
        $judul = $this->judul;
        $penulis = $this->penulis;
        $tahunTerbit = $this->tahunTerbit;
        $status = $this->getStatus();

        return compact(
            'kode',
            'judul',
            'penulis',
            'tahunTerbit',
            'status'
        );
    }
}

$daftarBuku = [
    new Buku("1", "3726 MDPL", "Penulis A", 2025),
    new Buku("2", "YAYAYA", "Penulis B", 2026),
    new Buku("3", "HAHAHA", "Penulis C", 2027)
];

echo $daftarBuku[0]->pinjam() . "<br>";
echo $daftarBuku[0]->pinjam() . "<br>";
echo $daftarBuku[0]->kembalikan() . "<br>";
echo "Status akhir: " . $daftarBuku[0]->getStatus() . "<br>";

echo "<br>";

foreach ($daftarBuku as $buku) {
    $data = $buku->getData();

    echo "Kode : " . $data['kode'] . "<br>";
    echo "Judul : " . $data['judul'] . "<br>";
    echo "Penulis : " . $data['penulis'] . "<br>";
    echo "Tahun terbit : " . $data['tahunTerbit'] . "<br>";
    echo "Status : " . $data['status'] . "<br>";

    echo "<br>";
}

$buku = $daftarBuku[0];

echo $buku->pinjam() . "<br>";
echo $buku->pinjam() . "<br>";
echo $buku->kembalikan() . "<br>";
echo "Status akhir: " . $buku->getStatus();
