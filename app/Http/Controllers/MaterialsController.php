<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Materials;
use Illuminates\Validation\Rules\Unique;
use Symfony\Component\Mime\Message;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Barryvdh\DomPDF\Facade\Pdf;
use phpoffice\PhpWord;
use App\Models\Videos;
use App\Models\Quiz;
use App\Models\QuizOption;
use App\Models\Note;



class MaterialsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $user = auth()->user();

        if($user->materials()->where('materials_id', $class->id)->exists()) {
            return response()->json(['message' => 'Anda sudah terdaftar di kelas ini.'], 400);
        }

        $user->materials()->attach($class->id);
        $class->increment('pengguna_terdaftar');
        return response()->json(['message'=>'sukses mendaftar']);
    }

    public function myMaterials(){
        $user = auth()->user();
        $materials = $user->materials;

        return response()->json($materials);
    }
    
    public function uploadVideo(Request $request, $id) {
        $this->validate($request, [
            'judul_video' => 'required|string|max :255',
            'jalur_file' => 'required|url', 
        ]);
        $material = Materials::findOrFail($id);
        $video = Videos::create([
            'materials_id' => $material->id,
            'judul_video' => $request->judul_video,
            'jalur_file' => $request->jalur_file,
        ]);
        return response()->json($video, 201);
    }
    public function createQuiz(Request $request, $id) {
        
        $this->validate($request, [
            'pertanyaan' => 'required|string',
            'options' => 'required|array|min:2|max:5',
            'options.*.text' => 'required|string',
            'options.*.is_correct' => 'required|boolean',
        ]);
    
        $material = Materials::findOrFail($id);
        
        $quiz = Quiz::create([
            'materials_id' => $material->id, 
            'pertanyaan' => $request->pertanyaan
        ]);
    
        foreach ($request->options as $option) {
            $quiz->options()->create([
                'teks_jawaban' => $option['text'],
                'jawaban_benar' => $option['is_correct'],
                'quizzes_id' => $quiz->id // Pastikan menggunakan 'quizzes_id'
            ]);
        }
    
        return response()->json($quiz, 201);
    }
    public function createNote(Request $request, $id) {
        $this->validate($request, [
            'konten' => 'required|string',
        ]);
        $material = Materials::findOrFail($id);
        $note = Note::create([
            'materials_id' => $material->id,
            'users_id' => auth()->id(),
            'konten' => $request->konten,
        ]);
        return response()->json($note, 201);
    }
    public function getNotes($id) {
        $material = Materials::findOrFail($id);
        $notes = $material->notes()->where('users_id', auth()->id())->get();
        return response()->json($notes);
    }
    public function updateNote(Request $request, $noteId) {
        $note = Note::findOrFail($noteId);
        $this->validate($request,[
            'konten' => 'required|string',
        ]);
        $note->update(['konten' => $request->konten]);
        return response()->json(['message' => 'Catatan berhasil diperbarui.']);
    }
    public function deleteNote($noteId) {
        $note = Note::findOrFail($noteId);
        $note->delete();
        return response()->json(['message' => 'Catatan berhasil dihapus.']);
    }
    public function downloadNote($noteId, $format)
{
    $note = Note::findOrFail($noteId);
    $storagePath = storage_path('app/public/');

    if ($format === 'pdf') {
        // Membuat PDF
        $pdf = PDF::loadHTML('<h1>Note ID: ' . $note->id . '</h1><p>' . $note->konten . '</p>');
        $pdfFileName = 'note_' . $note->id . '.pdf';
        $pdfFilePath = $storagePath . $pdfFileName;
        $pdf->save($pdfFilePath);

        // Mengembalikan file PDF untuk diunduh
        return response()->download($pdfFilePath, $pdfFileName, [
            'Content-Type' => 'application/pdf'
        ])->deleteFileAfterSend(true);
    } elseif ($format === 'word') {
        // Membuat Word Document
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $section->addText('Note ID: ' . $note->id);
        $section->addText($note->konten);
        $wordFileName = 'note_' . $note->id . '.docx';
        $wordFilePath = $storagePath . $wordFileName;
        $phpWord->save($wordFilePath, 'Word2007');

        // Mengembalikan file Word untuk diunduh
        return response()->download($wordFilePath, $wordFileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ])->deleteFileAfterSend(true);
    }

    return response()->json(['message' => 'Format not supported.'], 400);
}
}