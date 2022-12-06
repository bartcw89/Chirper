<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ChirpRequest;
use App\Models\Chirp;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ChirpController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Chirps/Index', [
            'chirps' => Chirp::with('user:id,name')->latest()->get()
        ]);
    }

    public function store(ChirpRequest $request): RedirectResponse
    {
        $this->user()->chirps()->create($request->validated());

        return redirect(route('chirps.index'));
    }

    public function update(ChirpRequest $request, Chirp $chirp): RedirectResponse
    {
        $chirp->update($request->validated());

        return redirect(route('chirps.index'));
    }

    public function destroy(Chirp $chirp): RedirectResponse
    {
        $chirp->delete();

        return redirect(route('chirps.index'));
    }
}
