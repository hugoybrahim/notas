@extends('layouts.app')


@section('titulo')
    Categorias de {{auth()->user()->name}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center"> 
            <table >
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ( $categories as $categorie)
                    <tr>    
                        <td class="inline p-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">dentro
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                          </svg></td>
                        <td>{{$categorie->nombre}}</td>
                        <td >
                            <div class="flex m-2 ">
                                <a href="{{route('categories.edit',[$categorie->id])}}" class="bg-teal-500 hover:bg-teal-700 
                                    transition-colors cursor-pointer  p-1 text-white rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a></td>
                               <td> <form action="{{route('categories.destroy',[$categorie->id])}}" method="POST">
                                    @csrf
                                    <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 transition-colors cursor-pointer
                                    uppercase p-1 text-white rounded-lg"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>  
                                    </button>
                                </form>

                                
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
    <div class="mt-10 flex justify-center items-end ml-96">
        <a href="{{route('categories.create')}}" class="flex items-center gap-2 bg-white border p-2
        text-gray-600 rounded text-sm uppercase font-bold cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
          </svg>Crear</a>
    </div>


@endsection