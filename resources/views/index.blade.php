<!doctype html>

    <html dir="{{Config::get('app.locale') == 'en' ? 'ltr' : 'rtl'}}">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('styles.css')}}">
    <title>Lowkalo Kitchen : Virtual Brands</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>


    <body class="bg-yellow-100 bg-opacity-15 {{Config::get('app.locale') == 'en' ? 'font-poppins' : 'font-arabic'}} ">


<nav class="h-20 leading-[5rem] px-3 lg:px-0">
    <div class="flex justify-between items-center container mx-auto">

        <div class="flex-1"><h3 class="font-bold">{{__('messages.kitchen')}}</h3></div>


        <div>
            <a href="#scroll-target" onclick="smoothScroll(event)" class="border-[1px] border-gray-600 w-fit px-10 py-2 rounded-full h-10 leading-10 cursor-pointer">{{__('messages.book')}}</a>
        </div>
        <div class="mx-2">
            <x-language-switcher />
        </div>

    </div>


</nav>
<section class="h-full  container mx-auto z-10">
    <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-start ">

        <div class="w-full lg:w-1/2 px-4 lg:px-10 py-10 lg:py-0 text-left">



                        <div class="w-full {{Config::get('app.locale') == 'en' ? 'text-left' : 'text-right'}}">

            <div class="flex flex-col">

                <hr class="lg:right-0 lg:left-0 lg:top-20 lg:absolute border-t-2 ">
                <div class="py-5">

                    <h1 class="font-bold text-[40px]" >{{__('messages.kitchen')}}</h1>
                    <p>
                        {{__('messages.kitchenContent')}}
                    </p>

                </div>
                <hr class="my-10 ">
                @if(session('success'))
                    <div dir="ltr" class="bg-green-100 m-2 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif


                <div class="mx-auto w-full">
                    <div class="flex  border-b border-gray-200">
                        <!-- Tab 1 -->
                        <button id="tab1" class="flex-grow py-2 px-4 bg-white font-semibold border-b-2 border-transparent hover:border-main focus:outline-none">{{ __('messages.seeker') }}</button>
                        <!-- Tab 2 -->
                        <button id="tab2" class="flex-grow py-2 px-4 bg-white font-semibold border-b-2 border-transparent hover:border-main focus:outline-none">{{ __('messages.provider') }}</button>
                    </div>

                    <!-- Tab Content -->
                    <div id="tabContent1" class="hidden mt-4">
                        <p class="mt-3 text-gray-600 font-semibold text-sm">{{ __('messages.seekerContent') }}</p>
                        <form class="pb-10" method="POST" action="{{route('seeker.store')}}">
                            @csrf
                            <input  type="text" name="name" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"   placeholder="{{ __('messages.name') }}">
                            @error('name')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror

                            <input  type="text" name="email" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"  placeholder="{{ __('messages.email') }}">
                            @error('email')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                            <input  type="text" name="phone" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"   placeholder="{{ __('messages.phone') }}">
                            @error('phone')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror

                            <select  name="food_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                                <option selected disabled>{{ __('messages.food') }}</option>
                                @foreach($foods as $food)
                                    <option value="{{$food->id}}">{{Config::get('app.locale') == 'en' ? $food->name : $food->name_ar}}</option>
                                @endforeach
                            </select>
                            @error('food_id')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                            <input  type="number" name="location_no" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"  placeholder="{{ __('messages.locations') }}">
                            @error('location_no')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                            <select  name="city_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                                <option selected disabled>{{ __('messages.city') }}</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{Config::get('app.locale') == 'en' ? $city->name : $city->name_ar}}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror

                          <div class="flex flex-col">
                              <label for="countries" class="mb-3">{{ __('messages.cities') }}</label>

                              <select name="cities[]" id="countries" class="mt-3" multiple >
                                  @foreach($cities as $city)
                                      <option value="{{$city->id}}">{{Config::get('app.locale') == 'en' ? $city->name : $city->name_ar}}</option>
                                  @endforeach
                              </select>
                              @error('cities')
                              <span class="text-xs font-bold text-red-500">{{$message}}</span>
                              @enderror
                          </div>


                            <button type="submit" class="bg-main p-3 w-full rounded-full mt-4"> {{ __('messages.button') }}</button>
                        </form>
                    </div>
                    <div id="tabContent2" class="hidden mt-4">
                        <p class="mt-3 text-gray-600 font-semibold text-sm">{{ __('messages.providerContent') }}</p>

                        <form class="pb-10" method="POST" action="{{route('provider.store')}}">
                            @csrf
                            <input  type="text" name="name" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"   placeholder="{{ __('messages.name') }}">
                            @error('name')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror

                            <input  type="text" name="email" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"  placeholder="{{ __('messages.email') }}">
                            @error('email')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                            <input  type="text" name="phone" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"   placeholder="{{ __('messages.phone') }}">
                            @error('phone')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror

                            <select  name="food_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                                <option selected disabled>{{ __('messages.food') }}</option>
                                @foreach($foods as $food)
                                    <option value="{{$food->id}}">{{Config::get('app.locale') == 'en' ? $food->name : $food->name_ar}}</option>
                                @endforeach
                            </select>
                            @error('food_id')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                            <input  type="number" name="location_no" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"  placeholder="{{ __('messages.locations') }}">
                            @error('location_no')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                            <select  name="city_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                                <option selected disabled>{{ __('messages.city') }}</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{Config::get('app.locale') == 'en' ? $city->name : $city->name_ar}}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror




                            <button type="submit" class="bg-main p-3 w-full rounded-full mt-4"> {{ __('messages.button') }}</button>
                        </form>                    </div>
                </div>





            </div>

        </div>
        <div class="w-full lg:w-1/2  z-1">
                <img src="{{asset('images/main.avif')}}" class="lg:h-[1000px] lg:rounded-xl lg:object-cover lg:w-1/2  lg:top-20 lg:absolute {{Config::get('app.locale') == 'en' ? 'lg:right-0' : 'lg:left-0'}}" />

        </div>
    </div>
