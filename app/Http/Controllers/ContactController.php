<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.contact.contact', [
            'title' => 'Contact Page',
            'contact' => Contact::firstOrFail(),
        ]);
    }


    public function update(Request $request,  $id)
    {
        $contact = Contact::findOrFail($id);

        $validatedData = $request->validate([
            'description' => 'required',
            'email' => 'required',
            'github' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
        ]);

        try {
            if ($request->hasFile('gambar')) {
                File::delete('assets/images/' . $contact->gambar);
                $gambar = $request->file('gambar');
                $nama_gambar = 'contact' . '.' . $gambar->getClientOriginalExtension();
                $gambar->move('assets/images', $nama_gambar);
                // Optimasi gambar setelah dipindahkan
                ImageOptimizer::optimize('assets/images/' . $nama_gambar);
                $validatedData['gambar'] = $nama_gambar;
            } else {
                // Pindahkan gambar lama ke nama baru jika ada
                $oldImageName = $contact->gambar;
                if ($oldImageName) {
                    $extension = pathinfo($oldImageName, PATHINFO_EXTENSION);
                    $nama_gambar = 'contact' . '.' . $extension;
                    File::move('assets/images/' . $oldImageName, 'assets/images/' . $nama_gambar);
                    // Optimasi gambar setelah rename
                    ImageOptimizer::optimize('assets/images/' . $nama_gambar);
                    $validatedData['gambar'] = $nama_gambar;
                }
            }


            Contact::where('id', $id)->update($validatedData);
            return redirect('/dashboard/contact')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/contact')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
