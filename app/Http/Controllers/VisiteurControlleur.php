<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use App\Models\category;
use Illuminate\Http\Request;

class VisiteurControlleur extends Controller
{
    public function index($id = 0)
    {
        $categories = category::all();

        $annonce = ($id != 0)? annonce::Where('category_id', $id)->paginate(10): annonce::all();
        // si annonce id est différent de 0 je prend les annonce qui on l'id de category si non je prend tout

        return view('visiteur.bienvenue', compact('categories', 'annonce'));
    }

    public function show($id)
    {
        $annonce = annonce::findOrFail($id);
        $categories = category::all();


        return view('visiteur.afficher', compact('annonce', 'categories'));
    }
}
