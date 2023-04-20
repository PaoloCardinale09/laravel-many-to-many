<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view('admin.projects.index', compact('projects'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $project = new Project;
        $types = Type::orderBy('label')->get();
        $technologies = Technology::orderBy('label')->get();
        $project_technologies = [];
        return view('admin.projects.form', compact('project', 'types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:1000',
            'url'=> 'url|max:100',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|exists:technologies,id'
        ],
        [
            'name.required' => 'Il nome del progetto è obbligatorio',  
            'name.max' => 'Il nome può avere massimo 50 caratteri',   
            'description.required' => 'La descrizione è obbligatoria',
            'description.max' => 'La descrizione può avere un massimo di 1000 caratteri',
            'url.url'=> 'Deve essere un link valido',
            'url.max'=> 'L\' URL può avere un massimo di 100 caratteri',
            'image.image' => 'Il file caricato deve essere un\' immagine',
            'image.mimes' => 'Le estensione consentite per l\'immagine sono: jpg,png,jpeg',
            'type_id.exists' => 'L\'id del Tipo non è valido', 
            'technologies.exists' => 'Le tecnologie selezionate non sono valide', 
        ]);

    

        $data = $request->all();

        if (Arr::exists($data, 'image')) {
           $path =  Storage::put('uploads/project', $data['image']);
           $data['image'] = $path;
        }

        $project = new Project;
        $project->fill($data);
        $project->save();

        if(Arr::exists($data, "technologies" )) $project->technologies()->attach($data["technologies"]);
       

        return to_route('admin.projects.show', $project)
            ->with('message_content', "Project $project->id creato con successo");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::orderBy('label')->get();
        $technologies = Technology::orderBy('label')->get();
        $project_technologies = $project->technologies->pluck('id')->toArray();
        return view('admin.projects.form', compact('project', 'types','technologies','project_technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:1000',
            'url'=> 'url|max:100',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|exists:technologies,id'
        ],
        [
            'name.required' => 'Il nome del progetto è obbligatorio',  
            'name.max' => 'Il nome può avere massimo 50 caratteri',   
            'description.required' => 'La descrizione è obbligatoria',
            'description.max' => 'La descrizione può avere un massimo di 1000 caratteri',
            'url.url'=> 'Deve essere un link valido',
            'url.max'=> 'L\' URL può avere un massimo di 100 caratteri',
            'image.image' => 'Il file caricato deve essere un\' immagine',
            'image.mimes' => 'Le estensione consentite per l\'immagine sono: jpg,png,jpeg',
            'type_id.exists' => 'L\'id del Tipo non è valido', 
            'technologies.exists' => 'Le tecnologie selezionate non sono valide', 
        ]);

        $data = $request->all();

        if (Arr::exists($data, 'image')) {
          if($project->image) Storage::delete($project->image);
          $path =  Storage::put('uploads/project', $data['image']);
          $data['image'] = $path;
        }


    
        $project->update($data);

        if(Arr::exists($data, "technologies" )) $project->technologies()->sync($data["technologies"]);
        else 
        $project->technologies()->detach();
        
        return redirect()->route('admin.projects.show', $project)
        ->with('message_content', "Project $project->id creato con successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
      if($project->image) Storage::delete($project->image);
        $project->delete();
        return redirect()->route('admin.projects.index');
    }


}