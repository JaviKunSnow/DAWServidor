<h2>Lista de Pistas</h2>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <div class="Nuevo" style="float: right;">
        <input type="submit" name="nuevaPista" value="Nueva Pista" class="btn btn-primary">
    </div>
</form>
<?php

if(isset($lista)){
    if(count($lista) > 0){
        echo "<table class='table'>";
            echo "<thead>";
            echo "<th scope='col'>ID PISTA</th>";
            echo "<th scope='col'>NOMBRE PISTA</th>";
            
                
            if($_SESSION['perfil']=='ADM01'){
                echo "<th scope='col'>MODIFICAR</th>";
                echo "<th scope='col'>ELIMINAR</th>";
            }
                echo "</thead>";
                echo "<tbody>";

                foreach ($lista as $value) 
                {
                    echo "<tr>";
                    echo "<td>" . $value->id_pista . "</td>";
                    echo "<td>" . $value->nombre_pista . "</td>";
                    
                    if($_SESSION['perfil']=='ADM01'){
                        //formulario para modificar y borrar si se es admin
                        echo "<td>";
                            ?>
                                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                    <input type="submit" name="modPista" value="Modificar" class="btn btn-primary">
                                    </td><td>
                                    <input type="submit" name="eliminarPista" value="Eliminar" class="btn btn-warning">   
                                    <input type="hidden" name="id_pista" value="<?php echo $value->id_pista ?>">
                                </form>
                            <?php
                            echo "</td>";
                    }
                    
                        
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
    }
    else{
        echo "<h3>No hay Pistas</h3>";
    }
}
else{
    echo "<h3>No hay Pistas</h3>";
}
            
    ?>

