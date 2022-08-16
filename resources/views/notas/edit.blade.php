@extends('layouts.app')


@section('titulo')
    Editar nota
@endsection

@section('contenido')
    <div class="rounded-2xl overflow-hidden relative shadow-gray-600 shadow-lg justify-around"> 
            <form action="{{ route('notes.update',[$note->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="m-5">
                    <label for='title' class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input type="text" name="title" id="title" placeholder="Titulo de publicacion" 
                    class="border p-3 w-full rounded-lg @error('titulo')
                    border-red-500    
                    @enderror" value="{{ $note->title }}">
                    @error('title')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                        </p>
                    @enderror
                    </div>
                    <div class="m-5">
                        <label for='body' class="mb-2 block uppercase text-gray-500 font-bold">
                            Cuerpo de la nota
                        </label>
                        <textarea name="body" id="body" placeholder="Cuerpo de la nota" 
                        class="border p-3 w-full rounded-lg @error('body')
                        border-red-500    
                        @enderror">{{ $note->body }}</textarea>
                        @error('body')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="m-5">
                        <label for='body' class="mb-2 block uppercase text-gray-500 font-bold">
                            Categoria
                        </label>
                        <select multiple name="categories[]" id="categories" class="border p-3 w-full flex rounded-lg ">
                        @foreach ($note->categoriasnotas as $categorienote)
                            <option value=" {{ $categorienote->categorie->id }} " >
                                {{ $categorienote->categorie->nombre }}
                                
                            </option>
                    </div>
                        @endforeach
                    <div class="inline-flex"> 
                        <input type="submit" value="Editar" class="bg-sky-600 hover:bg-sky-700 transition-colors 
                        cursor-pointer uppercase font-bold will-change-auto p-3 text-white rounded-lg mt-4">
                   
                            <div id="label" role="tooltip" class="invisible p-1 text-sm font-medium text-white
                             bg-gray-700 rounded-lg shadow-sm duration-300">
                                Agrega una nueva categoria
                            <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <button data-tooltip-target="label" class="  bg-sky-600 hover:bg-sky-700 transition-colors 
                            cursor-pointer uppercase font-bold will-change-auto p-3 text-white rounded-lg mt-4 
                            float-right m-3" type="button" data-modal-toggle="defaultModal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Categorias
                                        </h3>
                                        {{-- <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button> --}}
                                    </div>
                                    <!-- Modal body -->
                                    <form action="{{route('notes.addnew', $note->id)}}" method="POST">
                                        @csrf
                                        <div class="p-6 space-y-6">
                                            <select multiple name="categoriesm[]" id="categoriesm" class="border p-3 w-full flex rounded-lg ">
                                                {{-- @foreach (auth()->user()->categories as $categorie)
                                                    @php $key = (array_search($categorie->id, array_column(json_decode( json_encode($note->categoriasnotas), true), 'id_categories'))) @endphp
                                                    <option value="{{ $categorie->id }}" {{ ($key === false) ? '' : 'disabled' }}>
                                                        {{ $categorie->nombre }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                            <button data-modal-toggle="defaultModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                                            focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600
                                            dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            I accept</button>
                                            <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>  

                    @php
                        function disabledSelect($val1,$val2){
                            return (!strcmp($val1,$val2)) ? 'selected' : null;
                        }
                    @endphp


@endsection