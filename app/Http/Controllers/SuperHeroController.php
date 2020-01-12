<?php

namespace App\Http\Controllers;

use App\SuperHero;
use Illuminate\Http\Request;
use Cookie;

class SuperHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superheroes = SuperHero::all();
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
        $cookieLike = cookie()->forever('null', 1);
        $cookieDislike = cookie()->forever('null', 1);
        $superHero = SuperHero::findOrFail($id);
        if ($like == "like") {
            if(Cookie::get('likesuperhero'.$id)){
                $cookieLike=Cookie::forget('likesuperhero'.$id);
                $superHero->decrement('likes');
            }else{
                $cookieDislike=Cookie::forget('dislikesuperhero'.$id);
                $superHero->increment('likes');
                $cookieLike=cookie()->forever('likesuperhero'.$id, 1);
            }

        }else{
            if(Cookie::get('dislikesuperhero'.$id)){
                $superHero->increment('likes');
                $cookieDislike=Cookie::forget('dislikesuperhero'.$id);
            }else{
                $cookieLike=Cookie::forget('likesuperhero'.$id);
                $superHero->decrement('likes');
                $cookieDislike=cookie()->forever('dislikesuperhero'.$id, 1);
            }
        }
        $superHero->save();

        return redirect('/')->withCookie($cookieLike)->withCookie($cookieDislike);

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
