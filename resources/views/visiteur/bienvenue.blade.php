@extends('layouts.visiteur')

@section('main')

<div class="bg-white w-full h-14">
    
    <ul>
        <div class="flex flex-row justify-center space-x-5 mx-5 pt-2">
            @forelse ($category as $categories)
            <li class="border-b-2 border-r-2 border-gray-300 bg-gray-100 p-2 rounded-md hover:text-blue-700"><a href="">{{$categories->name}}</a></li>
            @empty
                <h1>Il n'y a pas de catégories</h1>
            @endforelse
        </div>
    </ul>
    
</div>
    
    <div class="border-t-2 pt-5 mt-5 grid grid-cols-3">
        @forelse ($annonce as $annonces)
        <div class="h-max w-11/12 border-x-2 border-b-2 m-5 rounded-xl">
            <div class="">
                <img src="{{Storage::url($annonces->image)}}" class="rounded-t-2xl p-0">
            </div>
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
            {{-- <div class="m-10 p-3 bg-blue-800 w-max rounded-xl border-r-2 border-b-2 border-gray-500">
                <a href="{{route('annonce', $annonces->id)}}">Voir ...</a>
            </div> --}}
            <div class="text-lg flex justify-end mr-2">
                <div class="">
                    {{$annonces->created_at}}
                </div>                
            </div>
        </div>
    @empty
        
    @endforelse
    </div>

@endsection