@extends('layouts.windmill')
@section('contenido')

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Detalle de Publicador
    </h2>

    <div>
    </div>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href="{{ route('publisher.index') }}">
            Lista de Publicadores
        </a>
    </h4>

    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
            {{ $publisher->nombre }}
        </h4>
        <p class="text-gray-600 dark:text-gray-400">
            <ul>
                <li>Id: {{ $publisher->id }}</li>
                <li>Telefono: {{ $publisher->telefono }}</li>
                <li>Pais: {{ $publisher->pais }}</li>
                <li>Ciudad: {{ $publisher->ciudad }}</li>
                <li>Email: {{ $publisher->email }}</li>
            </ul>
        </p>
        </div>
    </div>
@can('delete', $publisher)
    <!-- Eliminacion de Publisher-->
    <form action="{{ route('publisher.destroy', $publisher) }}" method="POST">
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
@endcan
@endsection