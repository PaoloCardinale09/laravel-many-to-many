<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $technologies = Technology::paginate(10);
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technology = new Technology();
        return view('admin.technologies.form', compact('technology'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'label' => 'required|string|max:20'
        ],
        [
            'label.required' => 'La label è obbligatoria',
            'label.max' => 'La label può avere massimo 20 caratteri'
        ]);

        $technology = new Technology();
        $technology->fill($request->all());
        $technology->save();

        return to_route('admin.technologies.index')
            ->with('messsage:content', "Type $technology->id creato con successo");
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.form', compact('technology'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'label' => 'required|string|max:20'
        ],
        [
            'label.required' => 'La label è obbligatoria',
            'label.max' => 'La label può avere massimo 20 caratteri'
        ]);

        
        $technology->update($request->all());
    

        return to_route('admin.technologies.index')
            ->with('messsage:content', "Tecnologia $technology->id è stata modificata con successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology_id = $technology->id;
        $technology->delete();
        return to_route('admin.technologies.index')
        ->with('message_type', "danger")
        ->with('messsage:content', "Technology $technology è stato eliminato con successo");
    }
}