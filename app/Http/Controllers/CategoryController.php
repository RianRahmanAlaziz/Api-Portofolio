<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function api()
    {
        $category = Category::all();
        return response()->json($category);
    }

    public function index(Request $request)
    {
        $query = Category::query();

        // Filter berdasarkan pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }
        $project = $query->paginate(10);

        return view('dashboard.category.category', [
            'title' => 'Category',
            'categories' => $project->appends([
                'search' => $request->input('search'),
            ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($validated);

        return redirect()->back()->with('success', 'Category created successfully.');
        // $category = Category::create($validated);

        // return response()->json([
        //     'status' => true,
        //     'message' => 'category Created',
        //     'data' => $category
        // ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            Category::where('id', $id)->update($validatedData);
            return redirect('/dashboard/category')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/category')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        try {
            Category::destroy($category->id);
            return redirect('/dashboard/category')->with('success', 'Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/category')->with('error', 'Gagal Menghapus. Silakan Coba Lagi.');
        }
    }
}
