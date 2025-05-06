<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class HomeController extends Controller
{
    public function api()
    {
        $home = Home::firstOrFail();
        return response()->json($home);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard.home.home', [
            'title' => 'Home Page',
            'home' => Home::firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $home = Home::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'cv' => 'nullable|mimes:pdf',
            'description' => 'required',
            'gambar' => 'nullable',
            'cv' => 'nullable',
        ]);
        try {
            if ($request->hasFile('gambar')) {
                File::delete('assets/images/' . $home->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = 'profil' . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images', $nama_gambar);
                // Optimasi gambar setelah dipindahkan
                ImageOptimizer::optimize('assets/images/' . $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            } else {
                // Pindahkan gambar lama ke nama baru jika ada
                $oldImageName = $home->gambar;
                if ($oldImageName) {
                    $extension = pathinfo($oldImageName, PATHINFO_EXTENSION);
                    $nama_gambar = 'profil' . '.' . $extension;
                    File::move('assets/images/' . $oldImageName, 'assets/images/' . $nama_gambar);
                    // Optimasi gambar setelah dipindahkan
                    ImageOptimizer::optimize('assets/images/' . $nama_gambar);
                    $validatedData['gambar'] = $nama_gambar;
                }
            }

            if ($request->has('cv')) {
                File::delete('assets/pdf/' . $home->cv);
                $file = $request->file('cv');
                $nama_file = 'CV' . '.' . $file->getClientOriginalExtension();
                $file->move('assets/pdf', $nama_file);
                $validatedData['cv'] = $nama_file;
            } else {
                // Jika tidak ada gambar baru, ganti nama gambar lama mengikuti title baru
                $oldFileName = $home->cv;
                $extension = pathinfo($oldFileName, PATHINFO_EXTENSION); // Ambil ekstensi gambar lama
                $nama_file = 'CV' . '.' . $extension; // Nama gambar baru sesuai title
                // Pindahkan gambar lama ke nama baru
                File::move('assets/pdf/' . $oldFileName, 'assets/pdf/' . $nama_file);
                // Simpan nama gambar baru di validatedData
                $validatedData['cv'] = $nama_file;
            }

            Home::where('id', $id)->update($validatedData);
            return redirect('/dashboard/home')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/home')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
