<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $menus = Menu::tersedia()->latest()->limit(6)->get();

        return view('home', compact('menus'));
    }

    public function menu(): View
    {
        $menus = Menu::tersedia()
            ->orderBy('kategori')
            ->orderBy('nama_menu')
            ->get();

        return view('menu.index', compact('menus'));
    }
}
