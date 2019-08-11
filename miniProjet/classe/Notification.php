<?php 
	/**
	 * 
	 */
	class Notification
	{
		private $subject_id;
		private $name;
		private $user_id;
		
		function __construct($subject_id, $name, $user_id)
		{
			$this->setSubject_id($subject_id);
			$this->setName($name);
			$this->setUser_id($user_id);
		}

		public function getSubject_id(){return $this->subject_id;}
		public function getUser_id(){return $this->user_id;}
		public function getName(){return $this->name;}

		public function setSubject_id($subject_id){ $this->subject_id = $subject_id;}
		public function setUser_id($user_id){ $this->user_id = $user_id;}
		public function setName($name){ $this->name = $name;}
	}
 ?>