<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Serie::all();
        $serie_array = [];

        foreach($series as $serie){
            $serie_array[]= [
                'id' => $serie->id,
                'name' => $serie->name,
                'bakugans' => $serie->bakugans
            ];
        };

        return response()->json($serie_array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serie = new Serie();
        $serie->name = $request->name;
        $serie->save();

        $information = [
            'message' => 'Serie created successfully',
            'serie' => $serie
        ];

        return response()->json($information);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function show(Serie $serie)
    {
        $information = [
            "serie" => $serie,
            "bakugans" => $serie->bakugans,
        ];
        return response()->json($information);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function edit(Serie $serie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serie $serie)
    {
        $serie->name = $request->name;
        $serie->save();

        $information = [
            'message' => 'Serie updated successfully',
            'serie' => $serie
        ];

        return response()->json($information);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie $serie)
    {
        $serie->delete();

        $information = [
            'message' => 'Serie deleted successfully',
            'serie' => $serie
        ];

        return response()->json($information);
    }

    public function bakugans(Request $request){
        $serie = Serie::find($request->serie_id);
        $bakugans = $serie->bakugans;

        $information = [
            'message' => 'Bakugans fetched successfully',
            'bakugans' => $bakugans
        ];

        return response()->json($information);
    }


}
