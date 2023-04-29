<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Models\category;
use Illuminate\Http\Request;

class VisiteurControlleur extends Controller
{
    public function index()
    {
        $category = category::all();
        $annonce = annonce::all();

        return view('visiteur.bienvenue', compact('category', 'annonce'));
    }

    public function show($id)
    {
        $annonce = annonce::findOrFail($id);
        $category = category::all();


        return view('visiteur.afficher', compact('annonce', 'category'));
    }
}
