<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalerieRequest;
use App\Models\Galerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GalerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeries = Galerie::latest()->get();
        return view('admin.galeries.index', compact('galeries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galeries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalerieRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            
            // Redimensionner et sauvegarder l'image
            $img = Image::make($image->getRealPath());
            $img->fit(800, 600, function ($constraint) {
                $constraint->aspectRatio();
            });
            
            // Sauvegarder l'image redimensionnée
            $path = 'public/galeries/' . $filename;
            Storage::put($path, $img->encode());
            
            $data['image'] = 'storage/galeries/' . $filename;
        }
        
        Galerie::create($data);
        
        return redirect()->route('admin.galeries.index')->with('success', 'Image ajoutée à la galerie avec succès');
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
    public function edit(Galerie $galerie)
    {
        return view('admin.galeries.edit', compact('galerie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalerieRequest $request, Galerie $galerie)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($galerie->image) {
                $oldPath = str_replace('storage/', 'public/', $galerie->image);
                Storage::delete($oldPath);
            }
            
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            
            // Redimensionner et sauvegarder l'image
            $img = Image::make($image->getRealPath());
            $img->fit(800, 600, function ($constraint) {
                $constraint->aspectRatio();
            });
            
            // Sauvegarder l'image redimensionnée
            $path = 'public/galeries/' . $filename;
            Storage::put($path, $img->encode());
            
            $data['image'] = 'storage/galeries/' . $filename;
        }
        
        $galerie->update($data);
        
        return redirect()->route('admin.galeries.index')->with('success', 'Image de la galerie mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galerie $galerie)
    {
        // Supprimer l'image associée
        if ($galerie->image) {
            $path = str_replace('storage/', 'public/', $galerie->image);
            Storage::delete($path);
        }
        
        $galerie->delete();
        
        return redirect()->route('admin.galeries.index')->with('success', 'Image supprimée de la galerie avec succès');
    }

    /**
     * Update the order of gallery images.
     */
    public function updateOrder(Request $request)
    {
        $order = $request->input('order', []);
        
        foreach ($order as $position => $id) {
            Galerie::where('id', $id)->update(['position' => $position]);
        }
        
        return response()->json(['success' => true]);
    }
}
