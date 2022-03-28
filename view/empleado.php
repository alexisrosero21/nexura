<?php
    $conn = Database::StartUp();   
?>
<br>
<h1 class="page-header">Empleados Nexura </h1>

    <a class="btn btn-success pull-right" href="?c=empleado&a=Act">Agregar Empleado</a>
<br><br><br>

<table class="table  table-striped  table-hover" id="tabla">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Sexo</th>
            <th>Área</th>
            <th>Boletin</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->email; ?></td>
            <td><?php echo $r->sexo=='M'? 'Masculino':'Femenino' ; ?></td>
            <td><?php
 
             $sth = $conn->query('SELECT * FROM areas WHERE id='.$r->area_id);
             $rows = $sth->fetchAll();
                echo $rows[0]['nombre'];
             ?></td>
            <td><?php echo $r->boletin==1 ? 'Si':'No'; ?></td>
            <td>
                <a  class="btn btn-secondary" href="?c=empleado&a=Act&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a  class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=empleado&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

</body>

</html>