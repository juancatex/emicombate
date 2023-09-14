<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<style>@page {
    margin: 0cm 0cm;
}

.body_wrapper {
    padding: 10px 20px 10px 20px;
    background: rgb(255, 255, 255) none;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    max-width: 750px;
    margin: 0 auto;

}

.table {
    border-collapse: collapse;
    width: 100%; 
    font-size: 12px;
    border: 1px solid;     

}
.table th,.table td {
  border: 1px solid black;
}
 
p {
    text-align: justify;
    font-size: 16px;
}

span {
    font-weight: bold;
}

.span2 {
    font-size: 10px;
}

.derecha {
    text-align: right;
}

header {
    position: fixed;
    top: 1cm;
    left: 0cm;
    right: 0cm;
    height: 2cm; 
}

footer {
    position: fixed;
    bottom: 0cm;
    left: 0cm;
    right: 0cm;
    height: 1.5cm; 
}

body {
    margin-top: 2.5cm;
    margin-left: 1.5cm;
    margin-right: 1.5cm;
    margin-bottom: 2cm;
    font-family: "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
     font-size: 12px;
}

</style>
<body >
<header> 
  <img src="{{ public_path('images/header.png') }}" width="100%" height="100%">   
</header>
    <main>
    <div class="body_wrapper">
        
        <h1 style="color: #0c49a5;text-align: center;">Datos de entrenamiento</h1>
       
      <br><br>
      <div style="border:1px solid gray;padding:1.5em;">
      <table style=" margin: 0 auto;">
            <tr>
            <td style="text-align: center;">
                    <table style=" border: 1px solid; margin:4px;">
                        <tr>
                            <td style="padding:4px 4px 4px 4px"><img width="150"
                                    src="{{$combates->foto}}"></td>
                        </tr>
                        
                    </table>
                </td>
                <td style="padding:20px">
                        <table  > 
                            <tr><td style="font-size: 14px;font-weight: bold;padding-right: 1.5em;"> Nombre :</td><td style="font-size: 14px;">{{ $combates->nomcompleto }}</td></tr>
                            <tr><td style="font-size: 14px;font-weight: bold;padding-right: 1.5em;"> Numero de entrenamiento :</td><td style="font-size: 14px;">No. {{ $combates->no }}</td></tr>
                            <tr><td style="font-size: 14px;font-weight: bold;padding-right: 1.5em;"> Tiempo de entrenamiento :</td><td style="font-size: 14px;">{{ $combates->tiempo }} Hrs.</td></tr>
                            <tr><td style="font-size: 14px;font-weight: bold;padding-right: 1.5em;"> Munición gastada :</td><td style="font-size: 14px;">{{ $combates->municiongas }}</td></tr>
                            <tr><td style="font-size: 14px;font-weight: bold;padding-right: 1.5em;"> Munición sobrante :</td><td style="font-size: 14px;">{{ $combates->municionsob }}</td></tr>
                            <tr><td style="font-size: 14px;font-weight: bold;padding-right: 1.5em;"> Porcentaje de vida :</td><td style="font-size: 14px;">{{ $combates->vida }}%</td></tr> 
                        </table>
                </td> 
            </tr>
        </table> 
        <p style="text-align: right;">La Paz, {{$date}}</p> 
      </div>
   
       
    </div>
    </main>
</body>
</html>