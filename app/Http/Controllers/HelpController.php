<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminates\Validation\Rules\Unique;
use App\Models\Help;

class HelpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function submitHelpForm(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:15',
            'course_name' => 'required|string|max:255',
            'deskripsi_masalah' => 'required|string',
        ]);
        $help = Help::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'course_name' => $request->course_name,
            'deskripsi_masalah' => $request->deskripsi_masalah,
            'users_id' => $request->user()->id
        ]);
        return response()->json(['message' => 'Form berhasil disubmit'], 201);
    }

    public function getHelpForm(){
        $helps = Help::all();

        return response()->json($helps);
    }
}