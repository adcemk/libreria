@extends('layouts.windmill')
@section('contenido')
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Listado de Libros
    </h2>

    <div>
    </div>

    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        <a class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href="{{ route('book.create') }}">
            Agregar Libro
        </a>
    </h4>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Id</th>
                      <th class="px-4 py-3">Nombre</th>
                      <th class="px-4 py-3">Descripcion Breve</th>
                      <th class="px-4 py-3">Genero</th>
                      <th class="px-4 py-3">Publicador</th>
                      <th class="px-4 py-3">Acciones</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  @foreach ($books as $book)
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          {{$book->id}}
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <a href="{{ route('book.show', $book->id) }}">{{$book->nombre}}</a>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        {{$book->descripcion}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{$book->genero}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{$book->publisher->nombre}}
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                          @can('update', $book)
                          <a
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                            href=" {{ route('book.edit', $book) }} "
                          >
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                              ></path>
                            </svg>
                          </a>
                          @endcan
                        </div>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
    </div>
@endsection