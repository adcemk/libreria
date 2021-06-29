@extends('layouts.windmill')
@section('contenido')

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Detalle de Libro
    </h2>

    <div>
    </div>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href="{{ route('book.index') }}">
            Lista de Libros
        </a>
    </h4>

    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                {{ $book->nombre }}
            </h4>
            <p class="text-gray-600 dark:text-gray-400">
                <ul>
                    <li>Id: {{ $book->id }}</li>
                    <li>Descripcion: {{ $book->descripcion }}</li>
                    <li>Genero: {{ $book->genero }}</li>
                    <li>Publicador: {{ $book->publisher->nombre }}</li>
                </ul>
            </p>
        </div>

        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Autores del libro
            </h4>
            <p class="text-gray-600 dark:text-gray-400">
                <ul>
                    @foreach ($book->users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                </ul>
            </p>
        </div>
    </div>

    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Agregar Autores
            </h4>
            <p class="text-gray-600 dark:text-gray-400">
                <form action="{{ route('book.add-author', $book) }}" method="POST">
                    @csrf
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Seleccione Autor
                        </span>
                        <select 
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" 
                            multiple
                            name="user_id[]"
                        >
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ array_search($user->id, $book->users->pluck('id')->toArray()) !== false ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </label>
                    
                    <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                        type="submit"
                    >
                        <svg class="w-6 h-6 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                        </svg>
                        <span>Actualizar</span>
                    </button>
                </form>
            </p>
        </div>
    </div>

    <!-- Eliminacion de Book-->
    <form action="{{ route('book.destroy', $book) }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="mt-4">
            <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit"
            >
                <svg class="w-6 h-6 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                <span>Eliminar</span>
            </button>
        </div>
    </form>
@endsection