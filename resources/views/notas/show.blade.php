@extends('layouts.app')


@section('titulo')
Notas de {{auth()->user()->name}}
@endsection

@section('contenido')
      
        <div class="grid gap-10 md:items-center grid-cols-4 mt-6 mb-5">
            @foreach ( $notes as $note)  
                <div class="grid">
                    <div class=" rounded-2xl overflow-hidden relative shadow-gray-600 shadow-lg ">
                        <div class="px-6 py-4">
                            <a href="{{route('notes.edit',[$note->id])}}">
                                <div class="font-bold text-2xl mb-2 ">
                                    {{ $note->title }}
                                </div>
                                <p class="text-gray-700 text-base">
                                    {{$note->body }}
                                </p>
                            </a>
                        </div>
                        <div class="px-3 pt-4 pb-2">
                            @foreach ($note->categoriasnotas as $categorienote)
                                <span class="inline-flex bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>&nbsp;
                                    {{ $categorienote->categorie->nombre }}
                                    &nbsp;
                                   <form action="{{ route('categorienote',[$categorienote->id]) }}" method="POST">
                                        @csrf
                                        <button
                                            onclick=" return confirm('Estas seguro quitar esta categoria de la nota??')"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form> 
                                </span> 
                               
                            @endforeach
                            <button id="btnnotemenu" name="btnnotemenu"
                                class="inline-flex items-center text-sm font-medium text-gray-700 focus:ring-gray-100
                                 float-right mb-4 " type="button"> 
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                            </button>
                                
                            
                        </div>
                        <div id="notemenu" class=" flex hidden absolute bg-gray-800 p-2 bottom-1 right-12 rounded">
                            <a href="{{route('notes.edit',[$note->id])}}" class="text-white p-1 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                        
                            <form action="{{ route('notes.destroy',[$note->id]) }}" method="POST">
                                @csrf
                                <button type="submit"
                                class="bg-red-500 hover:bg-red-700 transition-colors cursor-pointer
                                p-1 text-white rounded-lg" onclick="
                                return confirm('Estas seguro de enviar a la papelera esta nota??')">  
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>  
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @error('mensaje')                           
            <div role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Error
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>{{ $message }}</p>
                </div>
            </div>
        @enderror
                
@endsection