</section>
<section class="bg-[#EFD6C3]  lg:mt-4 z-2">
    <div class="container mx-auto pt-5" >
        <h2 class="font-bold text-5xl ">{{__('messages.how')}}</h2>

        <div class="flex flex-col lg:flex-row justify-center items-start mt-10 lg:gap-10">
            <div class="w-full lg:w-1/2 lg:sticky lg:top-20 mb-10 lg:mb-0">
                <img src="{{asset('images/work.avif')}}" class="" />
            </div>

            <div class="w-1/3"></div>
            <div class=" w-full ">
                <div class="flex flex-wrap flex-col gap-y-10 p-5 lg:p-0">
                    <!-- 1 -->
                    <hr class="my-10 border-b-[0.5px] border-gray-400" style="  {{Config::get('app.locale') == 'en' ? 'margin-right: -320px; margin-left: 0px;' : 'margin-left: -320px; margin-right: 0px;'}}">
                    <div class="flex gap-10">
                        <div class="w-10 font-bold text-[30px]">01</div>
                        <div>
                            <h2 class="font-medium text-[30px] w-[60%]">
                                {{__('messages.firstStep')}}
                            </h2>
                            <p class="w-[80%] mt-5">

                                {{__('messages.firstStepContent')}}

                            </p>
                        </div>

                    </div>

                    <!-- 2 -->
                    <hr class="my-10 border-b-[0.5px] border-gray-400" style="  {{Config::get('app.locale') == 'en' ? 'margin-right: -320px; margin-left: 0px;' : 'margin-left: -320px; margin-right: 0px;'}}">
                    <div class="flex gap-10">
                        <div class="w-10 font-bold text-[30px]">02</div>
                        <div>
                            <h2 class="font-medium text-[30px] w-[60%]">
                                {{__('messages.secondStep')}}
                            </h2>
                            <p class="w-[80%] mt-5">


                                {{__('messages.secondStepContent')}}
                            </p>
                        </div>

                    </div>
                    <!-- 3 -->
                    <hr class="my-10 border-b-[0.5px] border-gray-400" style="  {{Config::get('app.locale') == 'en' ? 'margin-right: -320px; margin-left: 0px;' : 'margin-left: -320px; margin-right: 0px;'}}">
                    <div class="flex gap-10">
                        <div class="w-10 font-bold text-[30px]">03</div>
                        <div>
                            <h2 class="font-medium text-[30px] w-[60%]">
                                {{__('messages.thirdStep')}}
                            </h2>
                            <p class="w-[80%] mt-5">

                                {{__('messages.thirdStepContent')}}

                            </p>
                        </div>

                    </div>
                    <!-- 4 -->
                    <hr class="my-10 border-b-[0.5px] border-gray-400" style="  {{Config::get('app.locale') == 'en' ? 'margin-right: -320px; margin-left: 0px;' : 'margin-left: -320px; margin-right: 0px;'}}">
                    <div class="flex gap-10">
                        <div class="w-10 font-bold text-[30px]">04</div>
                        <div>
                            <h2 class="font-medium text-[30px] w-[60%]">
                                {{__('messages.fourthStep')}}
                            </h2>
                            <p class="w-[80%] mt-5">

                                {{__('messages.fourthStepContent')}}

                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#FFFEF5] py-20 container mx-auto text-center">
    <h2 class="text-[20px] font-medium">   {{__('messages.logos')}} </h2>
    <div class="flex flex-col lg:flex-row lg:justify-between lg:my-16 items-center">
        <div > <img class="my-3 lg:my-0" src="{{asset('images/logo.svg')}}" /> </div>
        <div > <img class="my-3 lg:my-0"  src="{{asset('images/logo.svg')}}" /> </div>
        <div > <img class="my-3 lg:my-0" src="{{asset('images/logo.svg')}}" /> </div>
        <div> <img class="my-3 lg:my-0" src="{{asset('images/logo.svg')}}" /> </div>
    </div>
