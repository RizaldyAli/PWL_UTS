<?php

namespace App\Http\Controllers;

use App\Models\PerusahaanModel;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = PerusahaanModel::where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('website', 'like', '%' . $request->search . '%')
                ->orWhere('alamat', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->paginate(3);
            return view('perusahaan.perusahaan')
                ->with('prsh', $data);
        }

        $prsh = PerusahaanModel::paginate(3);
        return view('perusahaan.perusahaan')
        ->with('prsh', $prsh);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perusahaan.create_perusahaan')
        ->with('url_form', url('/perusahaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'website' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'alamat' => 'required|string|max:255'
        ]);

        $data = PerusahaanModel::create($request->except(['_token']));

        return redirect('perusahaan')
                ->with('success', 'Data Perusahaan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function show(PerusahaanModel $perusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perusahaan = PerusahaanModel::find($id);
        return view('perusahaan.create_perusahaan')
        ->with('prsh', $perusahaan)
        ->with('url_form', url('/perusahaan/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'website' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'alamat' => 'required|string|max:255'
        ]);

        $data = PerusahaanModel::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('perusahaan')
        ->with ('success', 'Data Perusahaan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PerusahaanModel::where('id', '=', $id)->delete();
        return redirect('perusahaan')
        ->with ('success', 'Data Perusahaan Berhasil Dihapus');
    }
}
