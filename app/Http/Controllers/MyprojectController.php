<?php

namespace App\Http\Controllers;

use App\Models\Myproject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class MyprojectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.myproject.myproject', [
            'title' => 'My Project Page',
            'myproject' => Myproject::firstOrFail(),
        ]);
    }

    public function update(Request $request,  $id)
    {
        $myproject = Myproject::findOrFail($id);

        $validatedData = $request->validate([

            'description' => 'required',
        ]);

        try {
            if ($request->hasFile('gambar')) {
                File::delete('assets/images/' . $myproject->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = 'myproject' . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images', $nama_gambar);
                // Optimasi gambar setelah dipindahkan
                ImageOptimizer::optimize('assets/images/' . $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            } else {
                // Pindahkan gambar lama ke nama baru jika ada
                $oldImageName = $myproject->gambar;
                if ($oldImageName) {
                    $extension = pathinfo($oldImageName, PATHINFO_EXTENSION);
                    $nama_gambar = 'myproject' . '.' . $extension;
                    File::move('assets/images/' . $oldImageName, 'assets/images/myproject/' . $nama_gambar);
                    // Optimasi gambar setelah dipindahkan
                    ImageOptimizer::optimize('assets/images/' . $nama_gambar);
                    $validatedData['gambar'] = $nama_gambar;
                }
            }

            Myproject::where('id', $id)->update($validatedData);
            return redirect('/dashboard/myproject')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/myproject')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
