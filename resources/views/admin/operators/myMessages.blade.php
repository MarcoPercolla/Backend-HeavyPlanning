<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>I miei messaggi</title>
</head>
<body>
    <header id="navbar">
        <img src="{{ asset('img/logoimg/HeavyPlanningLogo.jpg') }}" alt="img">
        <a id="ahome" href="/"><i class="fa-solid fa-home-alt fa-lg fa-fw"></i> Home</a>
        @if(auth()->user()->operator)
            <a id="aprofile" href="{{ route('admin.operators.show', auth()->user()->operator->id) }}">
                <i class="fa-solid fa-user fa-lg fa-fw"></i>Account 
            </a>
        @else
            @if(!session('operatorAdded'))
                <a href="{{ route('admin.operators.create') }}">
                    <i class="fa-solid fa-plus fa-lg fa-fw"></i> Crea il tuo profilo
                </a>
            @endif
        @endif


        
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
        </form>
        
    </header>
    <table id="tableBox">
        <thead>
            <tr>
                <th>Testo Messaggio</th>
                <th>Email Utente</th>
                <th>Autore</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
            <tr>
                <td>{{$message->Text}}</td>
                <td>{{$message->user_email}}</td>
                <td>{{$message->author}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
<style>
#navbar{
    width: 100%;
    height: 20%;
    background-color: #090021;
    position: relative;
}
#navbar img{
    width: 10%;
}
#navbar a{
    font-family: sans-serif;
    color: #FD129E;
    text-decoration: none;
    padding-left: 1%;
}
#navbar i{
    color: #FD129E;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

thead {
    background-color: rgba(0, 0, 0, 0.121);
    color: white;
}

thead th {
    padding: 10px;
    text-align: left;
    color: white;
}

tbody tr:nth-child(even) {
    background-color: rgba(0, 0, 0, 0.121);
}

tbody td {
    padding: 10px;
}

tbody td:first-child {
    font-weight: bold;
    background-color: rgba(0, 0, 0, 0.121);
    color: white
}

tbody td:nth-child(2) {
    font-weight: bold;
    background-color: rgba(0, 0, 0, 0.121);
    color: white
}

tbody td:nth-child(3) {
    color: white;
    background-color: rgba(0, 0, 0, 0.121);
    font-weight: bolder;
}
body{
    background-image: url(https://media.idownloadblog.com/wp-content/uploads/2015/06/iTunes-13-El-Capitan-Wallaper-Blank-By-Jason-Zigrino.png);
    background-repeat: no-repeat;
    background-size: 100%;
}
*{
    font-family: sans-serif;
}
#ahome{
    font-family: sans-serif;
    color: #FD129E;
    font-weight: bolder;
    text-decoration: none;
    padding-left: 1%;
    position:absolute;
    left: 15%;
    bottom: 40%;
    font-size: 1.5em;

}
#aprofile{
    font-family: sans-serif;
    color: #FD129E;
    font-weight: bolder;
    text-decoration: none;
    padding-left: 1%;
    position:absolute;
    left: 30%;
    bottom: 40%;
    font-size: 1.5em;

}
#navbar a:hover {
  color: #F6FB01;
  transition: 250ms;
}
</style>
</html>