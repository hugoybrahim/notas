@extends('layouts.app')


@section('titulo')
    Crear nueva nota
@endsection

@section('contenido')
    <div class="rounded-2xl overflow-hidden relative shadow-gray-600 shadow-lg justify-around"> 
            <form action="{{ route('notes.store') }}" method="POST">
                @csrf
                <div class="m-5">
                    <label for='title' class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input type="text" name="title" id="title" placeholder="Titulo de publicacion" 
                    class="border p-3 w-full rounded-lg @error('title')
                    border-red-500    
                    @enderror" value="{{ old('title') }}">
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="m-5">
                    <label for='body' class="mb-2 block uppercase text-gray-500 font-bold">
                        Cuerpo de la nota
                    </label>
                    <textarea name="body" id="body" placeholder="Cuerpo de la publicacion" 
                    class="border p-3 w-full rounded-lg @error('body')
                    border-red-500    
                    @enderror">{{ old('body') }}</textarea>
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="m-5">
                    <label for='categorie' class="mb-2 block uppercase text-gray-500 font-bold">
                        Categoria
                    </label>
                    <select multiple name="categorie_id[]" id="categorie_id" class="border p-3 w-full flex rounded-lg ">
                        @foreach (auth()->user()->categories as $categorie)

                            <option value="{{ $categorie->id }}">{{ $categorie->nombre }}</option>
                            
                        @endforeach

                    </select>
                </div>

                <input type="submit" value="Publicar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                uppercase font-bold will-change-auto p-3 text-white rounded-lg m-4">
            </form>
        </div>
    </div>


@endsection