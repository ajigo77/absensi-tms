<nav class="bg-red-100" x-data="{ open: false, openProfile: false }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button @click="open = !open" type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white-100"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <img class="h-8 w-auto rounded-full" src="{{ asset('./logo-company/favicon-tms.png') }}"
                        alt="Logo Company">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="#" class="rounded-md bg-red-50 px-3 py-2 text-sm font-medium text-white-100"
                            aria-current="page">Beranda</a>
                        <a href="#"
                            class="rounded-md px-3 py-2 text-sm font-medium text-white-100 hover:bg-red-50 hover:text-white-100">Dashboard</a>
                        {{-- <a href="#"
                            class="rounded-md px-3 py-2 text-sm font-medium text-white-100 hover:bg-red-50 hover:text-white-100">Projects</a>
                        <a href="#"
                            class="rounded-md px-3 py-2 text-sm font-medium text-white-100 hover:bg-red-50 hover:text-white-100">Calendar
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <!-- Profile dropdown -->
                <div class="relative ml-3" @click.outside="openProfile = false">
                    <div>
                        <button @click="openProfile = !openProfile" type="button"
                            class="relative flex items-center justify-center" id="user-menu-button"
                            aria-expanded="false" aria-haspopup="true">
                            <i class="bi bi-person-circle text-3xl text-white-100"></i>
                        </button>
                    </div>
                    <div x-show="openProfile"
                        class="absolute right-0 z-100 mt-2 w-48 origin-top-right rounded-md bg-white-100 py-1 shadow-lg ring-1 ring-gray-300 ring-opacity-5 focus:outline-none p-2"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">

                        <a href="#"
                            class="flex justify-between items-center px-4 py-2 text-md text-dark-system hover:bg-gray-50 rounded-md"
                            role="menuitem" tabindex="-1" id="user-menu-item-0">
                            Profile
                            <i class="bi bi-person-circle text-md text-dark-system"></i>
                        </a>

                        <a href="{{ route('auth.logout') }}"
                            class="flex justify-between items-center px-4 py-2 text-md text-dark-system hover:bg-gray-50 rounded-md"
                            role="menuitem" tabindex="-1" id="user-menu-item-2">
                            Keluar
                            <i class="bi bi-box-arrow-right text-md text-dark-system"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" x-show="open" id="mobile-menu">
        <div class="space-y-4 px-2 pb-3 pt-2">
            <a href="#" class="block rounded-md bg-red-50 px-3 py-2 text-base font-medium text-white-100 mb-3"
                aria-current="page">Beranda</a>
            <a href="#"
                class="block rounded-md px-3 py-2 text-sm font-medium text-white-100 hover:bg-red-50 focus:bg-red-50 hover:text-white-100">Dashboard</a>
            {{-- <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-white-100 hover:bg-red-50">Team</a>
            <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-white-100 hover:bg-red-50">Projects</a>
            <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-white-100 hover:bg-red-50">Calendar</a> --}}
        </div>
    </div>
</nav>
