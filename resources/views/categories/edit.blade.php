@extends('layouts.app')


@section('titulo')
    Editar Categoria
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center"> 
            <form action="{{ route('categories.update',[$categorie->id]) }}" method="POST">
                @csrf
                @method('PUT')
               <input type="text" name="nombre" value="{{$categorie->nombre}}">
               <button type="submit" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
               uppercase font-bold  p-2 text-white rounded-lg">
                Editar</button>


            </form>
    </div>


@endsection