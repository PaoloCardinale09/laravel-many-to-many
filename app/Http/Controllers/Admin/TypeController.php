<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $types = Type::paginate(10);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = new Type();
        return view('admin.types.form', compact('type'));
        
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

        $type = new Type();
        $type->fill($request->all());
        $type->save();

        return to_route('admin.types.index')
            ->with('messsage:content', "Type $type->id creato con successo");
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.form', compact('type'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'label' => 'required|string|max:20'
        ],
        [
            'label.required' => 'La label è obbligatoria',
            'label.max' => 'La label può avere massimo 20 caratteri'
        ]);

        
        $type->update($request->all());
    

        return to_route('admin.types.index')
            ->with('messsage:content', "Type $type->id è stata modificata con successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type_id = $type->id;
        $type->delete();
        return to_route('admin.types.index')
        ->with('message_type', "danger")
        ->with('messsage:content', "Type $type_id è stato eliminato con successo");
    }
}