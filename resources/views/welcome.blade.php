<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مانیتورینگ</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
<div class="flex flex-row justify-between p-2 lg:p-6 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
    <div class="basis-1/12">Logo</div>
    <div class="basis-1/12">
        <h3 class="font-bold text-black">مانیتورینگ</h3>
    </div>
    <!-- header/navigation -->
    <div x-data="{ isOpen: false }" class="basis-5/6">


        <!-- left header section -->
        <div class="">
            <button @click="isOpen = !isOpen" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white lg:hidden" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <div class="hidden space-x-6 lg:inline-block">
                <a href="#" class="text-base text-white ">Menu1</a>
                <a href="#" class="text-base text-white ">Menu2</a>
                <a href="#" class="text-base text-white ">Menu3</a>
                <a href="#" class="text-base text-white ">Menu3</a>
            </div>

            <!-- mobile navbar -->
            <div class="mobile-navbar">
                <!-- navbar wrapper -->
                <div class="fixed left-0 w-full h-48 p-5 bg-white rounded-lg shadow-xl top-16" x-show="isOpen"
                     @click.away=" isOpen = false">
                    <div class="flex flex-col space-y-6">
                        <a href="#" class="text-sm text-black">Menu1</a>
                        <a href="#" class="text-sm text-black">Menu2</a>
                        <a href="#" class="text-sm text-black">Menu3</a>
                        <a href="#" class="text-sm text-black">Menu3</a>
                    </div>
                </div>
            </div>
            <!-- end mobile navbar -->
        </div>
        <!-- right header section -->

    </div>
</div>
@livewireScripts
</body>

</html>
