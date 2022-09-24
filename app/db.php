
<?php 

function getDB() {
    $db = new PDO('mysql:host=localhost;'.'dbname=lista;charset=utf8', 'root', '');
    return $db;
}

/**
 * Devuelve la lista de tareas completa.
 */
function getAllTasks() {
    // 1. abro conexión a la DB
    $db = getDB();

    // 2. ejecuto la sentencia (2 subpasos)
    $query = $db->prepare("SELECT * FROM tasks");
    $query->execute();

    // 3. obtengo los resultados
    $tasks = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
    
    return $tasks;
}

/**
 * Inserta una tarea en la base de datos.
 */
function insertTask($title, $description, $priority) {
    $db = getDB();
    $query = $db->prepare("INSERT INTO tasks (title, description, priority, completed) VALUES (?, ?, ?, ?)");
    $query->execute([$title, $description, $priority, false]);

    return $db->lastInsertId();
}


/**
 * Elimina una tarea dado su id.
 */
function deleteTaskById($id) {
    $db = getDB();
    $query = $db->prepare('DELETE FROM tasks WHERE id = ?');
    $query->execute([$id]);
}






