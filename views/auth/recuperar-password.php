<h1 class="nombre-pagina">RECUPERAR PASSWORD</h1>
<p class="descripcion-pagina">Escribe tu nueva contraseña</p>

<?php include_once __DIR__ . '/../templates/alertas.php';?>

<?php 
    if($error) return null;
?>
<form class="formulario"  method="POST">
    <div class="campo">
        <label for="password">Contraseña</label>
        <input type="password"
        id="passwprd"
        name="password"
        placeholder="Tu nueva contraseña"
        />
    </div>

    <input type="submit" class="boton" value="Guardar Contraseña">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes cuenta? inicia sesion</a>
    <a href="/crear-cuenta">¿Aun no tines cuenta? Crea una</a>
</div>