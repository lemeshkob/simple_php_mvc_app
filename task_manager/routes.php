<?php 
	function call($controller, $action) {
		require_once('controllers/'.$controller.'_controller.php');

		switch ($controller) {
			case 'tasks':
				require_once('models/task.php');
				$controller = new TasksController();
			break;
		}

		$controller->{ $action }();
	}

	$controllers = array('tasks' => [
		'index',
		'sort_by_name',
		'sort_by_email',
		'sort_by_state',
		'create_task',
        'complete_task',
        'edit_task',
		'show',
		'error',
	]);

	if (array_key_exists($controller, $controllers)) {
		if (in_array($action, $controllers[$controller])) {
			call($controller, $action);
		} else {
			call('tasks', 'error');
		}
	}  else {
			call('tasks', 'error');
	}
?>