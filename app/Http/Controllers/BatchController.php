<?php

namespace App\Http\Controllers;

use App\Models\Batch;

use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->search;

    $batches = Batch::when($search, function ($query) use ($search) {
        $query->where('batch_name', 'like', '%' . $search . '%');
    })
    ->paginate(5)
    ->withQueryString();

    return view('batches.index', compact('batches', 'search'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('batches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'batch_name' => 'required|max:255'
        ]);

         Batch::create([
        'batch_name' => $request->batch_name
    ]);

    return redirect()
     ->route('batches.index')
        ->with('success', 'Batch added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    public function edit(Batch $batch)
    {
         return view('batches.edit', compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(Request $request, Batch $batch)
    {
         $request->validate([
        'batch_name' => 'required|max:255'
    ]);

    $batch->update([
        'batch_name' => $request->batch_name
    ]);

    return redirect('/batches');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Batch $batch)
{
     if ($batch->students()->count() > 0) {
        return redirect('/batches')
            ->with('error', 'This batch cannot be deleted because students are assigned to it.');
    }

    $batch->delete();

    return redirect('/batches')
        ->with('success', 'Batch deleted successfully.');
}
}
