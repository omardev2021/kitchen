@extends('admin.layout.master')
@section('content')

    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                Add New City
            </h2>

            <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
                <form method="POST" action="{{route('cities.store')}}">
                    @csrf
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Jeddah"
                        name="name"
                    />
                    @error('name')
                    <span class="text-red-700 text-xs font-bold dark:text-gray-400 mt-3">{{$message}}</span>

                    @enderror
                </label>


                <button
                    class=" px-5 py-2 text-sm mt-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                    Add City
                </button>

                </form>

            </div>


        </div>


    </main>


@endsection
