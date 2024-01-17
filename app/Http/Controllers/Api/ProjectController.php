<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function index(Request $request){
        // $results = Project::all();
        // $results = Project::with('type','technologies')->where(function($query) {
        //     $query->whereHas('technologies', function($q) {
        //         $q->whereIn('id', [1,2]);
        //     });
        // })->toSql(); //->paginate(4);


        // dd($results);
            $results = Project::with('type','technologies')->paginate(4);
        $technologies = Technology::all();

        return  response()->json([
            'success'=> true,
            'results'=> [
                'projects' => $results,
                'technologies' => $technologies,
            ],
            'request' => $request->all(),
        ]);

    }

    public function show(Project $project){

        $project->load('type','technologies');
        return response()->json([
            'project'=> $project
        ]);
    }
}
