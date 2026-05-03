<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $menus = $this->availableMenus(limit: 6);

        return view('home', compact('menus'));
    }

    public function menu(): View
    {
        $menus = $this->availableMenus();

        return view('menu.index', compact('menus'));
    }

    private function availableMenus(?int $limit = null): Collection
    {
        try {
            $query = Menu::tersedia()
                ->orderBy('kategori')
                ->orderBy('nama_menu');

            if ($limit !== null) {
                $query->limit($limit);
            }

            return $query->get();
        } catch (QueryException) {
            return collect();
        }
    }
}
