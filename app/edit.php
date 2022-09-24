


<?php

function actualizar($id){

    $db = getDB();
    //$id= $_GET ['id'];
    $sentencia= $db->prepare("SELECT *FROM tasks WHERE id =?;");
    $sentencia->execute([$id]);
    $labor= $sentencia->fetch(PDO:: FETCH_OBJ);
    editarTareas($labor);

}

    
    function editarTareas($labor){
        include_once "templates/header.php";
        include_once "templates/footer.php";

        ?>
            <h1>Editar tareas</h1>
            
            <form method="POST" action= "editFin";>
            <table>
                <tr>
                    <td>titulo</td>
                    <td><input type = "text" name= "tit2"  value=" <?php echo $labor->title; ?>"></td>
                </tr>
                <tr>
                    <td>descrpcion</td>
                    <td><input type = "text" name= "des2"  value=" <?php echo $labor->description; ?>"></td>
                </tr>
                <tr>
                    <td>prioridad</td>
                    <td><input type = "text" name= "pri2"  value=" <?php echo $labor->priority; ?>"></td>
                </tr>
                <tr>
                    <td>completada</td>
                    <td><input type = "text" name= "com2"  value=" <?php echo $labor->completed; ?>"></td>
                </tr>
                <tr>
                    <td><input type = "hidden" name= "id" value=" <?php echo $labor->id; ?>"></td>
                </tr>
               
                <tr> 
                <td><button><input type "submit"   value=" Editar tarea"></button></td>
                </tr>
            </table>
        </form>
     
<?php
    }

    function editFin(){

        $db = getDB();
        $tit2= $_POST['tit2'];
        $des2= $_POST['des2'];
        $pri2= $_POST['pri2'];
        $com2=$_POST['com2'];
        $id= $_POST['id'];
        
        $sentencia=$db->prepare('UPDATE tasks SET  title = ?, description= ?, priority= ?, completed = ? WHERE id = ?; ');
        $sentencia->execute ([$tit2, $des2, $pri2, $com2, $id]);
        
        header("Location: " . BASE_URL); 
        
    }
    

    

    ?>
    
    
    




         




        





 