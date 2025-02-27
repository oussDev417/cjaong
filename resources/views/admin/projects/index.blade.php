@extends('admin.layouts.master')

@section('title', 'Gestion des projets')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Tableau de bord</a></li>
        <li class="breadcrumb-item active" aria-current="page">Projets</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container-fluid">
    @include('admin.layouts.alerts')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Liste des projets</h5>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Ajouter un projet
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="50px">#</th>
                            <th>Image</th>
                            <th>Titre</th>
                            <th>Description courte</th>
                            <th>Date de création</th>
                            <th width="200px">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="sortable">
                        @forelse($projects as $project)
                        <tr data-id="{{ $project->id }}">
                            <td>
                                <span class="sortable-handle">
                                    <i class="fas fa-grip-vertical"></i>
                                </span>
                            </td>
                            <td>
                                @if($project->image)
                                    <img src="{{ asset('storage/projects/' . $project->image) }}" 
                                        alt="{{ $project->title }}" class="img-thumbnail" 
                                        style="max-width: 50px;">
                                @else
                                    <img src="{{ asset('assets/images/no-image.png') }}" 
                                        alt="No Image" class="img-thumbnail" 
                                        style="max-width: 50px;">
                                @endif
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ Str::limit($project->short_description, 100) }}</td>
                            <td>{{ $project->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye me-1"></i>Voir
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit me-1"></i>Modifier
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash me-1"></i>Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Aucun projet trouvé</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var sortable = new Sortable(document.getElementById('sortable'), {
        handle: '.sortable-handle',
        animation: 150,
        onEnd: function() {
            updateOrder('projects');
        }
    });
});
</script>
@endsection 