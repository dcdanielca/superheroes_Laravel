<?php

namespace App\Http\Controllers;

use App\SuperHero;
use Illuminate\Http\Request;
use LikesHelper;

class SuperHeroDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $superhero = SuperHero::find($id);
        return view('detail', ['superhero' => $superhero]);
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
        //
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
    public function update(Request $request, SuperHero $superHero, $id, $like)
    {
        //
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
