<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cadastrar Novo Evento</h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white p-6 rounded shadow">
    <form action="{{ route('eventos.store') }}" method="POST">
    @csrf
                    
    <div class="mb-4">
        <label class="block font-medium">Título:</label>
        <input type="text" name="titulo" value="{{ old('titulo') }}" class="w-full border-gray-300 rounded mt-1">
        @error('titulo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="mb-4">
        <label class="block font-medium">Categoria:</label>
        <select name="categoria_id" class="w-full border-gray-300 rounded mt-1">
         @foreach($categorias as $cat)
        <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
        @endforeach
        </select>
        @error('categoria_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    <div class="mb-4">
        <label class="block font-medium">Descrição:</label>
        <textarea name="descricao" class="w-full border-gray-300 rounded mt-1">{{ old('descricao') }}</textarea>
        @error('descricao') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    <div class="grid grid-cols-2 gap-4 mb-4">
    <div>
    <label class="block font-medium">Data do Evento:</label>
    <input type="datetime-local" name="data_evento" class="w-full border-gray-300 rounded mt-1">
    @error('data_evento') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block font-medium">Local:</label>
        <input type="text" name="local" value="{{ old('local') }}" class="w-full border-gray-300 rounded mt-1">
        @error('local') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    </div>
     <div class="grid grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block font-medium">Preço (R$):</label>
        <input type="number" step="0.01" name="preco_ingresso" value="{{ old('preco_ingresso') }}" class="w-full border-gray-300 rounded mt-1">
        @error('preco_ingresso') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
        <label class="block font-medium">Capacidade:</label>
        <input type="number" name="capacidade" value="{{ old('capacidade') }}" class="w-full border-gray-300 rounded mt-1">
        @error('capacidade') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        </div>
    <button type="submit" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded">Salvar Evento</button>
    </form>
    </div>
    </div>
    </div>
</x-app-layout>