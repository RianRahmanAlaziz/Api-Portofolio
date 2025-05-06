<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    public function api()
    {
        $Education = Education::all();

        return response()->json($Education);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Education::query();

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%");
        }
        $education = $query->paginate(10);

        return view('dashboard.education.education', [
            'title' => 'Education Page',
            'education' => $education->appends([
                'search' => $request->input('search'),
            ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.education.add', [
            'title' => 'Add Education',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'univ' => 'required',
            'jurusan' => 'required',
            'from' => 'required', // Pastikan  berupa array
            'to' => 'required',
            'gambar' => 'nullable|array', // Pastikan gambar berupa array
            'gambar.*' => 'image|mimes:jpg,jpeg,png,gif|max:5048', // Validasi untuk setiap file
        ]);

        $univ = Str::slug($request->univ);

        // Mulai transaksi database
        DB::beginTransaction();
        try {
            // Array untuk menyimpan nama gambar
            $imagePaths = [];
            // Loop untuk menyimpan setiap file gambar yang di-upload
            foreach ($request->file('gambar') as $index => $file) {
                // Buat nama gambar unik (misalnya tambahkan index atau timestamp agar tidak bentrok)
                $nama_gambar = $univ . '-' . $index . '.' . $file->getClientOriginalExtension();
                // Pindahkan file ke folder yang sudah dibuat
                $file->move('assets/images/education', $nama_gambar);;
                // Simpan nama gambar ke array
                $imagePaths[] = $nama_gambar;
            }
            // Menambahkan array gambar ke validatedData untuk disimpan di database atau proses lainnya
            $validatedData['gambar'] = json_encode($imagePaths);

            // Menyimpan data produk ke database
            Education::create($validatedData);
            // Commit transaksi jika semuanya berhasil
            DB::commit();
            // Redirect dengan pesan sukses

            // Cek tombol yang ditekan
            if ($request->input('action') === 'save_add') {
                // Redirect ke halaman form tambah produk jika "Save & Add New Product" ditekan
                return redirect('/dashboard/education/create')->with('success', 'Berhasil disimpan! Tambahkan project baru.');
            } else {
                // Redirect ke halaman index produk jika "Save" ditekan
                return redirect('/dashboard/education')->with('success', 'Berhasil di Tambahkan');
            }
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
            foreach ($imagePaths as $gambar) {
                if (file_exists(public_path('assets/images/education/' . $gambar))) {
                    unlink(public_path('assets/images/education/' . $gambar));
                }
            }
            // Kembali ke halaman sebelumnya dengan pesan error
            return redirect()
                ->back()
                ->with(['error' => 'Terjadi kesalahan, Silahkan coba lagi.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return view('dashboard.Education.edit', [
            'title' => 'Edit Education',
            'education' => $education,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'univ' => 'required',
            'jurusan' => 'required',
            'from' => 'required', // Pastikan  berupa array
            'to' => 'required',
            'gambar' => 'nullable|array', // Pastikan gambar berupa array
            'gambar.*' => 'image|mimes:jpg,jpeg,png,gif|max:5048', // Validasi untuk setiap file
        ]);

        $univ = Str::slug($request->univ);

        $folderPath = public_path('assets\images\education');
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0777, true); // Membuat folder dengan izin 0777
        }
        // Mulai transaksi database
        DB::beginTransaction();
        try {
            // Ambil data produk yang akan di-update
            $education = Education::findOrFail($id);
            $existingImages = json_decode($education->gambar, true) ?? []; // Gambar lama

            // Cek jika ada gambar baru
            $newImages = [];
            if ($request->hasFile('gambar')) {
                // Loop untuk menyimpan setiap file gambar yang di-upload
                foreach ($request->file('gambar') as $index => $file) {
                    // Buat nama gambar unik (misalnya tambahkan index atau timestamp agar tidak bentrok)
                    $nama_gambar = uniqid($univ . '-') . '.' . $file->getClientOriginalExtension();

                    // Pindahkan file ke folder yang sudah dibuat
                    $file->move($folderPath, $nama_gambar);
                    // Simpan nama gambar ke array baru
                    $newImages[] = $nama_gambar;
                }
            }

            // Proses gambar yang dihapus oleh user
            $deletedImages = $request->input('deleted_images') ? explode(',', $request->input('deleted_images')) : [];
            foreach ($deletedImages as $image) {
                $path = public_path('assets/images/education/' . $image);
                if (file_exists($path)) {
                    unlink($path);
                }
                if (($key = array_search($image, $existingImages)) !== false) {
                    unset($existingImages[$key]);
                }
            }
            // Gabungkan gambar lama (yang tidak dihapus) dengan yang baru
            $allImages = array_merge(array_values($existingImages), $newImages);
            $validatedData['gambar'] = json_encode($allImages);
            // Update data produk ke database
            $education->update($validatedData);
            // Commit transaksi jika semuanya berhasil
            DB::commit();
            // Redirect dengan pesan sukses

            // Cek tombol yang ditekan
            if ($request->input('action') === 'save_add') {
                // Redirect ke halaman form tambah produk jika "Save & Add New Product" ditekan
                return redirect('/dashboard/education/create')->with('success', 'Berhasil disimpan! Tambahkan project baru.');
            } else {
                // Redirect ke halaman index produk jika "Save" ditekan
                return redirect('/dashboard/education')->with('success', 'Berhasil di Update');
            }
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
            // Hapus file yang sudah diupload jika terjadi error
            // Hapus file baru yang sudah diupload jika terjadi error
            foreach ($newImages as $gambar) {
                if (file_exists(public_path('assets/images/education/' . $gambar))) {
                    unlink(public_path('assets/images/education/' . $gambar));
                }
            }
            // Kembali ke halaman sebelumnya dengan pesan error
            return redirect()
                ->back()
                ->with(['error' => 'Terjadi kesalahan, Silahkan coba lagi.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        // Menangani gambar yang lebih dari satu (misalnya JSON array)
        $gambarPaths = json_decode($education->gambar);
        try {
            foreach ($gambarPaths as $gambar) {
                $imagePath = public_path('assets/images/education/' . $gambar);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Menghapus file gambar
                }
            }
            // Menghapus data produk dari database
            $education->delete();
            return redirect('/dashboard/education')->with('success', 'Data Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/education')->with('error', 'Gagal Menghapus Data. Silakan Coba Lagi.');
        }
    }
}
