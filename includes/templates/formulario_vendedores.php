<fieldset>
    <legend>Informacion general</legend>

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre vendedor" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido vendedor" value="<?php echo s($vendedor->apellido); ?>">

</fieldset>

<fieldset>
    <legend>Informacion extra</legend>

    <label for="telefono">Numero de telefono</label>
    <input type="text" id="telefono" name="vendedor[telefono]" placeholder="Numero vendedor" value="<?php echo s($vendedor->telefono); ?>">

</fieldset>