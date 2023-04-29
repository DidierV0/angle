@extends('layouts.visiteur')

@section('main')
    <div class="flex">
        <div class="border-2 w-full h-screen">
            <div class="w-full flex justify-center my-5 text-2xl">Mes annonces</div>
            <div class="w-full flex justify-center">
                <a href="{{route('ajouter')}}" class=" bg-orange-400 p-3 rounded-xl">Ajouter une annonce</a>
            </div>
            <div class="mt-10 w-10/12 mx-5 ">
                <div class="">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                    
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Annonce
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Catégorie
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prix
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($annonce as $annonces)
                            <a href="{{route('admin.annonce.aff', $annonces->id)}}">
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">                    
                                    </td>
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full" src="{{Storage::url($annonces->image)}}">
                                        <div class="pl-3">
                                            <div class="text-base font-semibold">{{$annonces->name}}</div>
                                            <div class="font-normal text-gray-500">{{$annonces->user->name}}</div>
                                        </div>  
                                    </th>
                                    
                                    <td class="px-6 py-4">
                                        {{Str::limit($annonces->description),150}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            {{$annonces->category->name}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$annonces->prix}}€
                                    </td>
                                    <td class="px-6 py-4 flex">
                                        <a href="{{route('admin.annonce.aff', $annonces->id)}}" class="font-medium text-gray-600 dark:text-blue-500 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>
                                        <a href="{{route('admin.annonce.edit', $annonces->id)}}" class="font-medium text-gray-600 dark:text-blue-500 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>
                                        <a href="{{route('admin.annonce.del', $annonces->id)}}" class="font-medium text-gray-600 dark:text-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </a>
                                    </td>              
                                </tr> 
                            </a> 
                            @empty
                                <h1>Il n'y a pas d'annonce</h1>
                            @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="border-2 w-full h-60">
            <div class="">
                <div class="w-full flex justify-center">
                    <div class="text-2xl">Mes Favoris</div>
                </div>
            </div>
        </div>
    </div>
@endsection