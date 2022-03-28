<?php
    $conn = Database::StartUp();   
    $os=$empleado->roles;
?>
<h1 class="page-header">
    <?php echo $empleado->id != null ? 'Modificar Empleado' : 'Nuevo Empleado'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=empleado">Regresar</a></li>
</ol>

<form id="frm-empleado" action="?c=empleado&a=Guardar" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $empleado->id; ?>" />
    <div class="row mb-4">
        <div class="col-sm-12 m-2">
            <div class="row">
                <div class="col-sm-2">
                    <label for="">Nombre Completo</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" name="nombre" class="form-control" value="<?php echo $empleado->nombre; ?>"
                        placeholder="Nombre completo del empleado" required/>
                </div>
            </div>
        </div>

        <div class="col-sm-12 m-2">
            <div class="row form-group">
                <div class="col-sm-2">
                    <label for="">Correo Electronico</label>
                </div>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" placeholder="Correo electrónico"
                        value="<?php echo $empleado->email ?>" required>
                </div>
            </div>
        </div>

        <div class="col-sm-12 m-2">
            <div class="row">
                <div class="col-sm-2">
                    <label for="">Sexo</label>
                </div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="M" id="sexo1" name="sexo" 
                            <?php echo $empleado->sexo == "M" ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="sexo1">
                            Masculino
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="F" id="sexo2" name="sexo"
                            <?php echo $empleado->sexo == "F" ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="sexo2">
                            Femenino
                        </label>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="col-sm-12 m-2">
            <div class="row">
                <div class="col-sm-2">
                    <label for="">Área</label>
                </div>
                <div class="col-sm-10">
                    <select name="area_id" id="area_id" class="form-control" required>
                        <option value="">Seleccione una opción</option>
                        <?php
                        $sth = $conn->query('SELECT * FROM areas');
                        $rows = $sth->fetchAll();

                        foreach ($rows as $row) {
                            ?>
                        <option value="<?php echo $row['id']?>" <?php echo $empleado->area_id == $row['id'] ? 'selected' : ''; ?> ><?php echo$row['nombre']?></option>';

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-12 m-2">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="" class="form-label">Descripción</label>
                    </div>
                    <div class="col-sm-10">
                        <textarea class="form-control" style="height: 150px; width: 100%;" name="descripcion"
                            id="descripcion" cols="30" rows="10"
                            placeholder="Descripción de la experiencia del empleado" required><?php echo $empleado->descripcion ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 m-2">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="">Roles</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="rol1" 
                                name="roles[]" <?php echo (in_array("1", $os)) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="rol1">
                                Desarrollador
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="2" id="rol2" 
                                name="roles[]" <?php echo (in_array("2", $os)) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="rol2">
                                Analista
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="3" id="rol3"
                                name="roles[]" <?php echo (in_array("3", $os)) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="rol3">
                                Tester
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="4" id="rol4"
                                name="roles[]" <?php echo (in_array("4", $os)) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="rol4">
                                Diseñador
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="5" id="rol5"
                                name="roles[]" <?php echo (in_array("5", $os)) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="rol5">
                                Profesional PMO
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="6" id="rol6"
                                name="roles[]" <?php echo (in_array("6", $os)) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="rol6">
                                Profesional de servicios
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="7" id="rol7"
                                name="roles[]" <?php echo (in_array("7", $os)) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="rol7">
                                Auxiliar administrativo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="8" id="rol8"
                                name="roles[]" <?php echo (in_array("8", $os)) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="rol8">
                                Codirector
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-sm-12 m-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="boletin" name="boletin"
                            <?php echo $empleado->boletin == 1 ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="boletin">
                            Deseo recibir el boletin informativo.
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr />
    <div class="d-grid gap-2">
        <button class="btn btn-primary">Guardar</button>
    </div>

</form>

</form>
<br>
<script>
$(document).ready(function() {
    $("#frm-empleado").submit(function(evt) {
        if (!document.querySelector('input[name="sexo"]:checked')) {
        alert("Debe seleccionar un sexo");
        evt.preventDefault();
    } else{
        if (!document.querySelector('input[name="roles[]"]:checked')) {
            alert('Debes elegir al menos un rol');
            evt.preventDefault();
        }   else {
            return $(this).validate();
        }
    }
    });
})


</script>
