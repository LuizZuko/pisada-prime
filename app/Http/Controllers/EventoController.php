<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Categoria;
use App\Http\Requests\StoreEventoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class EventoController extends Controller
{
    use AuthorizesRequests;

    public function index(): View
    {
        $eventos = Evento::with('categoria', 'organizador')->latest()->get();
        return view('eventos.index', compact('eventos'));
    }

    public function create(): View
    {
        $this->authorize('create', Evento::class);
        $categorias = Categoria::all();
        return view('eventos.create', compact('categorias'));
    }

    public function store(StoreEventoRequest $request): RedirectResponse
    {
        $this->authorize('create', Evento::class);

        $data = $request->validated();
        $data['user_id'] = auth()->id();

        Evento::create($data);

        return redirect()->route('eventos.index')->with('success', 'Evento criado com sucesso!');
    }

    public function edit(Evento $evento): View
    {
        $this->authorize('update', $evento);
        $categorias = Categoria::all();
        return view('eventos.edit', compact('evento', 'categorias'));
    }

    public function update(StoreEventoRequest $request, Evento $evento): RedirectResponse
    {
        $this->authorize('update', $evento);
        $evento->update($request->validated());

        return redirect()->route('eventos.index')->with('success', 'Evento atualizado!');
    }

    public function destroy(Evento $evento): RedirectResponse
    {
        $this->authorize('delete', $evento);
        $evento->delete();

        return redirect()->route('eventos.index')->with('success', 'Evento excluído!');
    }
};