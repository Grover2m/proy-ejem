<h1>Usuario</h1>
    <label for="">Ingrese su nombre</label>
    <input type="text" name="name" value="{{$user->name}}" readonly>
    <br>
    <label for="">Ingrese su correo</label>
    <input type="email" name="email"value="{{$user->email}}"readonly>
    <br>
    <label for="">Ingrese su Password</label>
    <input type="password" name="password" readonly> 
    <br>
   
</form> 