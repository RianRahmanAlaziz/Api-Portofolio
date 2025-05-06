<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExperienceController extends Controller
{
    public function api()
    {
        $Experience = Experience::all();

        return response()->json($Experience);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Experience::query();

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%");
        }
        $experience = $query->paginate(10);

        return view('dashboard.experience.experience', [
            'title' => 'Work Experience Page',
            'experience' => $experience->appends([
                'search' => $request->input('search'),
            ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.experience.add', [
            'title' => 'Add Work Education',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'jabatan' => 'required',
            'tech' => 'required|array', // Pastikan  berupa array
            'pekerjaan' => 'required', // Pastikan gambar berupa array
            'desc' => 'nullable',
            'from' => 'required', // Pastikan  berupa array
            'to' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $validatedData['tech'] = json_encode($request->tech);

            // Menyimpan data produk ke database
            Experience::create($validatedData);
            // Commit transaksi jika semuanya berhasil
            DB::commit();
            // Redirect dengan pesan sukses

            // Cek tombol yang ditekan
            if ($request->input('action') === 'save_add') {
                // Redirect ke halaman form tambah produk jika "Save & Add New Product" ditekan
                return redirect('/dashboard/experience/create')->with('success', 'Berhasil disimpan! Tambahkan project baru.');
            } else {
                // Redirect ke halaman index produk jika "Save" ditekan
                return redirect('/dashboard/experience')->with('success', 'Berhasil di Tambahkan');
            }
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            // Kembali ke halaman sebelumnya dengan pesan error
            return redirect()
                ->back()
                ->with(['error' => 'Terjadi kesalahan, Silahkan coba lagi.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('dashboard.experience.edit', [
            'title' => 'Edit Experience',
            'experience' => $experience,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required',
            'jabatan' => 'required',
            'tech' => 'required|array', // Pastikan  berupa array
            'pekerjaan' => 'required', // Pastikan gambar berupa array
            'desc' => 'nullable',
            'from' => 'required', // Pastikan  berupa array
            'to' => 'required',
        ]);

        // Mulai transaksi database
        DB::beginTransaction();
        try {
            // Ambil data produk yang akan di-update
            $experience = Experience::findOrFail($id);

            $validatedData['tech'] = json_encode($request->tech);
            // Update data produk ke database
            $experience->update($validatedData);
            // Commit transaksi jika semuanya berhasil
            DB::commit();
            // Redirect dengan pesan sukses

            // Cek tombol yang ditekan
            if ($request->input('action') === 'save_add') {
                // Redirect ke halaman form tambah produk jika "Save & Add New Product" ditekan
                return redirect('/dashboard/experience/create')->with('success', 'Berhasil disimpan! Tambahkan project baru.');
            } else {
                // Redirect ke halaman index produk jika "Save" ditekan
                return redirect('/dashboard/experience')->with('success', 'Berhasil di Update');
            }
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

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
        $experience = Experience::findOrFail($id);
        try {
            // Menghapus data produk dari database
            $experience->delete();
            return redirect('/dashboard/experience')->with('success', 'Data Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/experience')->with('error', 'Gagal Menghapus Data. Silakan Coba Lagi.');
        }
    }
}
