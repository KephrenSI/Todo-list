<div class="main-content wrapper">
    <h1>Vos prochaines tâches</h1>
    <ol style="margin-top: 25px;padding-left: 0;">
        <?php
        // var_dump($data);
        if($data['tasks']){
            include('views/partials/_tasks.php');
        }else{
            echo '<li style="list-style: none; width: 500px;" class="alert alert-danger" role="alert">'.$data['errors']['task'].'</li>';
        }
        ?>

    </ol><hr>
    <h1>Ajouter une tâche</h1>

    <form action="index.php"
          method="post" class="form-group row">
        <label for="description" class="textfield">
            <input type="text" name="description" id="description" size="80" class="form-control form-control-lg">
            <span >Description</span>
        </label>
        <input type="hidden" name="r" value="task">
        <input type="hidden" name="a" value="create">
        <button type="submit" class="btn btn-primary">Créer cette nouvelle tâche</button>
    </form>
</div>