</section>


<section class="bg-[#87A1A5] p-5">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Content Column -->
            <div class="text-center md:text-left">
                <h3 class="text-2xl md:text-3xl text-gray-800 font-bold mb-4">
                    {{__('messages.main1')}}
                </h3>
                <p class="text-base md:text-lg text-gray-800">
                    {{__('messages.main1c')}}             </p>
            </div>

            <!-- Image Column -->
            <div class="mt-4 md:mt-0">
                <img src="{{ asset('images/1.avif') }}" class="w-full" alt="Image">
            </div>
        </div>
    </div>
</section>

<section class="bg-[#FFFEF5]">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Image Column -->
            <div>
                <img src="{{ asset('images/2.avif') }}" class="w-full" alt="Image">
            </div>
            <!-- Content Column -->
            <div class="text-center md:text-left">
                <h3 class="text-2xl md:text-3xl text-gray-800 font-bold mb-4">
                    {{__('messages.main2')}}
                </h3>
                <p class="text-base md:text-lg text-gray-800">
                    {{__('messages.main2c')}}                </p>
            </div>


        </div>
    </div>
</section>


<section class="bg-[#87A1A5] p-5">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Content Column -->
            <div class="flex flex-col justify-center items-center text-center md:text-left">
                <h3 class="text-2xl md:text-3xl text-gray-800 font-bold mb-4 w-full">
                    {{__('messages.main3')}}                </h3>
                <p class="text-base md:text-lg text-gray-800 w-full">
                    {{__('messages.main3c')}}                </p>
            </div>

            <!-- Image Column -->
            <div>
                <img src="{{ asset('images/1.avif') }}" class="w-full" alt="Image">
            </div>
        </div>
    </div>
</section>

<section class="bg-[#FFFEF5] p-5">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Image Column -->
            <div>
                <img src="{{ asset('images/2.avif') }}" class="w-full" alt="Image">
            </div>

            <!-- Content Column -->
            <div class="flex flex-col justify-center items-center text-center md:text-left">
                <h3 class="text-2xl md:text-3xl text-gray-800 font-bold mb-4 w-full">
                    {{__('messages.main4')}}                </h3>
                <p class="text-base md:text-lg text-gray-800 w-full">
                    {{__('messages.main4c')}}                </p>
            </div>
        </div>
    </div>
