<?php

namespace App\Http\Controllers;

use App\SuperHero;
use Illuminate\Http\Request;
use Response;

class SuperHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superheroes = SuperHero::select('id', 'name', 'picture', 'publisher', 'info')->paginate(9);
        return view('index', ['superheroes' => $superheroes]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuperHero  $superHero
     * @return \Illuminate\Http\Response
     */
    public function show(SuperHero $superHero)
    {
        return SuperHero::select('name', 'picture', 'publisher', 'info')->paginate(9);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuperHero  $superHero
     * @return \Illuminate\Http\Response
     */
    public function edit(SuperHero $superHero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuperHero  $superHero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuperHero $superHero)
    {     
        $id = $request->id;
        $like = $request->like;
        if(is_null($id) || is_null($like)){
            return Response::json(array(
                'error'=> "id or like nor found",
                'id' => $id,
                'like' => $like
            ), 400);
        }
        $superHero = SuperHero::findOrFail($id);
        if ($like == "yes") {
            $superHero->increment('likes');
        }else{
            $superHero->decrement('likes');
        }
        $superHero->save();
        return Response::json(array(
            'success' => true
        ), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuperHero  $superHero
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuperHero $superHero)
    {
        //
    }
}
