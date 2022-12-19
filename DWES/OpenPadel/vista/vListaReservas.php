<h2>Lista de Reservas</h2>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <div class="buscador">
        <label for="fecha">Fecha:</label>
        <select name="fecha" id="fecha" class="form-select" style="width: 140px;">
            <?php
            foreach($dias as $clave => $fecha){
                if($_POST['fecha']== $fecha)
                    echo "<option value='".$fecha."' selected>".$fecha."</option>";
                else
                    echo "<option value='".$fecha."'>".$fecha."</option>";
            }
            ?>
        </select>
        <label for="horas">Hora:</label>
        <select name="horas" id="horas" class="form-select" style="width: 100px;">
            <option value="0"></option>
            <option value="10:00-11:30">10:00</option>
            <option value="11:30-13:00">11:30</option>
            <option value="13:00-14:30">13:00</option>
            <option value="14:30-16:00">14:30</option>
            <option value="16:00-17:30">16:00</option>
            <option value="17:30-19:00">17:30</option>
            <option value="19:00-20:30">19:00</option>
            <option value="20:30-22:00">20:30</option>
            <option value="22:00-23:30">22:00</option>
        </select>
        <input type="submit" value="Buscar" class="btn btn-primary" style="margin-left: 10px;">
    </div>
</form>

<?php

if(isset($lista)){
    if(count($lista) > 0){
        echo "<table class='table'>";
            echo "<thead>";
            echo "<th scope='col'>FECHA</th>";
            echo "<th scope='col'>HORA</th>";
            echo "<th scope='col'>PISTA</th>";
            echo "<th scope='col'>RESERVAR</th>";

                echo "</thead>";
                echo "<tbody>";

                foreach ($lista as $value) 
                {
                    
                    echo "<tr>";
                    echo "<td>" . $value->fecha_reserva . "</td>";
                    echo "<td>" . $value->hora_reserva . "</td>";
                    echo "<td>" . $value->id_pista . "</td>";
                
                    if($value->reservado == 0){
                    //formulario para modificar y borrar si se es admin
                    echo "<td>";
                        ?>
                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                <input type="submit" name="reservarPista" value="Reservar" class="btn btn-primary">
                                </td><td>
                                <input type="hidden" name="id_reserva" value="<?php echo $value->id_reserva ?>">
                            </form>
                        <?php
                        echo "</td>";
                    }
                    else
                        echo "<td>Reservada</td>";
                        
                    echo "</tr>";
                   
                }

                echo "</tbody>";
                echo "</table>";
    }
    else{
        echo "<h3>No hay Pistas para reservar</h3>";
    }
}
else{
    echo "<h3>No hay Pistas para reservar</h3>";
}
            
    ?>

</form>