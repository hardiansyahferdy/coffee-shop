<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (Welcome Page) untuk pengunjung.
     */
    public function index()
    {
        // Mengambil semua menu/produk dari database
        $products = Product::all();

        // Mengirim data ke view welcome.blade.php
        return view('welcome', compact('products'));
    }
}