<?php 
	class TasksController {
		public function index() {
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				} else {
					$page = 1;
				}
			$tasks = Task::all($page);
			$total_pages = Task::total_pages();
			$current_action = 'index';
			require_once('views/tasks/index.php');
		}

		public function show() {
			if (!isset($_GET['id']))
				return call('tasks', 'error');

			$task = Task::find($_GET['id']);
			$current_action = "index";		
			require_once('views/tasks/show.php');
		}

		public function sort_by_name() {
			if (isset($_GET['page'])) {
					$page = $_GET['page'];
				} else {
					$page = 1;
				}

			$tasks = Task::sorted_by_name($page);
			$total_pages = Task::total_pages();
			$current_action = "sort_by_name";
			require_once('views/tasks/index.php');
		}

		public function sort_by_email() {

			if (isset($_GET['page'])) {
					$page = $_GET['page'];
				} else {
					$page = 1;
				}

			$tasks = Task::sorted_by_email($page);
			$total_pages = Task::total_pages();
			$current_action = "sort_by_email";
			require_once('views/tasks/index.php');
		}

		public function sort_by_state() {

			if (isset($_GET['page'])) {
					$page = $_GET['page'];
				} else {
					$page = 1;
				}

			$tasks = Task::sorted_by_state($page);
			$total_pages = Task::total_pages();
			$current_action = "sort_by_state";
			require_once('views/tasks/index.php');
		}

		public function create_task(){
            require_once('views/tasks/create_task.php');
            
			if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['content']) && isset($_FILES['picture']['tmp_name'])) {
				$user_name = $_POST['name'];
				$email = $_POST['email'];
				$content = $_POST['content'];
				$picture = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
                
                Task::create_task($user_name, $email, $content, $picture);
			} else {
             //return call('tasks', 'error');   
			}			
		}
        
        public function complete_task(){
            if(isset($_GET['id'])){
                $task = Task::task_completed($_GET['id']);
                require_once('views/tasks/show.php');
            } else {
                return call('tasks', 'error');
            }
        }
        
        public function edit_task(){
            $task = Task::find($_GET['id']);            
			if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['content']) && isset($_FILES['picture']['tmp_name']) && isset($_GET['id'])) {
				$user_name = $_POST['name'];
				$email = $_POST['email'];
				$content = $_POST['content'];
				$picture = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
                $id = $_GET['id'];
                
                Task::edit($id, $user_name, $email, $content, $picture);
			}
            require_once('views/tasks/edit.php');
        }

		public function error() {
			require_once('views/tasks/error.php');
		}
	}
?>