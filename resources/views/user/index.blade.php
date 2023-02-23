<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <h1>Online Pairings</h1>
    @foreach($tournaments as $tournament)
    <form action="{{ route('RedirectToPersonal')}}" method="post">
        @csrf
        <div style="text-align: center">
            <button type="submit" value="{{$tournament->nome_torneo}}" name="torneo">{{$tournament->nome_torneo}}</button>
        </div>
    </form>
    @endforeach
</body>

</html>

<style>
    h1 {
        text-align: center;
    }

    a {
        font-size: 20px;
    }
</style>