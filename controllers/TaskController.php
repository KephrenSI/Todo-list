<?php

namespace Controllers;

use Models\TaskModel;

class TaskController extends Controller{
    private $tasks_model = null;

    public function __construct()
    {
        $this->tasks_model = new TaskModel();
    }

    public function listing()
    {
        $this->checkLogin();
        if ($this->tasks_model->getTasks($_SESSION['user']->id)) {
            $tasks = $this->tasks_model->getTasks($_SESSION['user']->id);
            $errors = [];
            $view = 'views/task.php';
        } else {
            $tasks = [];
            $errors = [
                'task' => 'Il semblerait que vous n`ayez pas encore de tâche.',
            ];
            $view = 'views/task.php';
        }
        return compact('view', 'tasks', 'errors');
    }
    public function postCreate()
    {
        $this->checkLogin();
        $description = $_POST['description'];
        if( isset($description) ){
            $this->tasks_model->createTask( $this->tasks_model->newTask($description) ,$_SESSION['user']->id );
            $tasks = $this->tasks_model->getTasks($_SESSION['user']->id);
            $view = 'views/tasks.php';
            return compact('view', 'tasks');
        }
    }
    public function postDelete()
    {
        $this->checkLogin();
        $taskId = $_POST['id'];
        $this->tasks_model->deleteTask($taskId);
        $tasks = $this->tasks_model->getTasks($_SESSION['user']->id);
        if (empty($tasks)) {
            $errors = [
                'task' => 'Il semblerait que vous n`ayez pas encore de tâche.',
            ];
        }
        $view = 'views/tasks.php';
        return compact('view', 'tasks', 'errors');
    }
    public function getUpdate()
    {
        $this->checkLogin();
        if (isset($_GET['id'])){
            $taskId = $_GET['id'];
        }
        $tasks = $this->tasks_model->getTasks($_SESSION['user']->id);
        $view = 'views/tasks.php';
        return compact('view', 'tasks');
    }

    public function postUpdate()
    {
        $this->checkLogin();
        if ( isset($_POST['is_done'])){
            $_POST['is_done'] = 1;
        }else{
            $_POST['is_done'] = 0;
        }
        isset($_POST['description']) ?: $_POST['description'] = null;

        $isDone = $_POST['is_done'];
        $description = $_POST['description'];
        $taskId = $_POST['id'];
        if(isset($description)||isset($isDone)||isset($taskId)){
            $this->tasks_model->modifyTask($description, $isDone, $taskId);
            $tasks = $this->tasks_model->getTasks($_SESSION['user']->id);
            $view = 'views/tasks.php';
            return compact('view', 'tasks');
        }
    }
}