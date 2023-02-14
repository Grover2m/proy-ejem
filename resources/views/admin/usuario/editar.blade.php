@extends("layouts.admin")
@section("contenido")

<h1>Editar Usuario</h1>
<form action="{{ route('usuario.update',$user->id)}}" method="post">
    @csrf   
    @method('PUT')
    <label for="">Ingrese su nombre</label>
    <input type="text" name="name" value="{{$user->name}}">
    <br>
    <label for="">Ingrese su correo</label>
    <input type="email" name="email"value="{{$user->email}}">
    <br>
    <label for="">Ingrese su Password</label>
    <input type="password" name="password">
    <br>
    <input type="submit" value="Guardar Usuario">
</form> 

@endsection

