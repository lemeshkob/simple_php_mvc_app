<h3>This is the requested task:</h3>

<div class="container-fluid">
    <div class="container-fluid" style="background-color: #efefef;">
        <?php echo '<img class="card-img-top mx-auto d-block" style="width: 480px; height: 360px;"  src="data:image/jpeg;base64,'.base64_encode( $task->picture ).'"/>'; ?>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <h2 class="card-title">
                    <?php echo $task->user_name; ?>
                </h2>
                <h6 class="card-text" style="color: #7a7a7a;">
                    <?php echo $task->email; ?>
                </h6>
                <p class="card-text">
                    <?php echo $task->content; ?>
                </p>
                <?php if (!$task->state) { ?>
                <h6 class="card-text" style="color: #a3002b;">Status: Not finished yet</h6>
                <?php } else { ?>
                <h6 class="card-text" style="color: #83f442;">Status:Done</h6>
                <?php } ?>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="container col-sm-4">
                        <a href='?controller=tasks&action=complete_task&id=<?php echo $task->id; ?>' class="btn btn-success <?php if ($task->state){echo 'disabled';} ?>">Complete</a>
                    </div>
                    <div class="container col-sm-4">
                        <a href='?controller=tasks&action=edit_task&id=<?php echo $task->id; ?>' class="btn btn-success">Edit</a>
                    </div>
                    <div class="container col-sm-4">
                        <a href="/" class="btn btn-primary"><< Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
