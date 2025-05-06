<?php

namespace App\Http\Controllers;

use App\Models\Aboutme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class AboutmeController extends Controller
{
    public function api()
    {
        $Aboutme = Aboutme::firstOrFail();
        return response()->json($Aboutme);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.aboutme.aboutme', [
            'title' => 'About Me Page',
            'aboutme' => Aboutme::firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $aboutme = Aboutme::findOrFail($id);

        $validatedData = $request->validate([

            'description' => 'required',
        ]);

        try {
            if ($request->hasFile('gambar')) {
                File::delete('assets/images/' . $aboutme->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = 'aboutme' . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images', $nama_gambar);
                // Optimasi gambar setelah dipindahkan
                ImageOptimizer::optimize('assets/images/' . $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            } else {
                // Pindahkan gambar lama ke nama baru jika ada
                $oldImageName = $aboutme->gambar;
                if ($oldImageName) {
                    $extension = pathinfo($oldImageName, PATHINFO_EXTENSION);
                    $nama_gambar = 'aboutme' . '.' . $extension;
                    File::move('assets/images/' . $oldImageName, 'assets/images/' . $nama_gambar);
                    // Optimasi gambar setelah dipindahkan
                    ImageOptimizer::optimize('assets/images/' . $nama_gambar);
                    $validatedData['gambar'] = $nama_gambar;
                }
            }


            Aboutme::where('id', $id)->update($validatedData);
            return redirect('/dashboard/aboutme')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/aboutme')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