</section>


<section class="bg-[#262421]" dir="ltr">
    <div class="container mx-auto py-10">
        <div class="grid grid-cols-4">
            <div >
                <div class="flex text-white justify-center items-start gap-10">
                    <div>
                        <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.50776 0.191458L3.53341 2.16675L13.9229 2.14109L0.532004 15.532L1.96858 16.9686L15.3595 3.57767L15.3595 13.9415L17.3091 13.9415L17.3091 0.191461L3.50776 0.191458Z" fill="#FFFEF5"></path></svg>
                    </div>
                    <div class="text-white flex flex-col ">
                        <h3 class="text-white font-bold text-[30px]">12</span>
                            <h6 class="text-white font-medium">{{__('messages.stats')}}</span>
                    </div>
                </div>
            </div>
            <div >
                <div class="flex text-white justify-center items-start gap-10">
                    <div>
                        <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.50776 0.191458L3.53341 2.16675L13.9229 2.14109L0.532004 15.532L1.96858 16.9686L15.3595 3.57767L15.3595 13.9415L17.3091 13.9415L17.3091 0.191461L3.50776 0.191458Z" fill="#FFFEF5"></path></svg>
                    </div>
                    <div class="text-white flex flex-col ">
                        <h3 class="text-white font-bold text-[30px]">12</span>
                            <h6 class="text-white font-medium">{{__('messages.stats')}}</span>
                    </div>
                </div>
            </div>
            <div >
                <div class="flex text-white justify-center items-start gap-10">
                    <div>
                        <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.50776 0.191458L3.53341 2.16675L13.9229 2.14109L0.532004 15.532L1.96858 16.9686L15.3595 3.57767L15.3595 13.9415L17.3091 13.9415L17.3091 0.191461L3.50776 0.191458Z" fill="#FFFEF5"></path></svg>
                    </div>
                    <div class="text-white flex flex-col ">
                        <h3 class="text-white font-bold text-[30px]">12</span>
                            <h6 class="text-white font-medium">{{__('messages.stats')}}</span>
                    </div>
                </div>
            </div>
            <div >
                <div class="flex text-white justify-center items-start gap-10">
                    <div>
                        <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.50776 0.191458L3.53341 2.16675L13.9229 2.14109L0.532004 15.532L1.96858 16.9686L15.3595 3.57767L15.3595 13.9415L17.3091 13.9415L17.3091 0.191461L3.50776 0.191458Z" fill="#FFFEF5"></path></svg>
                    </div>
                    <div class="text-white flex flex-col ">
                        <h3 class="text-white font-bold text-[30px]">12</span>
                            <h6 class="text-white font-medium">{{__('messages.stats')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="h-screen  container mx-auto z-10 mb-[150px] lg:mb-0" id="scroll-target">
    <div class="flex flex-col-reverse lg:flex-row items-center justify-center lg:justify-start ">
        <div class="w-full hidden lg:block lg:mb-8 lg:w-1/2 lg:h-screen ">
            <img src="{{asset('images/main.avif')}}" class="lg:h-screen lg:object-cover lg:w-1/2 {{Config::get('app.locale') == 'en' ? 'lg:left-0' : 'lg:right-0'}} lg:absolute" />
        </div>
        <div class="w-full lg:w-1/2 px-4 lg:px-10 py-10 lg:py-0 text-left">
            <div class="flex flex-col">

                <div class="mx-auto w-full">
                    <div class="flex  border-b border-gray-200">
                        <!-- Tab 1 -->
                        <button id="tab11" class="flex-grow py-2 px-4 bg-white font-semibold border-b-2 border-transparent hover:border-main focus:outline-none">{{ __('messages.seeker') }}</button>
                        <!-- Tab 2 -->
                        <button id="tab22" class="flex-grow py-2 px-4 bg-white font-semibold border-b-2 border-transparent hover:border-main focus:outline-none">{{ __('messages.provider') }}</button>
                    </div>

                    <!-- Tab Content -->
                    <div id="tabContent11" class="hidden mt-4">
                        <p class="mt-3 text-gray-600 font-semibold text-sm">{{ __('messages.seekerContent') }}</p>
                        <form class="pb-10" method="POST" action="{{route('seeker.store')}}">
                            @csrf
                            <input  type="text" name="name" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"   placeholder="{{ __('messages.name') }}">
                            @error('name')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror

                            <input  type="text" name="email" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"  placeholder="{{ __('messages.email') }}">
                            @error('email')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                            <input  type="text" name="phone" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"   placeholder="{{ __('messages.phone') }}">
                            @error('phone')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror

                            <select  name="food_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                                <option selected disabled>{{ __('messages.food') }}</option>
                                @foreach($foods as $food)
                                    <option value="{{$food->id}}">{{Config::get('app.locale') == 'en' ? $food->name : $food->name_ar}}</option>
                                @endforeach
                            </select>
                            @error('food_id')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                            <input  type="number" name="location_no" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"  placeholder="{{ __('messages.locations') }}">
                            @error('location_no')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                            <select  name="city_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                                <option selected disabled>{{ __('messages.city') }}</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{Config::get('app.locale') == 'en' ? $city->name : $city->name_ar}}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror

                            <div class="flex flex-col">
                                <label for="countries" class="mb-3">{{ __('messages.cities') }}</label>

                                <select name="cities" id="countries2" class="mt-3" multiple >
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{Config::get('app.locale') == 'en' ? $city->name : $city->name_ar}}</option>
                                    @endforeach
                                </select>
                                @error('cities')
                                <span class="text-xs font-bold text-red-500">{{$message}}</span>
                                @enderror
                            </div>


                            <button type="submit" class="bg-main p-3 w-full rounded-full mt-4"> {{ __('messages.button') }}</button>
                        </form>
                    </div>
                    <div id="tabContent22" class="hidden mt-4">
                        <p class="mt-3 text-gray-600 font-semibold text-sm">{{ __('messages.providerContent') }}</p>

                        <form class="pb-10" method="POST" action="{{route('provider.store')}}">
                            @csrf
                            <input  type="text" name="name" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"   placeholder="{{ __('messages.name') }}">
                            @error('name')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror

                            <input  type="text" name="email" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"  placeholder="{{ __('messages.email') }}">
                            @error('email')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                            <input  type="text" name="phone" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"   placeholder="{{ __('messages.phone') }}">
                            @error('phone')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror

                            <select  name="food_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                                <option selected disabled>{{ __('messages.food') }}</option>
                                @foreach($foods as $food)
                                    <option value="{{$food->id}}">{{Config::get('app.locale') == 'en' ? $food->name : $food->name_ar}}</option>
                                @endforeach
                            </select>
                            @error('food_id')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                            <input  type="number" name="location_no" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black"  placeholder="{{ __('messages.locations') }}">
                            @error('location_no')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror
                            <select  name="city_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                                <option selected disabled>{{ __('messages.city') }}</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{Config::get('app.locale') == 'en' ? $city->name : $city->name_ar}}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                            <span class="text-xs font-bold text-red-500">{{$message}}</span>
                            @enderror




                            <button type="submit" class="bg-main p-3 w-full rounded-full mt-4"> {{ __('messages.button') }}</button>
                        </form>                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<footer class="bg-[#262421] text-black py-6 text-center">
    <p class="text-white">{{__('messages.footer')}}</p>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get all input elements of type 'number' within the document
        const numberInputs = document.querySelectorAll('input[type="number"]');

        // Add input event listener to each number input
        numberInputs.forEach(input => {
            input.addEventListener('input', () => {
                const inputValue = input.value;

                // Convert input value to a number
                const numberValue = parseInt(inputValue);

                // Check if the number is positive and valid
                if (numberValue > 0) {
                    // Update the input value to the valid number
                    input.value = numberValue;
                } else {
                    // If the input is invalid, reset it to an empty string or display an error message
                    input.value = ''; // Reset the input
                    // Alternatively, you can display an error message to the user
                    // Example: alert('Please enter a positive number.');
                }
            });
        });
    });
