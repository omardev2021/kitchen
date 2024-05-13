@extends('admin.layout.master')
@section('content')

    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <div class="flex flex-row justify-between">
                <h2
                    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 "
                >
                    All Seeker Requests
                </h2>


            </div>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                        >
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">email</th>
                            <th class="px-4 py-3">phone</th>
                            <th class="px-4 py-3">city</th>
                            <th class="px-4 py-3">food type</th>
                            <th class="px-4 py-3">locations no</th>
                            <th class="px-4 py-3">Sent At</th>

                        </tr>
                        </thead>
                        <tbody
                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                        >
                        @foreach($requests as $request)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <p class="font-semibold">{{$request->name}}</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="font-semibold">{{$request->email}}</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="font-semibold">{{$request->phone}}</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="font-semibold">{{$request->city->name}}</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="font-semibold">{{$request->food->name}}</p>
                                </td>
                                <td class="px-4 py-3">
                                    <p class="font-semibold">{{$request->location_no}}</p>
                                </td>


                                <td class="px-4 py-3 text-sm">
                                    {{$request->created_at}}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>


        </div>


    </main>


@endsection
