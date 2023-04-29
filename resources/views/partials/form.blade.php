<form 
action="{{!empty($annonce)?route('admin.annonce.upp', $annonce->id):route('ajouter.store')}}" method="post" enctype="multipart/form-data">
    @csrf
        <label for="formTitre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre de l'annonce</label>
        <input type="text" name="formTitre" 
        value="{{!empty($annonce)?$annonce->name:''}}" 
        aria-describedby="helper-text-explanation" class="mb-9 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Titre">
        
        @error('formTitre')
        <p class="text-red-700 p-1 font-serif">Vous devez saisir un titre!</p>
        @enderror


        <label for="formDescription" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea name="formDescription"  placeholder="Ajouter une description"
            class="mb-9 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" cols="30" rows="10">
            {{!empty($annonce)?$annonce->description:''}}
        </textarea>

        

        <label for="formCategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
        <select name="formCategory" class="mb-9 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Choisissez une catégorie</option>
            @forelse ($category as $categories)
                @if (!empty($annonce) && $annonce->category->id == $annonce->category_id)
                    <option value="{{$categories->id}}" selected>{{$categories->name}} </option>
                @else
                    <option value="{{$categories->id}}">{{$categories->name}} </option>
                @endif
            @empty
                <p>Il n'y a pas de catégories</p>
            @endforelse
        </select>

        @error('formCategory')
        <p class="text-red-700 p-1 font-serif">Vous devez choisir une cétégory</p>
        @enderror

        <label for="formPrice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix</label>
        <input type="text" name="formPrice" 
        value="{{!empty($annonce)?$annonce->prix:''}}" 
        aria-describedby="helper-text-explanation" class="mb-9 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        
        @error('formPrice')
        <p class="text-red-700 p-1 font-serif">Vous devez saisir un prix!</p>
        @enderror

        <label for="formImage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ajouter une image</label>
        @isset($annonce)
        <div class="relative h-28 w-28">
            <img
                class="h-full w-full rounded-md object-cover object-center"
                src="{{Storage::url($annonce->image)}}"
            />        
            </div>
        @endisset
        <input type="file" name="formImage" aria-describedby="helper-text-explanation" class="mb-9 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


        <button type="submit" class="w-full my-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Valider</button>
    
    </form>