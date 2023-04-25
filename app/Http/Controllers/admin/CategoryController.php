<?php

namespace App\Http\Controllers\admin;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::orderBy('created_at','asc')->paginate(10);

        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    
        $request->validate(['category'=>'required|min:5']);
        $category = new Category;
        $category->name =  $request->category;
        $category->icone = 'icone';
        $category->save();

        return Redirect::route('admin.category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id = 0)
    {
        $category = Category::findOrFail($id);
        $request->validate(['id'=>'required|min:5']);

        $category->name = $request->id;
        $category->icone = 'icone';

        $category->update();

        return Redirect::route('admin.category');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return Redirect::route('admin.category');
    }
}
