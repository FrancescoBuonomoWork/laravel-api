@extends('layouts.app')

@section('content')
    <section class="py-5 section index">
        <div class="container">
            <div class="row">
                <div class="col-12 py-5 text-center">
                    <h1 class="title pb-2">I tuoi progetti</h1>
                    <a href="{{route('admin.project.create')}}" class="btn btn-light-gray">Aggiungi progetto</a>
                </div>
                @forelse ($projects as $project)
                    <div class="col-3">
                        <a href="{{route('admin.project.show',$project->id)}}">

                            <div class="card">
                                <h5 class="card-title project-title">{{$project->name}}</h5>
                                <ul>
                                    {{-- <li>{{$project->name}}</li> --}}
                                    <li class="project-subtitle">{{isset($project->type) ? $project->type->name : '-'}}</li>
                                    <li>
                                        <ul>
                                            @foreach ($project->technologies as $technology)
                        
                                                <li class="badge rounded-pill text-bg-dark-gray">{{$technology->name }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                               
                                    <li class="btn-wrapper">
                                        <a class="btn btn-sm btn-light-gray" href="{{route('admin.project.edit',$project)}}">Edit</a>

                                    
                                        <form class="margin-left-auto" action="{{route('admin.project.destroy',$project)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-black">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>   
                @empty
                    
                @endforelse
               
            </div>
        </div>
    </section>
@endsection