<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function api()
    {
        $About = About::firstOrFail();
        return response()->json($About);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view('dashboard.about.about', [
            'title' => 'About Page',
            'about' => About::firstOrFail(),
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

        $validatedData = $request->validate([
            'description' => 'required',
            'tools' => 'nullable|array',
            'framework' => 'nullable|array',

        ]);

        try {
            $validatedData['tools'] = json_encode($request->tools);
            $validatedData['framework'] = json_encode($request->framework);

            $web = $request->has('web') ? 'Active' : 'Inactive';
            $validatedData['web'] = $web;
            $api = $request->has('api') ? 'Active' : 'Inactive';
            $validatedData['api'] = $api;
            $machine = $request->has('machine') ? 'Active' : 'Inactive';
            $validatedData['machine'] = $machine;
            $mobile = $request->has('mobile') ? 'Active' : 'Inactive';
            $validatedData['mobile'] = $mobile;


            About::where('id', $id)->update($validatedData);

            return redirect('/dashboard/about')->with('success', 'Berhasil di Update');
        } catch (\Exception $e) {
            return redirect('/dashboard/about')->with('error', 'Terjadi kesalahan, Silahkan coba lagi.');
        }
    }
}
