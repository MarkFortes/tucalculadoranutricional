<div class="form-group">
    <label>Nombre de usuario</label>
    <input type="text" class="form-control" name="name" placeholder="juan_dominguez" <?php $validador -> mostrarNombre() ?>>
    <?php
    $validador -> mostrarErrorNombre();
    ?>
</div>
<div class="form-group">
    <label>Correo electronico</label>
    <input type="email" class="form-control" name="email" placeholder="juan@gmail.com" <?php $validador -> mostrarEmail() ?>>
    <?php
    $validador -> mostrarErrorEmail();
    ?>
</div>
<div class="form-group">
    <label>Contraseña</label>
    <input type="password" class="form-control" name="password1">
    <?php
    $validador -> mostrarErrorPassword1();
    ?>
</div>
<div class="form-group">
    <label>Repite la contraseña:</label>
    <input type="password" class="form-control" name="password2">
    <?php
    $validador -> mostrarErrorPassword2();
    ?>
</div>
                        
<button type="reset" class="btn btn-default">Limpiar campos</button>
<br><br>
<button type="submit" class="btn btn-default" name="button">Crear cuenta</button>