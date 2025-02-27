<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Vérifier si une entrée existe déjà
        if (About::exists()) {
            return redirect()->route('admin.about.index')
                ->with('error', 'Une section "À propos" existe déjà. Vous pouvez seulement la modifier.');
        }

        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        // Vérifier si une entrée existe déjà
        if (About::exists()) {
            return redirect()->route('admin.about.index')
                ->with('error', 'Une section "À propos" existe déjà. Vous pouvez seulement la modifier.');
        }

        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            // Redimensionner et sauvegarder l'image
            Image::make($image)->fit(800, 600)->save(public_path('storage/about/' . $imageName));
            
            $data['image'] = $imageName;
        }
        
        About::create($data);
        
        return redirect()->route('admin.about.index')->with('success', 'Section "À propos" créée avec succès');
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
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, About $about)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($about->image && Storage::exists('public/about/' . $about->image)) {
                Storage::delete('public/about/' . $about->image);
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            // Redimensionner et sauvegarder l'image
            Image::make($image)->fit(800, 600)->save(public_path('storage/about/' . $imageName));
            
            $data['image'] = $imageName;
        }
        
        $about->update($data);
        
        return redirect()->route('admin.about.index')->with('success', 'Section "À propos" mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        // Supprimer l'image associée
        if ($about->image && Storage::exists('public/about/' . $about->image)) {
            Storage::delete('public/about/' . $about->image);
        }
        
        $about->delete();
        
        return redirect()->route('admin.about.index')->with('success', 'Section "À propos" supprimée avec succès');
    }
}
