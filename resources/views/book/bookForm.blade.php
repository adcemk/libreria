@extends('layouts.windmill')
@section('contenido')
    
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Formulario de Libro
    </h2>

    <div>
    </div>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href="{{ route('book.index') }}">
            Lista de Libros
        </a>
    </h4>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        @if(isset($book))
            <!-- Edicion de Book-->
            <form action="{{ route('book.update', $book) }}" method="POST">
                @method('PATCH')
        @else
            <!-- Creacion de Book-->
            <form action="{{ route('book.store') }}" method="POST">
        @endif

        @csrf 

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text"
                name="nombre"
                id="nombre"
                value="{{ old('nombre') ?? $book->nombre ?? '' }}"
            />
            @error('nombre')
                <span class="text-xs text-red-600 datk:text-red-400">{{ $message }}</span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Descripcion</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text"
                name="descripcion"
                id="descripcion"
                value="{{ old('descripcion') ?? $book->descripcion ?? '' }}"
            />
            @error('descripcion')
                <span class="text-xs text-red-600 datk:text-red-400">{{ $message }}</span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Genero</span>
            <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                type="text"
                name="genero"
                id="genero"
                value="{{ old('genero') ?? $book->genero ?? '' }}"
            />
            @error('genero')
                <span class="text-xs text-red-600 datk:text-red-400">{{ $message }}</span>
            @enderror
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Publicador
            </span>
            <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    type="text"
                    name="publisher_id"
                    id="publisher_id" 
            >
                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->nombre }}</option>
                @endforeach
            </select>
        </label>

        <div class="mt-4">
            <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit"
            >
                  <svg class="w-6 h-6 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                  </svg>
                  <span>Guardar</span>
            </button>
        </div>
        </form>
    </div>
@endsection