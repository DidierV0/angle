<div class="w-full flex justify-center">
    <div class="mt-10 w-5/6 flex flex-col items-center justify-center bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="">
            <img class="rounded-t-lg" src="{{Storage::url($annonce->image)}}" alt="" />
        </div>
        <div class="p-5">
            <div>
                <p>
                    <h5 class="mb-0 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$annonce->name}}</h5>
                </p>
                <p class="h-max mb-3 font-normal text-gray-700 dark:text-gray-400">{{$annonce->user->name}}</p>
            </div>
            <p class="h-max mb-3 font-normal text-gray-700 dark:text-gray-400">{{$annonce->description}}</p>
            <div class="flex justify-between">
                <p class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg  focus:outline-none focus:ring-blue-300 dark:bg-blue-600  dark:focus:ring-blue-800">
                    {{$annonce->prix}}€
                </p>
                <p class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:focus:ring-blue-800">
                    {{$annonce->user->email}}
                </p>
            </div>
        </div>
    </div>
</div>