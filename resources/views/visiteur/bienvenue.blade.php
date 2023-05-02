@extends('layouts.visiteur')

@section('main')

<div class="bg-white w-full h-14">
    
    <ul>
        <div class="flex flex-row justify-center space-x-5 mx-5 pt-2">
            @forelse ($categories as $category)
                <li class="border-b-2 border-r-2 border-gray-300 bg-gray-100 p-2 rounded-md hover:text-blue-700"><a href="{{route('trier', $category->id)}}">{{$category->name}}</a></li>
            @empty
                <h1>Il n'y a pas de catégories</h1>
            @endforelse
        </div>
    </ul>
    
</div>
    
    <div class="border-t-2 pt-5 mt-5 grid grid-cols-3">
        @forelse ($annonce as $annonces)
        <div class="h-auto w-11/12 border-x-2 border-b-2 m-5 rounded-xl">
            <div class="">
                <img src="{{Storage::url($annonces->image)}}" class="rounded-t-2xl p-0">
            </div>
            <div class="">
                <div class="m-3">
                    <div class="text-3xl font-bold hover:text-blue-700">
                        <a href="{{route('annonce', $annonces->id)}}">{{$annonces->name}}</a>
                    </div>
                    
                    <div class="pb-5">
                        {{$annonces->user->name}}
                    </div>
                    <div class="flex flex-row justify-end mx-5 text-2xl">
                        <div class="">
                            {{$annonces->prix}}€
                        </div>                    
                    </div>
                </div>
            </div>
            {{-- <div class="m-10 p-3 bg-blue-800 w-max rounded-xl border-r-2 border-b-2 border-gray-500">
                <a href="{{route('annonce', $annonces->id)}}">Voir ...</a>
            </div> --}}
            <div class="text-lg flex justify-between mx-5">
                <div class="">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    </a>
                </div>
                <div class="">
                    {{$annonces->created_at}}
                </div>                
            </div>
        </div>
    @empty
        
    @endforelse
    </div>

@endsection