<!doctype html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('styles.css')}}">
    <title>Lowkalo Kitchen : Virtual Brands</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-yellow-100 bg-opacity-15">

<nav class="h-20 leading-[5rem] px-3 lg:px-0">
    <div class="flex justify-between items-center container mx-auto">
        <div>
            <a href="#scroll-target" onclick="smoothScroll(event)" class="border-[1px] border-gray-600 w-fit px-10 py-2 rounded-full h-10 leading-10 cursor-pointer">Book Now</a>
        </div>
        <div><h3 class="font-bold">Lowkalo Kitchen</h3></div>

    </div>
    </div>

</nav>
<section class="h-screen  container mx-auto z-10">
    <div class="flex flex-col-reverse lg:flex-row items-center justify-center lg:justify-start ">
        <div class="w-full lg:w-1/2 lg:h-screen ">
            <img src="{{asset('images/main.avif')}}" class="lg:h-screen lg:object-cover lg:w-1/2 lg:right-0 lg:top-20 lg:absolute" />
        </div>
        <div class="w-full lg:w-1/2 px-4 lg:px-10 py-10 lg:py-0 text-left">
            <div class="flex flex-col">

                <hr class="lg:right-0 lg:left-0 lg:top-20 lg:absolute border-t-2 ">
                <div class="">

                    <h1 class="font-bold text-[40px]" >Lowkalo Kitchen</h1>
                    <p>
                        Virtual brands help restaurants boost sales
                    </p>

                </div>
                <hr class="my-10 ">
                <div class="flex bg-gray-200 rounded-lg overflow-hidden mr-5">
                    <!-- Seeker Tab -->
                    <input type="radio" id="seekerTab" name="tab" class="hidden" checked>
                    <label for="seekerTab" class="flex-1 py-2 text-center cursor-pointer tab-label">Seeker</label>

                    <!-- Provider Tab -->
                    <input type="radio" id="providerTab" name="tab" class="hidden">
                    <label for="providerTab" class="flex-1 py-2 text-center cursor-pointer tab-label">Provider</label>
                </div>
                @if(session('success'))
                    <div dir="ltr" class="bg-green-100 m-2 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Seeker Form -->
                <div class="form-container mr-20 pb-10" id="seekerForm">
                    <p class="mt-3 text-gray-600 font-semibold">seeker form : If you intend to expand your business and find restaurants that contain your restaurant’s varieties, fill out the form</p>
                    <form class="pb-10" method="POST" action="{{route('seeker.store')}}">
                        @csrf
                        <input  type="text" name="name" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Full name">
                        @error('name')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror

                        <input  type="text" name="email" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Email">
                        @error('email')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror
                        <input  type="text" name="phone" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Phone">
                        @error('phone')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror
                        <select dir="ltr" name="city_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                            <option selected disabled>select city</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror
                        <select dir="ltr" name="food_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                            <option selected disabled>select food Type</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                        @error('food_id')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror
                        <input  type="number" name="location_no" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Number of locations">
                        @error('location_no')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror


                        <div>

                            <span>   My restaurant has a 4.0 rating on at least one delivery app</span>
                            <input type="checkbox" name="" id="">
                        </div>

                        <button type="submit" class="bg-main p-3 w-full rounded-full mt-4"> GET IN TOUCH</button>
                    </form>
                </div>

                <!-- Provider Form (Initially hidden) -->
                <div class="form-container mr-20 pb-10 " style="display: none;" id="providerForm">
                    <p class="mt-3 text-gray-600 font-semibold">provider form : Fill out the form if you have free space in your restaurant and we will find clients for you</p>

                    <form class="pb-10" method="POST" action="{{route('provider.store')}}">
                        @csrf
                        <input  type="text" name="name" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Full name">
                        @error('name')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror

                        <input  type="text" name="email" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Email">
                        @error('email')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror
                        <input  type="text" name="phone" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Phone">
                        @error('phone')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror
                        <select dir="ltr" name="city_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                            <option selected disabled>select city</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror
                        <select dir="ltr" name="food_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                            <option selected disabled>select food Type</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                        @error('food_id')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror
                        <input  type="number" name="location_no" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Number of locations">
                        @error('location_no')
                        <span class="text-xs font-bold text-red-500">{{$message}}</span>
                        @enderror

                        <div>

                            <span>   My restaurant has a 4.0 rating on at least one delivery app</span>
                            <input type="checkbox" name="" id="">
                        </div>

                        <button type="submit" class="bg-main p-3 w-full rounded-full mt-4"> GET IN TOUCH</button>
                    </form>
                </div>

