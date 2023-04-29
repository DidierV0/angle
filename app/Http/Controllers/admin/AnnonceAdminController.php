<?php

namespace App\Http\Controllers\admin;

use App\Models\annonce;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnonceAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::all();
        $annonce = Annonce::all();

        return view('admin.annonce.lister', compact('category', 'annonce'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::all();

        return view('admin.annonce.ajouter', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $annonce = new Annonce;

        $annonce->user_id = Auth::user()->id;

        $request->validate(['formTitre'=>'required|min:5']);
        $annonce->name = $request->formTitre;

        $annonce->description = $request->formDescription;

        $request->validate(['formCategory' =>'required|max:3']);
        $annonce->category_id = $request->formCategory;

        $annonce->prix = $request->formPrice;

        $fileName = $request->formImage->store('public/images');
        $annonce->image = $fileName; 

        $annonce->save();

        return redirect(route('admin.annonce'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id = 0)
    {
        $category = category::all();
        $annonce = annonce::findOrFail($id);

        return view('admin.annonce.afficher', compact('category', 'annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id = 0)
    {
        $category = category::all();
        $annonce = Annonce::findOrFail($id);

        return view('admin.annonce.modifier', compact('category', 'annonce'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $annonce = Annonce::findOrFail($id) ;

        $request->validate(['formTitre'=>'required|min:5']);
        
        if ($request->file()) {
            
            if($annonce->image!= ''){
                Storage::delete($annonce->image);
            }

            $fileName = $request->formImage->store('public/images');
            $annonce->image = $fileName;            
        }

        $annonce->description = $request->formDescription;

        $request->validate(['formCategory' =>'required|max:3']);
        $annonce->category_id = $request->formCategory;

        $annonce->prix = $request->formPrice;

        $annonce->update();

        return redirect(route('admin.annonce'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id = 0)
    {
        $annonce = Annonce::findOrFail($id);
        $annonce->delete();

        return redirect('admin.annonce.lister');

    }
}
