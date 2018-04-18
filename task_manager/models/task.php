<?php 
	class Task {

		public $id;
		public $user_name;
		public $email;
		public $content;
		public $picture;
		public $state; //boolean: if 1 - done, else - 0. In view firs - not
					//done, then done

		public function __construct($id, $user_name, $email, $content, $picture, $state) {
			$this->id = $id;
			$this->user_name = $user_name;
			$this->email = $email;
			$this->content = $content;
			$this->picture = $picture;
			$this->state = $state;
		}

		public static function total_pages(){
			$db = Db::getInstance();
			$limit = 3;
			$total_tasks = $db->query("SELECT * FROM tasks");
			$total_tasks_array = $total_tasks->fetchAll();
			$total_pages = ceil(count($total_tasks_array)/$limit);

			return $total_pages;

		}

		public static function all($page){

			$list =[];
			$db = Db::getInstance();
			$limit = 3;
			$offset = ($page-1)*$limit;
			$req = $db->query("SELECT * FROM tasks LIMIT $offset, $limit");

			foreach ($req->fetchAll() as $task) {
				$list[] = new Task($task['id'], $task['user_name'], $task['email'], $task['content'], $task['picture'], $task['state']);
			}

			return $list;
		}

		public static function sorted_by_name($page) {
			$list = [];
			$db = Db::getInstance();
			$limit = 3;
			$offset = ($page-1)*$limit;
			$req = $db->query("SELECT * FROM tasks ORDER BY user_name LIMIT $offset, $limit");

			foreach ($req->fetchAll() as $task) {
				$list[] = new Task($task['id'], $task['user_name'], $task['email'], $task['content'], $task['picture'], $task['state']);
			}

			return $list;

		}

		public static function sorted_by_email($page) {
			$list = [];
			$db = Db::getInstance();
			$limit = 3;
			$offset = ($page-1)*$limit;
			$req = $db->query("SELECT * FROM tasks ORDER BY email LIMIT $offset, $limit");

			foreach ($req->fetchAll() as $task) {
				$list[] = new Task($task['id'], $task['user_name'], $task['email'], $task['content'], $task['picture'], $task['state']);
			}

			return $list;

		}

		public static function sorted_by_state($page) {
			$list = [];
			$db = Db::getInstance();
			$limit = 3;
			$offset = ($page-1)*$limit;
			$req = $db->query("SELECT * FROM tasks ORDER BY state LIMIT $offset, $limit");

			foreach ($req->fetchAll() as $task) {
				$list[] = new Task($task['id'], $task['user_name'], $task['email'], $task['content'], $task['picture'], $task['state']);
			}

			return $list;

		}		

		public static function create_task($user_name, $email, $content, $picture){
			$list = [];
			$db = Db::getInstance();
			$req = $db->query("INSERT INTO tasks (user_name, email, content, picture) VALUES ('$user_name', '$email', '$content', '$picture')");
		}


		public function find($id){
			$db = Db::getInstance();

			$id = intval($id);
			$req = $db->prepare('SELECT * FROM tasks WHERE id = :id');

			$req->execute(array('id' => $id));
			$task = $req->fetch();

			return new Task($task['id'], $task['user_name'], $task['email'], $task['content'], $task['picture'], $task['state']);
		}
        
        public function task_completed($id){
			$db = Db::getInstance();

			$id = intval($id);
			$req = $db->prepare('UPDATE tasks SET state=1 WHERE id = :id');

			$req->execute(array('id' => $id));
            
            $req = $req = $db->prepare('SELECT * FROM tasks WHERE id = :id');
            $req->execute(array('id' => $id));
			$task = $req->fetch();

			return new Task($task['id'], $task['user_name'], $task['email'], $task['content'], $task['picture'], $task['state']);
            
        }
        
        public function edit($id, $user_name, $email, $content, $picture) {
            $db = Db::getInstance();
            
            $id = intval($id);
            $req = $db->prepare("UPDATE tasks SET user_name='$user_name', email='$email', content='$content', picture='$picture' WHERE id = :id");
            $req->execute(array('id' => $id));
        }
	}
?>