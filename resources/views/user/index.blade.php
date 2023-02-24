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

    <form action="{{ route('RedirectToPersonal')}}" method="post">
        @csrf
        <select name="torneo" id="">
            @foreach($tournaments as $tournament)
            <option value="{{$tournament->nome_torneo}}">{{$tournament->nome_torneo}}</option>
            @endforeach
        </select>
        <button type="submit">Submit</button>
    </form>

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