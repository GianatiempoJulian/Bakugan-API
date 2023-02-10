<?php

namespace App\Http\Controllers;

use App\Models\Bakugan;
use Illuminate\Http\Request;

class BakuganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bakugans = Bakugan::all();
        $bakugan_array = [];

        foreach($bakugans as $bakugan){
            $bakugan_array[]= [
                'id' => $bakugan->id,
                'name' => $bakugan->name,
                'power' => $bakugan->power,
                'image' => $bakugan->image,
                'serie' => $bakugan->serie,
                'attributes' => $bakugan->attributes
            ];
        };

        return response()->json($bakugan_array);
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
        $bakugan = new Bakugan();
        $bakugan->name = $request->name;
        $bakugan->serie_id = $request->serie_id;
        $bakugan->power = $request->power;
        $bakugan->image = $request->image;
        $bakugan->save();

        $information = [
            'message' => 'Bakugan created successfully',
            'bakugan' => $bakugan
        ];

        return response()->json($information);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bakugan  $bakugan
     * @return \Illuminate\Http\Response
     */
    public function show(Bakugan $bakugan)
    {
        $information = [
            "bakugan" => $bakugan,
            "serie" => $bakugan->serie,
            "attributes" => $bakugan->attributes
        ];
        return response()->json($information);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bakugan  $bakugan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bakugan $bakugan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bakugan  $bakugan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bakugan $bakugan)
    {
        $bakugan->name = $request->name;
        $bakugan->serie_id = $request->serie_id;
        $bakugan->power = $request->power;
        $bakugan->image = $request->image;
        $bakugan->save();

        $information = [
            'message' => 'Bakugan updated successfully',
            'bakugan' => $bakugan
        ];

        return response()->json($information);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bakugan  $bakugan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bakugan $bakugan)
    {
        $bakugan->delete();

        $information = [
            'message' => 'Bakugan deleted successfully',
            'bakugan' => $bakugan
        ];

        return response()->json($information);
    }

    public function attachAttribute(Request $request){

        $bakugan = Bakugan::find($request->bakugan_id);

        if ($bakugan->attributes == NULL || ! $bakugan->attributes->contains($request->attribute_id)) {
            $bakugan->attributes()->attach($request->attribute_id);

            $information = [
                'message' => 'Attribute attached successfully',
                'bakugan' => $bakugan
            ];
    
            return response()->json($information);
        }
        else{
            return response()->json('This bakugan already has this attribute!');
        }

        //$bakugan->attributes()->attach($request->attribute_id);
    }

    public function attachSerie(Request $request){

        $bakugan = Bakugan::find($request->bakugan_id);
        $bakugan->serie()->attach($request->serie_id);

        $information = [
            'message' => 'Serie attached successfully',
            'bakugan' => $bakugan
        ];
    
        return response()->json($information);
    
    }

    public function detachAttribute(Request $request){

        $bakugan = Bakugan::find($request->bakugan_id);
        $bakugan->attributes()->detach($request->attribute_id);

        $information = [
            'message' => 'Attribute detached successfully',
            'bakugan' => $bakugan
        ];

        return response()->json($information);
    }

    public function detachSerie(Request $request){

        $bakugan = Bakugan::find($request->bakugan_id);
        $bakugan->serie()->detach($request->serie_id);

        $information = [
            'message' => 'Serie detached successfully',
            'bakugan' => $bakugan
        ];

        return response()->json($information);
    }
}
