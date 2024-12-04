@extends('layouts.default')

@section('content')

<style>.imagens img {
        
    width: 500px;        /* Limita a largura máxima da imagem a 300px */
    height: 500px;            /* Mantém a proporção da imagem */
    border-radius: 50%;      /* Torna a imagem redonda */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);  /* Adiciona uma sombra suave */
    display: block;          /* Remove o espaço abaixo da imagem */
    margin: 0 auto;          /* Centraliza a imagem */
}
</style>



 <div class="imagens">
<center>
 <img src="https://media.licdn.com/dms/image/D4D03AQGYTWpMBWS-oQ/profile-displayphoto-shrink_800_800/0/1673891589251?e=2147483647&v=beta&t=0AP1xoVc3-G7EVFFQQuRrvNlCljSg4tj9WLCp-rdn-I">
 </center>

 </div>



@endsection
