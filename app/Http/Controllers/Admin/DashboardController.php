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
            'menuTersedia' => Menu::where('status', 'tersedia')->count(),
            'menuTidakTersedia' => Menu::where('status', 'tidak_tersedia')->count(),
            'menuTerbaru' => Menu::latest()->limit(5)->get(),
        ]);
    }
}
