<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HeaderFooterSetting;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Affiche la liste des projets avec pagination.
     */
    public function index()
    {
        // Récupérer les paramètres d'en-tête et de pied de page
        $settings = HeaderFooterSetting::first();

        // Récupérer les projets avec pagination (9 par page)
        $projects = Project::latest()->paginate(9);

        // Récupérer les projets récents pour la sidebar
        $recentProjects = Project::latest()->take(5)->get();

        return view('frontend.projects.index', compact(
            'settings',
            'projects',
            'recentProjects'
        ));
    }

    /**
     * Affiche les détails d'un projet spécifique.
     */
    public function show($id)
    {
        // Récupérer les paramètres d'en-tête et de pied de page
        $settings = HeaderFooterSetting::first();

        // Récupérer le projet
        $project = Project::findOrFail($id);

        // Récupérer les projets récents pour la sidebar (excluant le projet courant)
        $recentProjects = Project::where('id', '!=', $project->id)
            ->latest()
            ->take(5)
            ->get();

        // Récupérer les projets reliés (excluant le projet courant)
        $relatedProjects = Project::where('id', '!=', $project->id)
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.projects.show', compact(
            'settings',
            'project',
            'recentProjects',
            'relatedProjects'
        ));
    }
}
