<?php
require_once './app/db.php';

function showTasks() {
    include './templates/header.php';

    $tasks = getAllTasks();

    include './templates/form_alta.php';
    
    echo '<ul class="list-group">';
    foreach ($tasks as $task) {
       echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                <span> <b>$task->title</b> - $task->description (prioridad $task->priority) </span>
                <a href='delete/$task->id' type='button' class='btn btn-danger ml-auto'>Borrar</a>
                <a href='upDate/$task->id' type='button' class='btn btn-warning ml-auto'>actualizar</a>
            </li>";
    }
    echo "</ul>";

    include './templates/footer.php';
}

function addTask() {
    // TODO: validar entrada de datos

    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];

    $id = insertTask($title, $description, $priority);

    header("Location: " . BASE_URL); 
}

function deleteTask($id) {
    deleteTaskById($id);
    header("Location: " . BASE_URL); 
}





