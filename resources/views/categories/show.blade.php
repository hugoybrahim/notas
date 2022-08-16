@extends('layouts.app')


@section('titulo')
    Categorias de {{auth()->user()->name}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center"> 
            <table >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th ><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg></th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ( $categories as $categorie)
                    <tr>    
                        <td>{{ $categorie->id }}</td>
                        <td>{{$categorie->nombre}}</td>
                        <td >
                            <div class="flex m-2 ">
                                <a href="{{route('categories.edit',[$categorie->id])}}" class="bg-teal-500 hover:bg-teal-700 
                                    transition-colors cursor-pointer  p-1 text-white rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a></td>
                               <td> <form action="{{route('categories.destroy',[$categorie->id])}}" method="POST">
                                    @csrf
                                    <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 transition-colors cursor-pointer
                                    uppercase p-1 text-white rounded-lg"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
    <div class="mt-10 flex items-end ">
        <a href="{{route('categories.create')}}" class="flex items-center gap-2 bg-white border p-2
        text-gray-600 rounded text-sm uppercase font-bold cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
          </svg>Crear</a>
    </div>


@endsection