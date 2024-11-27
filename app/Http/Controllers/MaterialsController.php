<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Materials;
use Illuminates\Validation\Rules\Unique;
use Symfony\Component\Mime\Message;

class MaterialsController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kelas' => 'required|string|max:255',
            'deskripsi_kelas' => 'required|string',
            'estimasi_selesai' => 'required|integer',
            'jumlah_latihan' => 'required|integer',
            'rating' => 'nullable|numeric|min:0|max:5',
            'kategori' => 'required|string',
        ]);

        $class = Materials::create($request->all());
        return response()->json($class, 201);
    }

    public function show($id){
        $class = Materials::findOrFail($id);
        return response()->json($class);
    }

    public function index(Request $request){
        $query = Materials::query();

        if($request->has('kategori')){
            $query->where('kategori', $request->kategori);
        }
        $classes = $query->get();
        return response()->json($classes);
        
    }


    public function update(Request $request, $id){
        $class = Materials::findOrFail($id);
        $this->validate($request,[
            'nama_kelas' => 'sometimes|required|string|max:255',
            'deskripsi_kelas' => 'sometimes|required|string',
            'estimasi_selesai' => 'sometimes|required|integer',
            'jumlah_latihan' => 'sometimes|required|integer',
            'rating' => 'sometimes|nullable|numeric|min:0|max:5',
            'kategori' => 'sometimes|required|string',
        ]);
        $class->update($request->all());
        return response()->json(['Message' => 'Data kelas berhasil diupdate.']);
    }

    public function destroy($id)
    {
        $class = Materials::findOrFail($id);
        $class -> delete();
        return response()->json(['Message' => 'Kelas berhasil dihapus.']);
    }

    public function register($id){
        $class = Materials::findOrFail($id);
        $class->increment('pengguna_terdaftar');
        return response()->json(['message'=>'sukses mendaftar']);
    }

} 