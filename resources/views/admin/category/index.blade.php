@extends('layouts.admin')

@section('main')
    
<form action="{{route('admin.category.add')}}" method="post">
    @csrf
    <label for="category" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <input name=category id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ajouter</button>
    </div>
</form>
    @error('category')
        <p class="text-red-700 p-1 font-serif">{{$message}}Vous devez saisir une categorie!</p>
    @enderror 

<div class="relative py-10 overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

            
            <tr>
                
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Category
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                    </div>
                </th>
                
                
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
                

                
            </tr>
            
                
            
        </thead>
        <tbody>
            
            @forelse ($category as $categories)
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-4">
                        <form action="{{route('admin.category.edit',$categories->id)}}" method="post"> 
                            @csrf  
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"></label>
                            <div class="relative">
                                <input name="id" value="{{$categories->name}}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
                                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">modifier</button>
                            </div>
                        </form>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{route('admin.category.del',$categories->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">X</a>
                    </td>
                </tr>
            @empty

            @endforelse 
        </tbody>
    </table>
</div>


@endsection