</script>





<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get tab buttons and tab content
        const tab1Button = document.getElementById('tab1');
        const tab2Button = document.getElementById('tab2');
        const tabContent1 = document.getElementById('tabContent1');
        const tabContent2 = document.getElementById('tabContent2');

        // Show Tab 1 content and hide Tab 2 content on page load
        tabContent1.style.display = 'block';
        tabContent2.style.display = 'none';

        // Style the active tab button (Tab 1)
        tab1Button.classList.add('border-main');
        tab1Button.classList.remove('border-transparent');

        // Reset styles for inactive tab button (Tab 2)
        tab2Button.classList.remove('border-main');
        tab2Button.classList.add('border-transparent');

        // Event listener for Tab 1 button
        tab1Button.addEventListener('click', () => {
            // Show Tab 1 content and hide Tab 2 content
            tabContent1.style.display = 'block';
            tabContent2.style.display = 'none';

            // Style the active tab button (Tab 1)
            tab1Button.classList.add('border-main');
            tab1Button.classList.remove('border-transparent');

            // Reset styles for inactive tab button (Tab 2)
            tab2Button.classList.remove('border-main');
            tab2Button.classList.add('border-transparent');
        });

        // Event listener for Tab 2 button
        tab2Button.addEventListener('click', () => {
            // Show Tab 2 content and hide Tab 1 content
            tabContent1.style.display = 'none';
            tabContent2.style.display = 'block';

            // Style the active tab button (Tab 2)
            tab2Button.classList.add('border-main');
            tab2Button.classList.remove('border-transparent');

            // Reset styles for inactive tab button (Tab 1)
            tab1Button.classList.remove('border-main');
            tab1Button.classList.add('border-transparent');
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get tab buttons and tab content
        const tab1Button = document.getElementById('tab11');
        const tab2Button = document.getElementById('tab22');
        const tabContent1 = document.getElementById('tabContent11');
        const tabContent2 = document.getElementById('tabContent22');

        // Show Tab 1 content and hide Tab 2 content on page load
        tabContent1.style.display = 'block';
        tabContent2.style.display = 'none';

        // Style the active tab button (Tab 1)
        tab1Button.classList.add('border-main');
        tab1Button.classList.remove('border-transparent');

        // Reset styles for inactive tab button (Tab 2)
        tab2Button.classList.remove('border-main');
        tab2Button.classList.add('border-transparent');

        // Event listener for Tab 1 button
        tab1Button.addEventListener('click', () => {
            // Show Tab 1 content and hide Tab 2 content
            tabContent1.style.display = 'block';
            tabContent2.style.display = 'none';

            // Style the active tab button (Tab 1)
            tab1Button.classList.add('border-main');
            tab1Button.classList.remove('border-transparent');

            // Reset styles for inactive tab button (Tab 2)
            tab2Button.classList.remove('border-main');
            tab2Button.classList.add('border-transparent');
        });

        // Event listener for Tab 2 button
        tab2Button.addEventListener('click', () => {
            // Show Tab 2 content and hide Tab 1 content
            tabContent1.style.display = 'none';
            tabContent2.style.display = 'block';

            // Style the active tab button (Tab 2)
            tab2Button.classList.add('border-main');
            tab2Button.classList.remove('border-transparent');

            // Reset styles for inactive tab button (Tab 1)
            tab1Button.classList.remove('border-main');
            tab1Button.classList.add('border-transparent');
        });
    });
</script>



<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
<script>
    new MultiSelectTag('countries', {
        rounded: true,    // default true
        shadow: true,      // default false
        placeholder: 'Search',  // default Search...
        tagColor: {
            textColor: '#000000',
            borderColor: '#92e681',
            bgColor: '#2eff00',
        },
        onChange: function(values) {
            console.log(values)
        }
    })
</script>

<script>
    new MultiSelectTag('countries2', {
        rounded: true,    // default true
        shadow: true,      // default false
        placeholder: 'Search',  // default Search...
        tagColor: {
            textColor: '#000000',
            borderColor: '#92e681',
            bgColor: '#2eff00',
        },
        onChange: function(values) {
            console.log(values)
        }
    })
</script>
</body>
</html>
