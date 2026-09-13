<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Painel Pisada Prime</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
         <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
           {{ session('success') }}
        </div>
    @endif

    @can('create', App\Models\Evento::class)
        <div class="mb-4">
        <a href="{{ route('eventos.create') }}" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">
            + Cadastrar Evento
        </a>
        </div>
    @endcan

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <table class="min-w-full divide-y divide-gray-200">
        <thead>
        <tr>
        <th class="text-left px-4 py-2">Título</th>
        <th class="text-left px-4 py-2">Categoria</th>
        <th class="text-left px-4 py-2">Data</th>
        <th class="text-left px-4 py-2">Preço</th>
        <th class="text-right px-4 py-2">Ações</th>
        </tr>
        </thead>
        <tbody>
    @foreach ($eventos as $evento)
        <tr class="border-b">
        <td class="px-4 py-2">{{ $evento->titulo }}</td>
        <td class="px-4 py-2">{{ $evento->categoria->nome }}</td>
        <td class="px-4 py-2">{{ $evento->data_evento->format('d/m/Y H:i') }}</td>
        <td class="px-4 py-2">R$ {{ number_format($evento->preco_ingresso, 2, ',', '.') }}</td>
        <td class="px-4 py-2 text-right">
    @can('update', $evento)
            <a href="{{ route('eventos.edit', $evento) }}" class="text-indigo-600 font-bold mr-2">Editar</a>
    @endcan
    @can('delete', $evento)
        <form action="{{ route('eventos.destroy', $evento) }}" method="POST" class="inline" onsubmit="return confirm('Confirmar exclusão?');">
    @csrf
    @method('DELETE')
        <button type="submit" class="text-red-600 font-bold">Excluir</button>
    </form>
        @endcan
    </td>
    </tr>
        @endforeach
    </tbody>
    </table>
    </div>
    </div>
    </div>
</x-app-layout>