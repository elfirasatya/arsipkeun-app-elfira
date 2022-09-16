<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Category;
use App\Models\File;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arsips = Arsip::with('file')->with('category')->get();
        return view('arsips.index', compact('arsips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('arsips.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $category = Category::first();
        $request->validate([
            'judul' => 'required',
            'nomor_surat' => 'required',
            'file_surat' => 'required|mimes:pdf'
        ]);
        $data = $request->all();
        if( (int)$data['category_id'] == 0){
            $data['category_id'] = $category->id;
        }
        // Upload File to storage
        $saved_filename = $this->upload($request->file_surat);
        if($saved_filename){
            // save to db
            $saved_file = File::create([
                'filename' => $saved_filename,
                'filepath' => public_path() . $saved_filename
            ]);

            $file_id = $saved_file->id;
            Arsip::create([
                'judul' => $data['judul'],
                'nomor_surat' => $data['nomor_surat'],
                'file_id' => $file_id,
                'category_id' => $data['category_id']
            ]);

            return redirect('/arsip-surat')->with('success', 'Data berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $arsip = Arsip::findOrFail($id);
        return view('arsips.show', compact('arsip'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $arsip = Arsip::find($id);
        $categories = Category::all();
        return view('arsips.edit', compact('arsip', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $arsip = Arsip::find($id);
        $category = Category::first();
        $request->validate([
            'judul' => 'required',
            'nomor_surat' => 'required',
        ]);
        $data = $request->all();
        if( (int)$data['category_id'] == 0){
            $data['category_id'] = $category->id;
        }
        // Upload File to storage
        $changed_file_id = $arsip->file->id;
        // if upload new file
        if($request->file('file_surat')){
            $saved_filename = $this->upload($request->file_surat);
            
            if($saved_filename){
                // save to db
                $saved_file = File::create([
                    'filename' => $saved_filename,
                    'filepath' => public_path() . $saved_filename
                ]);

                $file = File::find($arsip->file->id);
                if(file_exists(public_path('uploads/' . $file->filename))){
                    unlink(public_path('uploads/' . $file->filename));
                }
                $file->delete();
                $changed_file_id = $saved_file->id;
            }
        }
        $arsip->fill([
            'judul' => $data['judul'],
            'nomor_surat' => $data['nomor_surat'],
            'file_id' => $changed_file_id,
            'category_id' => $data['category_id']
        ]);
        $arsip->save();
        return redirect('/arsip-surat')->with('success', 'Data berhasil diupdate');
    }

    public function view_pdf($filename){
        return response()->file(public_path('uploads/'. $filename));
    }
    public function download($id){
        $arsip = Arsip::findOrFail($id);
        $file = public_path('uploads/' . $arsip->file->filename);
        $headers = array(
            'Content-Type: application/pdf',
          );
        return response()->download($file, $arsip->file->filename, $headers);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $arsip = Arsip::find($id);
        $file_id = $arsip->file_id;
        $arsip->delete();
        $file = File::find($file_id);
        if(file_exists(public_path('uploads/' . $file->filename))){
            unlink(public_path('uploads/' . $file->filename));
        }
        $file->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Delete Data'
        ]);
    }
}