{{--                <div class="mr-20 pb-10" id="seekerForm">--}}
{{--            --}}
{{--                </div>--}}

            </div>

        </div>
    </div>
</section>
<section class="bg-[#EFD6C3] mt-[484px] lg:mt-4">
    <div class="container mx-auto pt-5" dir="ltr">
        <h2 class="font-bold text-5xl ">How it works</h2>

        <div class="flex flex-col lg:flex-row justify-center items-start mt-10 lg:gap-10">
            <div class="w-full lg:w-1/2 lg:sticky lg:top-20 mb-10 lg:mb-0">
                <img src="{{asset('images/work.avif')}}" class="" />
            </div>

            <div class="w-1/3"></div>
            <div class=" w-full ">
                <div class="flex flex-wrap flex-col gap-y-10 p-5 lg:p-0">
                    <!-- 1 -->
                    <hr class="my-10 border-b-[0.5px] border-gray-400" style=" margin-right: -320px; margin-left: 0px; ">
                    <div class="flex gap-10">
                        <div class="w-10 font-bold text-[30px]">01</div>
                        <div>
                            <h2 class="font-medium text-[30px] w-[60%]">
                                Get matched with the best brands for your business
                            </h2>
                            <p class="w-[80%] mt-5">

                                We match your restaurant with a menu expert to understand which of our brands make the most sense for you based on inventory, location, competition and more. All you have to do is start cookin'!


                            </p>
                        </div>

                    </div>

                    <!-- 2 -->
                    <hr class="my-10 border-b-[0.5px] border-gray-400" style=" margin-right: -320px; margin-left: 0px; ">
                    <div class="flex gap-10">
                        <div class="w-10 font-bold text-[30px]">02</div>
                        <div>
                            <h2 class="font-medium text-[30px] w-[60%]">
                                Let us run the marketing
                            </h2>
                            <p class="w-[80%] mt-5">


                                We promote and market your virtual brands on the delivery apps to ensure you get the eyes you need to boost your bottom line.

                            </p>
                        </div>

                    </div>
                    <!-- 3 -->
                    <hr class="my-10 border-b-[0.5px] border-gray-400" style=" margin-right: -320px; margin-left: 0px; ">
                    <div class="flex gap-10">
                        <div class="w-10 font-bold text-[30px]">03</div>
                        <div>
                            <h2 class="font-medium text-[30px] w-[60%]">
                                Manage more orders with ease
                            </h2>
                            <p class="w-[80%] mt-5">

                                All your delivery orders (virtual & otherwise) come in through Otter: an all-in-one delivery management solution that makes keeping up with endless orders easy.


                            </p>
                        </div>

                    </div>
                    <!-- 4 -->
                    <hr class="my-10 border-b-[0.5px] border-gray-400" style=" margin-right: -320px; margin-left: 0px; ">
                    <div class="flex gap-10">
                        <div class="w-10 font-bold text-[30px]">04</div>
                        <div>
                            <h2 class="font-medium text-[30px] w-[60%]">
                                Grow your order volume & customer base
                            </h2>
                            <p class="w-[80%] mt-5">

                                Delivery drivers pick up orders for your new virtual restaurant just like they would your brick & mortar delivery orders. Get great reviews from happy customers who will keep coming back.

                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#FFFEF5] py-20 container mx-auto text-center">
    <h2 class="text-[20px] font-medium">  Available on every delivery app </h2>
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
                    Unlock a new revenue stream instantly
                </h3>
                <p class="text-base md:text-lg text-gray-800">
                    Use your existing kitchen, staff, and ingredients to sell more orders with virtual brands. No risk, all the rewards.
                </p>
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
                    Brand your best-sellers
                </h3>
                <p class="text-base md:text-lg text-gray-800">
                    Make it easy to find the special items on your menu by leasing an item-specific brand to help hungry customers find exactly what they’re looking for.
                </p>
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
                    Tailored brands for every lifestyle
                </h3>
                <p class="text-base md:text-lg text-gray-800 w-full">
                    Serve the right items to the right people with different brand types for vegetarians, the health-conscious, noodle lovers, and much more.
                </p>
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
                    You cook, we’ll handle the rest
                </h3>
                <p class="text-base md:text-lg text-gray-800 w-full">
                    We maintain and market every brand to drive as much demand as possible. All you have to do is cook the orders that come in. Easy peasy lemon squeezy.
                </p>
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
                            <h6 class="text-white font-medium">BRANDS LEASED</span>
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
                            <h6 class="text-white font-medium">BRANDS LEASED</span>
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
                            <h6 class="text-white font-medium">BRANDS LEASED</span>
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
                            <h6 class="text-white font-medium">BRANDS LEASED</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="h-screen  container mx-auto z-10 mb-[150px] lg:mb-0" id="scroll-target">
    <div class="flex flex-col-reverse lg:flex-row items-center justify-center lg:justify-start ">
        <div class="w-full hidden lg:block lg:mb-8 lg:w-1/2 lg:h-screen ">
            <img src="{{asset('images/main.avif')}}" class="lg:h-screen lg:object-cover lg:w-1/2 lg:right-0 lg:absolute" />
        </div>
        <div class="w-full lg:w-1/2 px-4 lg:px-10 py-10 lg:py-0 text-left">
            <div class="flex flex-col">


                <div class="flex bg-gray-200 rounded-lg overflow-hidden mr-5">
                    <!-- Seeker Tab -->
                    <input type="radio" id="seekerTab2" name="tab" class="hidden" checked>
                    <label for="seekerTab2" class="flex-1 py-2 text-center cursor-pointer tab-label">Seeker</label>

                    <!-- Provider Tab -->
                    <input type="radio" id="providerTab2" name="tab" class="hidden">
                    <label for="providerTab2" class="flex-1 py-2 text-center cursor-pointer tab-label">Provider</label>
                </div>
                @if(session('success'))
                    <div dir="ltr" class="bg-green-100 m-2 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Seeker Form -->
                <div class="form-container mr-20 pb-10" id="seekerForm2">
                    <p class="mt-3 text-gray-600 font-semibold">seeker form : If you intend to expand your business and find restaurants that contain your restaurant’s varieties, fill out the form</p>

                    <form class="pb-10" method="POST" action="{{route('seeker.store')}}">
                        @csrf
                        <input  type="text" name="name" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Full name">


                        <input  type="text" name="email" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Email">

                        <input  type="text" name="phone" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Phone">

                        <select dir="ltr" name="city_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                            <option selected disabled>select city</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>

                        <select dir="ltr" name="food_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                            <option selected disabled>select food Type</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>

                        <input  type="number" name="location_no" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Number of locations">



                        <div>

                            <span>   My restaurant has a 4.0 rating on at least one delivery app</span>
                            <input type="checkbox" name="" id="">
                        </div>

                        <button type="submit" class="bg-main p-3 w-full rounded-full mt-4"> GET IN TOUCH</button>
                    </form>
                </div>

                <!-- Provider Form (Initially hidden) -->
                <div class="form-container mr-20 pb-10 " style="display: none;" id="providerForm2">
                    <p class="mt-3 text-gray-600 font-semibold">provider form : Fill out the form if you have free space in your restaurant and we will find clients for you</p>

                    <form class="pb-10" method="POST" action="{{route('provider.store')}}">
                        @csrf
                        <input  type="text" name="name" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Full name">


                        <input  type="text" name="email" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Email">

                        <input  type="text" name="phone" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Phone">

                        <select dir="ltr" name="city_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                            <option selected disabled>select city</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>

                        <select dir="ltr" name="food_id" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" >
                            <option selected disabled>select food Type</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>

                        <input  type="number" name="location_no" class="w-full my-5 border-b-2 filter border-gray-200 py-2 bg-transparent  focus:outline-none focus:border-black" dir="ltr"  placeholder="Number of locations">


                        <div>

                            <span>   My restaurant has a 4.0 rating on at least one delivery app</span>
                            <input type="checkbox" name="" id="">
                        </div>

                        <button type="submit" class="bg-main p-3 w-full rounded-full mt-4"> GET IN TOUCH</button>
                    </form>
                </div>

                {{--                <div class="mr-20 pb-10" id="seekerForm">--}}
                {{--            --}}
                {{--                </div>--}}

            </div>

        </div>
    </div>
