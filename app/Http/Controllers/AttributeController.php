<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::all();
        $attributes_array = [];

        foreach($attributes as $attribute){
            $attributes_array[]= [
                'id' => $attribute->id,
                'name' => $attribute->name,
                'bakugans' => $attribute->bakugans
            ];
        };

        return response()->json($attributes_array);
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
        $attribute = new Attribute();
        $attribute->name = $request->name;
        $attribute->image = $request->image;
        $attribute->save();

        $information = [
            'message' => 'Attribute created successfully',
            'attribute' => $attribute
        ];

        return response()->json($information);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        $information = [
            "attribute" => $attribute,
            "bakugans" => $attribute->bakugans
        ];
        return response()->json($information);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        $attribute->name = $request->name;
        $attribute->image = $request->image;
        $attribute->save();

        $information = [
            'message' => 'Attribute updated successfully',
            'attribute' => $attribute
        ];

        return response()->json($information);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        $information = [
            'message' => 'Attribute deleted successfully',
            'attribute' => $attribute
        ];

        return response()->json($information);
    }

    public function bakugans(Request $request){
        $attribute = Attribute::find($request->attribute_id);
        $bakugans = $attribute->bakugans;

        $information = [
            'message' => 'Bakugans fetched successfully',
            'bakugans' => $bakugans
        ];

        return response()->json($information);
    }
}
