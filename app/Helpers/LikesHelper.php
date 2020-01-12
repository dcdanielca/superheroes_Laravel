<?php
namespace App\Helpers;

use App\SuperHero;
use Cookie;

class LikesHelper{
    public static function updateLikes($id, $like)
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

        return array("Like" => $cookieLike, "Dislike" => $cookieDislike);
    }
}

?>