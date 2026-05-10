<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'all_active');

        $query = Menu::query();

        if ($status == 'all_active') {
            $query->whereIn('status', [0, 1]);
        } elseif ($status == 'archived') {
            $query->where('status', -1);
        }

        $menus = $query->latest()->paginate(10);

        return view('admin.menus.index', compact('menus', 'status'));
    }

    public function create(): View
    {
        return view('admin.menus.create', ['menu' => new Menu()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['gambar'] = $this->uploadImage($request);

        Menu::create($data);

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(Menu $menu): View
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu): RedirectResponse
    {
        $data = $this->validatedData($request);
        $image = $this->uploadImage($request);

        if ($image !== null) {
            $this->deleteImage($menu);
            $data['gambar'] = $image;
        }

        $menu->update($data);

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function deactivate(Menu $menu)
    {
        $menu->update(['status' => -1]);
        return redirect()->back()->with('success', 'Menu berhasil dinonaktifkan.');
    }

    public function destroy(Menu $menu): RedirectResponse
    {
        $this->deleteImage($menu);
        $menu->delete();

        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil dihapus.');
    }

    public function toggleStatus(Menu $menu)
    {
        if ($menu->status == -1) {
            $menu->update([
                'status' => 1
            ]);

            return redirect()->back()->with('success', 'Menu berhasil dipulihkan.');
        }

        $newStatus = $menu->status == 1 ? 0 : 1;
        $menu->update([
            'status' => $newStatus
        ]);

        return response()->json([
            'success' => true,
            'new_status' => $menu->status
        ]);
    }

    public function toggleSpecial(Menu $menu)
    {
        if (!$menu->is_special) {
            Menu::query()->update(['is_special' => 0]);
            
            $menu->update(['is_special' => 1]);
        } else {
            $menu->update(['is_special' => 0]);
        }

        return response()->json([
            'success' => true,
            'is_special' => $menu->is_special
        ]);
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'nama_menu' => ['required', 'string', 'max:255'],
            'kategori'  => ['required', 'string', 'max:100'],
            'harga'     => ['required', 'numeric', 'min:0'],
            'deskripsi' => ['nullable', 'string'],
            'status'    => ['required', 'boolean'], // Diubah ke boolean
            'is_special'=> ['required', 'boolean'], // Tambahkan kolom baru
            'gambar'    => ['nullable', 'image', 'max:2048'],
        ]);
    }

    private function uploadImage(Request $request): ?string
    {
        if (! $request->hasFile('gambar')) {
            return null;
        }

        $file = $request->file('gambar');
        File::ensureDirectoryExists(public_path('uploads/menu'));

        $baseName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $name = time() . '-' . Str::slug($baseName) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/menu'), $name);

        return 'uploads/menu/' . $name;
    }

    private function deleteImage(Menu $menu): void
    {
        if ($menu->gambar && File::exists(public_path($menu->gambar))) {
            File::delete(public_path($menu->gambar));
        }
    }
}
