@extends('layouts.windmill')
@section('contenido')
    
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Carga de Archivos
    </h2>

    <div>
    </div>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href="{{ route('book.index') }}">
            Lista de Archivos
        </a>
    </h4>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        @include('partials.form-erros');
        <form action="{{ route('archivo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Seleccione el archivo a cargar
            </span>
            <input type="file" name="archivo" id="archivo">
        </label>

        <div class="mt-4">
            <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit"
            >
                  <span>Cargar</span>
            </button>
        </div>
        </form>
    </div>
@endsection