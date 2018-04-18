<div class="container">
    <form method="POST" action="?controller=tasks&action=create_task" enctype="multipart/form-data">
        <div class="form-group">
            <label for="example-text-input">Name</label>
            <input class="form-control" type="text" name='name' value="<?php echo $task->user_name ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $task->email ?>" name='email'>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleTextarea">Task content</label>
            <textarea class="form-control" id="exampleTextarea" rows="3" name='content'><?php echo $task->content ?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="picture">
            <small id="fileHelp" class="form-text text-muted">Please, choose a picture to make your task looks better</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>