<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Notas - @yield('titulo')</title>.
        @vite('resources/js/app.js')
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between">
                <h1 class="text-3xl font-black">
                    Notas
                </h1>
                @auth
                <nav class="flex gap-2 items-center">
                  
                    <a class="font-bold  text-gray-600 text-sm"
                     href="{{ route('notes')}}">
                        Hola: <span class="font-normal">{{ auth()->user()->name }}</span>
                    </a>
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm" >
                            Cerrar Sesion
                        </button>
                    </form>
                </nav>
                                 
                @endauth
                @guest
                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">
                        Crear Cuenta
                    </a>
                </nav>
                @endguest

                
            </div>
        </header>
        <main class="container mx-auto mt-10">            
            @auth
            <nav class="flex items-center justify-between flex-wrap bg-zinc-500 shadow border p-6 rounded-lg mb-3">
                <div class="flex items-center flex-shrink-0 text-white mr-6">
                    <svg
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                      </svg>
                            <a href="{{route('notes')}}" >
                                <span class="font-semibold text-xl tracking-tight ml-1 hover:text-gray-300 
                                transition-colors cursor-pointer"> 
                                     Notas de {{ auth()->user()->name}}
                                    
                                </span>
                            </a>
                </div>
                <div class="block lg:hidden">
                  <button id='botonnav' class="flex items-center px-3 py-2 border rounded text-white
                   hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
                  </button>
                </div>
                <div id='menu' class="w-full  flex-grow lg:flex lg:items-center lg:w-auto hidden">
                    <div class="text-sm lg:flex-grow text-center">
                        <a href="{{ route('notes.trash') }}" class=" hover:text-gray-300 
                        transition-colors cursor-pointer block mt-4 lg:inline-block lg:mt-0 text-white mr-4">
                        Papelera
                        </a>
                        <a href="{{route('categories')}}" class="block mt-4 lg:inline-block lg:mt-0 text-white
                         hover:text-gray-300 transition-colors cursor-pointer">
                        Categorias
                        </a>
                    </div>
                    <div>
                        <div id="tooltip" role="tooltip" class="invisible p-1 text-sm font-medium text-white
                         bg-gray-700 rounded-lg shadow-sm duration-300">
                            Agrega una nueva nota
                        <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <a href="{{ route('notes.create') }}" data-tooltip-target="tooltip" class=" items-center gap-2 bg-white border p-2
                        text-gray-600 rounded text-sm uppercase font-bold cursor-pointer hover:bg-gray-300 inline-block float-right">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        </a>
                    </div>
                </div>
              </nav>
              @endauth
              <h2 class="font-black text-center text-3xl mb-6"> @yield('titulo') </h2>
            @yield('contenido')
           
        </main>
        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">

            Notas - Todos Los derechos reservados {{ now()->year}}

        </footer>
        <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
    </body>
</html>