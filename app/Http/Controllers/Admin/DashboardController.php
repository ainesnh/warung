<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'totalMenu' => Menu::count(),
            'menuTersedia' => Menu::where('status', 1)->count(),
            'menuTidakTersedia' => Menu::where('status', 0)->count(),
            'menuTerbaru' => Menu::where('status', '<>', -1)
                                    ->latest('id')
                                    ->limit(5)
                                    ->get(),
        ]);
    }
}
