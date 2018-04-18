<div class="container-fluid">
	<h3>Here is the list of all tasks:</h3>	
</div>

<a href="?controller=tasks&action=sort_by_name">Sort by name</a>
<a href="?controller=tasks&action=sort_by_email">Sort by email</a>
<a href="?controller=tasks&action=sort_by_state">Sort by state</a>

<div class="container-fluid">
<div class="row"> 

<?php foreach($tasks as $task) { ?>

<div class="col-4 col-sm-4 col-xl-4 card" style="background-color: #efefef;">
   <?php echo '<img class="card-img-top" style="width: 320px; height: 240px;"  src="data:image/jpeg;base64,'.base64_encode( $task->picture ).'"/>'; ?>
   <div class="card-body">
       <h2 class="card-title"><?php echo $task->user_name; ?></h2>
       <h6 class="card-text" style="color: #7a7a7a;"><?php echo $task->email; ?></h6>
           <p class="card-text"><?php echo substr($task->content, 0, 50); ?><qqq style="color: #7a7a7a;">...</qqq></p>

           
           	<?php if (!$task->state) { ?>         		
           		<h6 class="card-text" style="color: #a3002b;">Status: Not finished yet</h6>
           	<?php } else { ?>
           		<h6 class="card-text" style="color: #83f442;">Status:Done</h6>
           	<?php } ?>

           <a href='?controller=tasks&action=show&id=<?php echo $task->id; ?>' class="btn btn-primary">Show task</a>
       </div>
   </div>
<?php } ?>
</div>
</div>
<div class="cotainer-fluid">


<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item">
      <span class="page-link"><a href="<?php echo "?controller=tasks&action=$current_action&page=1"; ?>">First</a></span>
    </li>
    <li class="page-item"><span class="page-link <?php if($page <= 1){ echo 'disabled'; } ?>"><a href="<?php if($page <= 1){ echo '#'; } else { echo "?controller=tasks&action=$current_action&page=".($page - 1); } ?>">Previous</a></span></li>
    <li class="page-item"><a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?controller=tasks&action=$current_action&page=".($page + 1); } ?>">Next</a></li>
    <li class="page-item">
      <a class="page-link" href="<?php if($total_pages == 1){echo "#";} else { echo "?controller=tasks&action=$current_action&page=".$total_pages;} ?>">Last</a>
    </li>
  </ul>
</nav>
</div>