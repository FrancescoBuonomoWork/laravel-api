@extends('layouts.app')

@section('content')


    <section class="py-5 section">
        <div class="container">
            <div class="row">
                <div class="col">
                    @if($project->image)
                    <img src="{{ asset('storage/' . $project->image)}}" >
                    @endif
                    <ul>
                        <li>{{$project->name}}</li>
                        <li>{{isset($project->type) ? $project->type->name : '-'}}</li>
                    </ul>
                    <ul class="d-flex gap-2">
                        @foreach ($project->technologies as $technology)
                        
                        <li class="badge rounded-pill text-bg-dark-gray">{{$technology->name }}</li>
                        @endforeach
                    </ul>
                    
                    
                </div>
            </div>
        </div>
    </section>
@endsection