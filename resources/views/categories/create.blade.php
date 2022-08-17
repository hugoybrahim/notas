@extends('layouts.app')


@section('titulo')
    Crear nueva categoria
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center"> 
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
               <input type="text" name="nombre" class="border p-3 w-full rounded-lg @error('email')
               border-red-500    
               @enderror" value="{{old('nombre')}}">
               @error('nombre')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                        </p>
                @enderror
               <button type="submit" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
               uppercase font-bold  p-2 text-white rounded-lg mt-4 float-right" >Crear</button>


            </form>
    </div>


@endsection