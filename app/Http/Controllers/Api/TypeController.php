<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::orderBy('id', 'desc')
            ->where('id', $id)
            ->paginate(5);

        if (!$type)
            abort(404, "Tipo non trovato");

        return response()->json($type);
    }
}