<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SuperHeroes</title>
    <script src="https://kit.fontawesome.com/340a5fc764.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid card-group">
        <div class="row">
            @foreach($superheroes as $superhero)
            <div class="card m-3" style="width: 20rem;">
                <img class="col-sm card-img-top img-responsive rounded-circle" src="{{$superhero->picture}}" alt="Picture"  style="width: 100px">
                <div class="card-body col-sm">
                    <a href="superhero/{{$superhero->id}}" class="card-title font-weight-bold">{{$superhero->name}}</a>
                    <p class="card-text">{{$superhero->info}}</p>
                    <p class="card-text"><small class="text-muted">{{$superhero->publisher}}</small></p>
                </div>
                <div class="mb-2 justify-content-end d-flex">
                    <a type="button" class="btn-outline-dark ml-2 @if(Cookie::get('dislikesuperhero'.$superhero->id)) active @endif" href="/index/superhero/{{$superhero->id}}/dislike"><i class="far fa-thumbs-down fa-2x"></i></a>
                    <a type="button" class="btn-outline-dark ml-2 mr-2 @if(Cookie::get('likesuperhero'.$superhero->id)) active @endif" href="/index/superhero/{{$superhero->id}}/like"><i class="far fa-thumbs-up fa-2x"></i></a>
                </div>
                </div>
            @endforeach
    </div>
    </div>
</body>

</html>