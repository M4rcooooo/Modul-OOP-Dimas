<?php

namespace App\Http\Controllers;

use App\Services\ProdukService;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    protected ProdukService $produkService;

    public function __construct(ProdukService $produkService)
    {
        $this->produkService = $produkService;
    }

    public function index()
    {
        $produk        = $this->produkService->getAllProduk();
        $tersedia      = $this->produkService->getTersedia();
        $jumlahProduk  = $this->produkService->getJumlahProduk();
        $stokTerbanyak = $this->produkService->getStokTerbanyak();

        return view('produk.index', compact(
            'produk', 'tersedia', 'jumlahProduk', 'stokTerbanyak'
        ));
    }

     public function byKategori(string $kategori)
    {
        $produk = $this->produkService->getProdukByKategori($kategori);

        return view('produk.index', compact('produk'))
            ->with('judul', "Produk kategori: $kategori");
    }

   
    public function tersedia()
    {
        $produk = $this->produkService->getTersedia();

        return view('produk.index', compact('produk'))
            ->with('judul', 'Produk yang masih tersedia');
    }

   
    public function hargaDiAtas(int $harga)
    {
        $produk = $this->produkService->getByHargaDiAtas($harga);

        return view('produk.index', compact('produk'))
            ->with('judul', "Produk dengan harga di atas Rp" . number_format($harga, 0, ',', '.'));
    }

       public function jumlah()
    {
        $jumlahProduk = $this->produkService->getJumlahProduk();

        return view('produk.jumlah', compact('jumlahProduk'));
    }

   
    public function stokTerbanyak()
    {
        $produk = $this->produkService->getStokTerbanyak();

        return view('produk.stok-terbanyak', compact('produk'));
    }
}