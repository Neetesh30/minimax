{{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    @foreach($menuItems as $menuItem)
        @include('filament-menu-builder::components.bootstrap5.menu-item', ['item' => $menuItem])
    @endforeach
</ul> --}}



@php
// Robust fallback
if (isset($items)) {
} elseif (isset($menu) && (isset($menu->items) || (is_array($menu) && array_key_exists('items', $menu)))) {
    $items = isset($menu->items) ? $menu->items : $menu['items'];
} elseif (isset($menuItems)) {
    $items = $menuItems;
} else {
    $items = collect();
}

if (!is_iterable($items)) $items = collect($items);

$getProp = fn($item, $keys=['label','title','name'],$default='') =>
    collect($keys)->map(fn($k)=>is_array($item)?($item[$k]??null):($item->$k??null))->filter()->first()??$default;

$getUrl = fn($item) =>
    $getProp($item,['url','link','path'],'#');

$getChildren = fn($item) =>
    collect(is_object($item)?($item->children??[]):($item['children']??[]));
@endphp


<header class="fixed top-0 w-full flex bg-white border-b border-gray-300 sm:px-6 px-4 min-h-[64px] tracking-wide z-50">
    <div class="flex max-w-screen-xl mx-auto w-full">
        <div class="flex flex-wrap items-center lg:gap-y-2 gap-4 w-full">
            
            <!-- Logo -->
            <a href="{{ route('home') }}" class="max-sm:hidden">
                <img src="{{ asset('front/images/minimax-logo.png') }}" alt="logo" class="w-36" />
            </a>
            <a href="{{ route('home') }}" class="hidden max-sm:block">
                <img src="{{ asset('front/images/minimax-logo.png') }}" class="w-20" alt="logo" />
            </a>

            <!-- Navigation -->
            <div id="collapseMenu"
                class="lg:ml-6 h-full place-content-center max-lg:hidden lg:!block max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 max-lg:before:inset-0 max-lg:before:z-50">

                <!-- Close button for mobile -->
                <button id="toggleClose"
                    class="lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white w-9 h-9 flex items-center justify-center border border-gray-200 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 fill-black" viewBox="0 0 320.591 320.591">
                        <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"/>
                        <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"/>
                    </svg>
                </button>

                <!-- DYNAMIC MENU INJECTION -->
                <ul class="h-full lg:place-items-center lg:flex lg:gap-x-3 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:shadow-md max-lg:overflow-auto z-50">

                    <!-- Mobile Logo -->
                    <li class="mb-6 hidden max-lg:block">
                        <div class="flex items-center justify-between gap-4">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('front/images/minimax-logo.png') }}" alt="logo" class="w-36" />
                            </a>
                        </div>
                    </li>

                    <!-- LOOP ALL MENU ITEMS -->
                    @foreach($items as $item)
                        @php
                            $title = $getProp($item);
                            $url   = $getUrl($item);
                            $children = $getChildren($item);
                            $isMega = strtolower($title) == 'products';
                        @endphp

                        {{-- MEGA MENU (Products) --}}
                        @if($isMega && count($children))
                            <li class="group lg:h-full place-content-center py-3 px-3 max-lg:relative max-lg:border-b max-lg:border-black">

                                <a href="{{ $url }}" data-menu-link="mega-menu"
                                    class="text-slate-900 hover:text-slate-900 text-[15px] block font-medium max-lg:flex max-lg:items-center max-lg:justify-between">
                                    {{ $title }}
                                    <svg class="w-3 h-3 lg:hidden mobile-chevron" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </a>

                                <div id="mega-menu"
                                    class="mega-content smooth-toggle hidden lg:block absolute w-full shadow-lg bg-white px-6 py-10 top-16 right-0 left-0 z-50
                                        opacity-0 scale-95 pointer-events-none 
                                        group-hover:opacity-100 group-hover:scale-100 group-hover:pointer-events-auto
                                        transition-all duration-200 ease-out
                                        max-lg:block max-lg:relative max-lg:opacity-100 max-lg:scale-100 max-lg:mt-3">

                                    <div class="max-w-screen-xl mx-auto grid lg:grid-cols-4 gap-10 max-lg:px-3">

                                            @foreach($children as $col)
                                                @php
                                                    $colTitle = $getProp($col);
                                                    $grandChildren = $getChildren($col);
                                                @endphp

                                                <div>
                                                    <h6 class="text-white bg-red-600 px-4 py-2 rounded-md font-bold text-sm mb-4">
                                                        {{ strtoupper($colTitle) }}
                                                    </h6>

                                                    @if(count($grandChildren))
                                                        <ul class="space-y-4 text-slate-700 text-sm">

                                                            @foreach($grandChildren as $row)
                                                                @php
                                                                    $rowTitle = $getProp($row);
                                                                    $rowUrl   = $getUrl($row);
                                                                    $subChildren = $getChildren($row);
                                                                @endphp

                                                                <li class="font-semibold">
                                                                    <a href="{{ $rowUrl }}" class="hover:text-red-600 block">
                                                                        {{ $rowTitle }}
                                                                    </a>
                                                                </li>

                                                                {{-- THIRD LEVEL --}}
                                                                @if(count($subChildren))
                                                                    <ul class="ml-4 space-y-1 text-slate-500">
                                                                        @foreach($subChildren as $sub)
                                                                            @php
                                                                                $sTitle = $getProp($sub);
                                                                                $sUrl   = $getUrl($sub);
                                                                            @endphp
                                                                            <li>
                                                                                <a href="{{ $sUrl }}" class="hover:text-slate-800">
                                                                                    {{ $sTitle }}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif

                                                            @endforeach

                                                        </ul>
                                                    @endif

                                                </div>

                                            @endforeach

                                        </div>

                                </div>

                            </li>

                        {{-- SIMPLE DROPDOWN --}}
                        @elseif(count($children))
                            <li class="group relative py-3 px-3 max-lg:border-b max-lg:border-black">
                                <a href="{{ $url }}" data-menu-link="dropdown-menu"
                                    class="text-slate-900 hover:text-slate-900 text-[15px] block font-medium cursor-pointer max-lg:flex max-lg:items-center max-lg:justify-between">
                                    {{ $title }}
                                    <svg class="w-3 h-3 lg:hidden mobile-chevron" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </a>

                                <ul class="dropdown-content smooth-toggle transition-all duration-300 hidden lg:block absolute left-0 top-full 
                                    w-48 bg-white shadow-lg rounded-md p-4 pointer-events-none opacity-0 scale-95
                                    group-hover:opacity-100 group-hover:scale-100 group-hover:pointer-events-auto">

                                    @foreach($children as $child)
                                        @php
                                            $cTitle = $getProp($child);
                                            $cUrl = $getUrl($child);
                                        @endphp
                                        <li>
                                            <a href="{{ $cUrl }}" class="block py-2 text-slate-500 hover:text-slate-900 text-sm font-medium">
                                                {{ $cTitle }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>

                        {{-- SINGLE LINK --}}
                        @else
                            <li class="lg:h-full place-content-center border-b border-transparent py-3 px-3 max-lg:border-b max-lg:border-black">
                                <a href="{{ $url }}" class="text-slate-600 hover:text-slate-900 text-[15px] block font-medium">
                                    {{ $title }}
                                </a>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </div>

            <!-- Call Button -->
            <div class="flex items-center gap-x-4 ml-auto">
                <a href="tel:1800 209 3040" class="flex items-center space-x-1 text-dark px-0 py-3 transition-all z-50">
                   <i class="fa-solid fa-phone blue fa-shake"></i>
                    <span class="font-medium blue">Support</span>
                </a>
            </div>

            <div class="flex items-center max-sm:ml-auto space-x-6">                        
                <div class="profile-menu-container">
                        <span class="profile-trigger-icon" role="button" aria-expanded="false" aria-controls="profile-dropdown-menu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" class="cursor-pointer hover:fill-black"
                                viewBox="0 0 512 512">
                                <path
                                d="M437.02 74.981C388.667 26.629 324.38 0 256 0S123.333 26.629 74.98 74.981C26.629 123.333 0 187.62 0 256s26.629 132.667 74.98 181.019C123.333 485.371 187.62 512 256 512s132.667-26.629 181.02-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.667-74.98-181.019zM256 482c-66.869 0-127.037-29.202-168.452-75.511C113.223 338.422 178.948 290 256 290c-49.706 0-90-40.294-90-90s40.294-90 90-90 90 40.294 90 90-40.294 90-90 90c77.052 0 142.777 48.422 168.452 116.489C383.037 452.798 322.869 482 256 482z"
                                data-original="#000000" />
                            </svg>
                            
                        </span>
                    
                            <div id="profile-dropdown-menu"
                                class="profile-dropdown-menu bg-white z-20 shadow-lg py-6 px-6 rounded-sm sm:min-w-[320px] max-sm:min-w-[250px] absolute right-0">
                                <h6 class="font-semibold text-[15px]">Welcome</h6>
                                <p class="text-sm text-gray-500 mt-1">To access account and manage orders</p>
                                <a href="{{ route('customer.register') }}">    
                                <button type='button'
                                    class="rounded-full bg-transparent border border-gray-300 hover:border-black rounded-sm px-4 py-2 mt-4 text-sm text-slate-900 font-medium cursor-pointer">LOGIN
                                    / SIGNUP
                                </button>
                                </a>
                            </div>
                </div>

                <button id="toggleOpen" class="lg:hidden ml-7 cursor-pointer">
                    <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
    </div>
</header>


