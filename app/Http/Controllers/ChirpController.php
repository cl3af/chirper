<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    return view('chirps.index', [
        // Buscamos os chirps com o usuário dono, do mais recente para o mais antigo
        'chirps' => \App\Models\Chirp::with('user')->latest()->get(),
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Validação (ninguém manda post vazio!)
    $validated = $request->validate([
        'message' => 'required|string|max:255',
    ]);

    // 2. Salva no banco associado ao usuário logado
    $request->user()->chirps()->create($validated);

    // 3. Volta para a página de listagem
    return redirect(route('chirps.index'));
}

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        Gate::authorize('update', $chirp); // Só o dono pode editar!

    return view('chirps.edit', [
        'chirp' => $chirp,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        Gate::authorize('update', $chirp);

    $validated = $request->validate([
        'message' => 'required|string|max:255',
    ]);

    $chirp->update($validated);

    return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        Gate::authorize('delete', $chirp);

    $chirp->delete();

    return redirect(route('chirps.index'));
    }
}
