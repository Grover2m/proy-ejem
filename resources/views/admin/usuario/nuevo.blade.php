<h1>Nuebo Usuario</h1>
<form action="{{ route('usuario.store')}}" method="post">
    @csrf   
    <label for="">Ingrese su nombre</label>
    <input type="text" name="name">
    <br>
    <label for="">Ingrese su correo</label>
    <input type="email" name="email">
    <br>
    <label for="">Ingrese su Password</label>
    <input type="password" name="password">
    <br>
    <input type="submit" value="Guardar Usuario">
</form>