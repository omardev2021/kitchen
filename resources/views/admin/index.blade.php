@extends('admin.layout.master')
@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                Dashboard
            </h2>

            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Card -->
                <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                >
                    <div
                        class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                        >
                           Cities
                        </p>
                        <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                        >
                            {{count(App\Models\City::all())}}
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                >
                    <div
                        class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                fill-rule="evenodd"
                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                        >
                            Food Tyoes
                        </p>
                        <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                        >
                            {{count(App\Models\Food::all())}}
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                >
                    <div
                        class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                        >
                            Seeker Requests
                        </p>
                        <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                        >
                            {{count(App\Models\Seeker::all())}}
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                >
                    <div
                        class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                        >
                           Provider Requests
                        </p>
                        <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                        >
                            {{count(App\Models\Provider::all())}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-between">
                <h2
                    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
                >
                    Matchings
                </h2>
                <form method="POST" action="{{route('match')}}">
                    @csrf
                <button
                    class="p-3 text-sm my-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
         type="submit"
                >
                    Generate Matchings
                </button>
                </form>
            </div>




            @foreach($matchings as $matching)

                        @if($matching->score == 7)
                    <div class="bg-white rounded-lg m-4 shadow-md overflow-hidden border border-yellow-500 my-5 relative">
                        <div class="px-4 py-2 flex items-center">
                            <!-- Vertical border -->
                            <span
                                class="absolute inset-y-0 left-0 w-2 bg-yellow-500 rounded-tr-lg rounded-br-lg"
                                aria-hidden="true"
                            ></span>
                        @elseif($matching->score == 9)
                                <div class="bg-white rounded-lg m-4 shadow-md overflow-hidden border border-green-500 my-5 relative">
                                    <div class="px-4 py-2 flex items-center">
                                        <!-- Vertical border -->
                            <span
                                class="absolute inset-y-0 left-0 w-2 bg-green-500 rounded-tr-lg rounded-br-lg"
                                aria-hidden="true"
                            ></span>
                        @else
                                            <div class="bg-white rounded-lg m-4 shadow-md overflow-hidden border border-red-500 my-5 relative">
                                                <div class="px-4 py-2 flex items-center">
                                                    <!-- Vertical border -->
                            <span
                                class="absolute inset-y-0 left-0 w-2 bg-red-500 rounded-tr-lg rounded-br-lg"
                                aria-hidden="true"
                            ></span>
                        @endif


                        <!-- Content section -->
                        <div class="flex-1">
                            <!-- Seeker and Provider Information -->
                            <div class="flex justify-between mb-4">
                                <div>
                                    <p class="text-lg font-semibold text-gray-800">Seeker Information</p>
                                    <p class="text-sm text-gray-600">Name: {{$matching->seeker->name}}</p>
                                    <p class="text-sm text-gray-600">City: {{$matching->seeker->city->name}}</p>
                                    <p class="text-sm text-gray-600">Food Type: {{$matching->seeker->food->name}}</p>
                                </div>
                                <div>
                                    <p class="text-lg font-semibold text-gray-800">Provider Information</p>
                                    <p class="text-sm text-gray-600">Name: {{$matching->provider->name}}</p>
                                    <p class="text-sm text-gray-600">City: {{$matching->provider->city->name}}</p>
                                    <p class="text-sm text-gray-600">Food Type: {{$matching->provider->food->name}}</p>
                                </div>
                            </div>

                            <!-- Matching Score section -->
                            <div>
                                <p class="text-lg font-semibold text-gray-800">Matching Score:</p>
                                <div class="flex items-center">
                                    <p class="text-3xl font-bold text-gray-800">{{$matching->score * 10}}%</p>
                                    <div class="ml-4 flex-1">
                                        <div class="h-3 bg-gray-200 rounded-full">
                                            <div class="h-full bg-green-500 rounded-full" style="width: {{$matching->score * 10}}%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach





        </div>
    </main>


@endsection
