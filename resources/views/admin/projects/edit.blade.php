@extends('layouts.app')

@section('page-title', 'Modifica il progetto ' . $project->name)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1>
                        {{ 'Modifica il progetto ' . $project->name }}
                    </h1>
                    
                    {{-- Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <br>

                    <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="d-block" for="name">Nome progetto: <span class="text-danger">*</span></label>
                            <input class="@error('name') is-invalid @enderror" value="{{ old('name', $project->name) }}" maxlength="64" id="name" name="name" type="text" placeholder="Scrivi il nome..." required>
                            {{-- Barra errore --}}
                            @error('name')
                                <div class="alert alert-danger">	
                                    {{ $message }} 
                                </div>
                            @enderror
                        </div>
            
                        <div class="mb-3">
                            <label class="d-block" for="description">Descrizione:</label>
                            <textarea cols="23" class="@error('description') is-invalid @enderror" maxlength="4096" name="description" id="description" placeholder="Scrivi una descrizione">
                                {{ old('description', $project->description) }}
                            </textarea>
                            {{-- Barra errore --}}
                            @error('description')
                                <div class="alert alert-danger">	
                                    {{ $message }} 
                                </div>
                            @enderror
                        </div>
            
                        <div>
                            <button type="submit" class="btn btn-warning">Aggiorna</button>
                        </div>
                        <br>
                    </form>

                    La dashboard è una pagina privata (protetta dal middleware)
                </div>
            </div>
        </div>
    </div>
@endsection