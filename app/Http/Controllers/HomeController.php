<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Database\QueryException;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $settings = \App\Models\Setting::pluck('value', 'key'); // Ambil semua setting
        $specialMenus = Menu::where('is_special', 1)->get();
        $menus = Menu::where('is_special', 0)
                        ->where('status', '<>', -1)
                        ->take(6)
                        ->get();

        return view('home', compact('settings', 'specialMenus', 'menus'));
    }

    public function menu(): View
    {
        $menus = $this->getAvailableMenus(paginate: 12);

        return view('menu.index', compact('menus'));
    }

    private function getAvailableMenus(?int $limit = null, ?int $paginate = null)
    {
        try {
            $query = Menu::tersedia()->orderBy('kategori')->orderBy('nama_menu');

            if ($limit) return $query->limit($limit)->get();
            if ($paginate) return $query->paginate($paginate);
            
            return $query->get();
        } catch (QueryException) {
            return collect();
        }
    }

    private function getSpecialMenus(int $limit = 3)
    {
        try {
            return Menu::tersedia()
                ->where('is_special', 1)
                ->limit($limit)
                ->get();
        } catch (QueryException) {
            return collect();
        }
    }
}