<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function api()
    {
        $projects = Project::all();
        $projects = $projects->map(function ($project) {
            $project->tech = json_decode($project->tech, true);  // Decode JSON ke array
            $project->gambar = json_decode($project->gambar, true);  // Decode JSON ke array
            return $project;
        });

        return response()->json($projects);
    }



    public function index(Request $request)
    {
        $query = Project::query();

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%");
        }
        $project = $query->paginate(10);

        return view('dashboard.projects.index', [
            'title' => 'Dashboard',
            'project' => $project->appends([
                'search' => $request->input('search'),
            ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.projects.add', [
            'title' => 'Add Project',
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:projects',
            'category_id' => 'required',
            'tech' => 'required|array', // Pastikan  berupa array
            'gambar' => 'required|array', // Pastikan gambar berupa array
            'gambar.*' => 'image|mimes:jpg,jpeg,png,gif|max:5048', // Validasi untuk setiap file
            'thumbnail' => 'image|mimes:jpg,jpeg,png,gif|max:5048',
            'desc' => 'nullable',
            'year' => 'required',
            'preview' => 'nullable',
            'code' => 'nullable',
        ]);
        $status = $request->has('status') ? 'Active' : 'Inactive';
        $validatedData['status'] = $status;
        $title = Str::slug($request->title);

        $folderPath = 'project';
        // Mulai transaksi database
        DB::beginTransaction();
        try {
            // Array untuk menyimpan nama gambar
            $imagePaths = [];
            // Loop untuk menyimpan setiap file gambar yang di-upload
            foreach ($request->file('gambar') as $index => $file) {
                // Buat nama gambar unik (misalnya tambahkan index atau timestamp agar tidak bentrok)
                $nama_gambar = $title . '-' . $index . '.' . $file->getClientOriginalExtension();
                // Pindahkan file ke folder yang sudah dibuat
                $file->storeAs('public/' . $folderPath, $nama_gambar);
                // Simpan nama gambar ke array
                $imagePaths[] = $nama_gambar;
            }
            // Menambahkan array gambar ke validatedData untuk disimpan di database atau proses lainnya
            $validatedData['gambar'] = json_encode($imagePaths);

            // Proses untuk file thumbnail
            if ($request->hasFile('thumbnail')) {
                $thumbnailFile = $request->file('thumbnail');
                $thumbnailName = $title . '-thumbnail.' . $thumbnailFile->getClientOriginalExtension();
                $thumbnailFile->storeAs('public/' . $folderPath, $thumbnailName);
                $validatedData['thumbnail'] = $thumbnailName;
            }
            $validatedData['tech'] = json_encode($request->tech);

            // Menyimpan data produk ke database
            Project::create($validatedData);
            // Commit transaksi jika semuanya berhasil
            DB::commit();
            // Redirect dengan pesan sukses

            // Cek tombol yang ditekan
            if ($request->input('action') === 'save_add') {
                // Redirect ke halaman form tambah produk jika "Save & Add New Product" ditekan
                return redirect('/dashboard/project/create')->with('success', 'Project berhasil disimpan! Tambahkan project baru.');
            } else {
                // Redirect ke halaman index produk jika "Save" ditekan
                return redirect('/dashboard/project')->with('success', 'Project Berhasil di Tambahkan');
            }
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
            // Hapus file yang sudah diupload jika terjadi error
            foreach ($imagePaths as $gambar) {
                Storage::delete('public/' . $folderPath . '/' . $gambar);
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
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', [
            'title' => 'Edit project',
            'project' => $project,
            'category' => Category::all()
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
            'slug' => 'required|unique:projects,slug,' . $id,
            'category_id' => 'required',
            'tech' => 'nullable|array', // Pastikan  berupa array
            'gambar' => 'nullable|array', // Pastikan gambar berupa array
            'gambar.*' => 'image|mimes:jpg,jpeg,png,gif|max:5048', // Validasi untuk setiap file
            'thumbnail' => 'image|mimes:jpg,jpeg,png,gif|max:5048',
            'desc' => 'nullable',
            'year' => 'required',
            'preview' => 'nullable',
            'code' => 'nullable',
        ]);

        $status = $request->has('status') ? 'Active' : 'Inactive';
        $validatedData['status'] = $status;
        $title = Str::slug($request->title);

        $folderPath = public_path('assets\images\project');
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0777, true); // Membuat folder dengan izin 0777
        }
        // Mulai transaksi database
        DB::beginTransaction();
        try {
            // Ambil data produk yang akan di-update
            $project = Project::findOrFail($id);
            $existingImages = json_decode($project->gambar, true) ?? []; // Gambar lama

            // Cek jika ada gambar baru
            $newImages = [];
            if ($request->hasFile('gambar')) {
                // Loop untuk menyimpan setiap file gambar yang di-upload
                foreach ($request->file('gambar') as $index => $file) {
                    // Buat nama gambar unik (misalnya tambahkan index atau timestamp agar tidak bentrok)
                    $nama_gambar = $title . '-' . $index . '.' . $file->getClientOriginalExtension();
                    // Pindahkan file ke folder yang sudah dibuat
                    $file->move($folderPath, $nama_gambar);
                    // Simpan nama gambar ke array baru
                    $newImages[] = $nama_gambar;
                }
            }

            // Proses gambar yang dihapus oleh pengguna
            $deletedImagesString = $request->input('deleted_images', ''); // Ambil string
            $deletedImages = $deletedImagesString ? explode(',', $deletedImagesString) : []; // Pecah menjadi array
            foreach ($deletedImages as $image) {
                // Hapus file dari folder
                if (file_exists(public_path('assets/images/project/' . $image))) {
                    unlink(public_path('assets/images/project/' . $image));
                }
                // Hapus dari array gambar lama
                if (($key = array_search($image, $existingImages)) !== false) {
                    unset($existingImages[$key]);
                }
            }
            // Gabungkan gambar lama yang tersisa dengan gambar baru
            $allImages = array_merge($existingImages, $newImages);
            $validatedData['gambar'] = json_encode($allImages);

            if ($request->has('thumbnail')) {
                File::delete('assets/images/product/' . $project->thumbnail);
                $thumbnailFile = $request->file('thumbnail');
                $thumbnailName = $title . '-thumbnail.' . $thumbnailFile->getClientOriginalExtension();
                $thumbnailFile->move($folderPath, $thumbnailName);
                $validatedData['thumbnail'] = $thumbnailName;
            }

            $validatedData['tech'] = json_encode($request->tech);

            // Update data produk ke database
            $project->update($validatedData);
            // Commit transaksi jika semuanya berhasil
            DB::commit();
            // Redirect dengan pesan sukses

            // Cek tombol yang ditekan
            if ($request->input('action') === 'save_add') {
                // Redirect ke halaman form tambah produk jika "Save & Add New Product" ditekan
                return redirect('/dashboard/project/create')->with('success', 'Project berhasil disimpan! Tambahkan project baru.');
            } else {
                // Redirect ke halaman index produk jika "Save" ditekan
                return redirect('/dashboard/project')->with('success', 'Project Berhasil di Update');
            }
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
            // Hapus file yang sudah diupload jika terjadi error
            // Hapus file baru yang sudah diupload jika terjadi error
            foreach ($newImages as $gambar) {
                if (file_exists(public_path('assets/images/project/' . $gambar))) {
                    unlink(public_path('assets/images/project/' . $gambar));
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
        $project = Project::findOrFail($id);

        // Menangani gambar yang lebih dari satu (misalnya JSON array)
        $gambarPaths = json_decode($project->gambar);
        try {
            // Menghapus gambar dari folder
            foreach ($gambarPaths as $gambar) {
                $imagePath = public_path('assets/images/project/' . $gambar);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Menghapus file gambar
                }
            }

            File::delete('assets/images/project/' . $project->datasheet);
            // Menghapus data produk dari database
            $project->delete();
            return redirect('/dashboard/project')->with('success', 'Data Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/project')->with('error', 'Gagal Menghapus Data. Silakan Coba Lagi.');
        }
    }
    public function checkslug(Request $request)
    {
        $slug = SlugService::createSlug(Project::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
