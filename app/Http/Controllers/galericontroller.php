<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\galeri;
use Illuminate\Support\Facades\Storage;

class galericontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datagaleri = galeri::latest();
        return view('backend.galeri.index',[
            "title" => 'Galeri',
            'datagaleri' => $datagaleri->paginate(8)->withQueryString()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.galeri.create',[
            "title" => 'Create'
        ]); 
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
        $data = $request->validate([
            'image' => 'required|image|file|max:1024',
            
        ]);

        $galeris = new galeri();
        $galeris->image = $request->file('image')->store('galeri'); 

        $galeris->save();

        return redirect('/dashboard/galeri')->with('success', 'data created successfully!!');
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
        $data = galeri::findOrFail($id);
        return view('backend.galeri.show', compact('data'),[
            'title' => 'Show'
        ]);
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
        $data = galeri::findOrFail($id);
        return view('backend.galeri.edit', compact('data'),[
            'title' => 'Edit'
        ]);
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
        $data = $request->validate([

            'image' => 'required|image|file|max:1024'

        ]);
        
        $galeris = galeri::findOrFail($id);
        if ($request->file('image')) {
            if ($request->oldimage) {
                Storage::delete($request->oldimage);
            }
            $galeris->image = $request->file('image')->store('galeri'); 
        }
        $galeris->save();

        return redirect('/dashboard/galeri')->with('success', 'data created successfully!!');
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
        $galeris = galeri::findOrFail($id);
        if ($galeris->image) {
            Storage::delete($galeris->image);
        }
        $galeris->delete();
        return redirect()->route('backend.galeri.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