</section>

<footer class="bg-[#262421] text-black py-6 text-center">
    <p class="text-white">All rights reserved © Lowkalo Kitchen</p>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const seekerTab = document.getElementById('seekerTab');
        const providerTab = document.getElementById('providerTab');
        const seekerForm = document.getElementById('seekerForm');
        const providerForm = document.getElementById('providerForm');
        const tabLabels = document.querySelectorAll('.tab-label');

        // Function to show seeker form and mark seekerTab as active
        const showSeekerForm = () => {
            seekerForm.style.display = 'block';
            providerForm.style.display = 'none';
            seekerTab.checked = true;
            updateActiveTabStyle('seeker');
        };

        // Function to show provider form and mark providerTab as active
        const showProviderForm = () => {
            providerForm.style.display = 'block';
            seekerForm.style.display = 'none';
            providerTab.checked = true;
            updateActiveTabStyle('provider');
        };

        // Update active tab style based on activeForm ('seeker' or 'provider')
        const updateActiveTabStyle = (activeForm) => {
            tabLabels.forEach(label => {
                if (label.textContent.toLowerCase() === activeForm) {
                    label.classList.add('active');
                } else {
                    label.classList.remove('active');
                }
            });
        };

        seekerTab.addEventListener('change', showSeekerForm);
        providerTab.addEventListener('change', showProviderForm);

        // Check localStorage for active tab and display corresponding form
        const activeTab = localStorage.getItem('activeTab');
        if (activeTab === 'provider') {
            showProviderForm();
        } else {
            showSeekerForm(); // Default to seeker form
        }

        // Add click event listener to tab labels to update localStorage and active style
        tabLabels.forEach(label => {
            label.addEventListener('click', () => {
                const selectedTab = label.textContent.toLowerCase();
                localStorage.setItem('activeTab', selectedTab);
                updateActiveTabStyle(selectedTab);
            });
        });
    });


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
    document.addEventListener('DOMContentLoaded', () => {
        const seekerTab = document.getElementById('seekerTab2');
        const providerTab = document.getElementById('providerTab2');
        const seekerForm = document.getElementById('seekerForm2');
        const providerForm = document.getElementById('providerForm2');
        const tabLabels = document.querySelectorAll('.tab-label');

        // Function to show seeker form and mark seekerTab as active
        const showSeekerForm = () => {
            seekerForm.style.display = 'block';
            providerForm.style.display = 'none';
            seekerTab.checked = true;
            updateActiveTabStyle('seeker');
        };

        // Function to show provider form and mark providerTab as active
        const showProviderForm = () => {
            providerForm.style.display = 'block';
            seekerForm.style.display = 'none';
            providerTab.checked = true;
            updateActiveTabStyle('provider');
        };

        // Update active tab style based on activeForm ('seeker' or 'provider')
        const updateActiveTabStyle = (activeForm) => {
            tabLabels.forEach(label => {
                if (label.textContent.toLowerCase() === activeForm) {
                    label.classList.add('active');
                } else {
                    label.classList.remove('active');
                }
            });
        };

        seekerTab.addEventListener('change', showSeekerForm);
        providerTab.addEventListener('change', showProviderForm);

        // Check localStorage for active tab and display corresponding form
        const activeTab = localStorage.getItem('activeTab');
        if (activeTab === 'provider') {
            showProviderForm();
        } else {
            showSeekerForm(); // Default to seeker form
        }

        // Add click event listener to tab labels to update localStorage and active style
        tabLabels.forEach(label => {
            label.addEventListener('click', () => {
                const selectedTab = label.textContent.toLowerCase();
                localStorage.setItem('activeTab', selectedTab);
                updateActiveTabStyle(selectedTab);
            });
        });
    });

    function smoothScroll(event) {
        event.preventDefault();
        const targetId = event.currentTarget.getAttribute('href').substring(1);
        const target = document.getElementById(targetId);
        if (target) {
            window.scrollTo({
                top: target.offsetTop,
                behavior: 'smooth'
            });
        }
    }
</script>

</body>
</html>
