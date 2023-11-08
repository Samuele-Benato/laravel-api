<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('type:id,label', 'technologies:id,label')
            ->orderBy('id', 'desc')
            ->paginate(5);
        // ->where('published', 1)
        return response()->json($projects);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::with('type:id,label', 'technologies:id,label')
            ->where('id', $id)
            ->first();

        if (!$project)
            abort(404, "Progetto non trovato");

        return response()->json($project);
    }

    public function projectByType($type_id)
    {
        $projects = Project::with('type:id,label', 'technologies:id,label')
            ->orderBy('id', 'desc')
            ->where('type_id', $type_id)
            ->paginate(5);
        return response()->json($projects);
    }
}