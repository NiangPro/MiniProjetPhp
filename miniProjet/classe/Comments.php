<?php 

	/**
	* 
	*/
	class Comments
	{
		private $id_status;
		private $id_user1;
		private $id_user2;
		private $content;
		
		function __construct($id_status, $id_user1, $id_user2, $content)
		{
			$this->setId_status($id_status);
			$this->setId_user1($id_user1);
			$this->setId_user2($id_user2);
			$this->setContent($content);
			
		}

		public function setId_status($id_status){$this->id_status = $id_status;}
		public function setId_user1($id_user1){$this->id_user1 = $id_user1;}
		public function setId_user2($id_user2){$this->id_user2 = $id_user2;}
		public function setContent($content){$this->content = $content;}
		
		public function getId_status(){return $this->id_status;}
		public function getId_user1(){return $this->id_user1;}
		public function getId_user2(){return $this->id_user2;}
		public function getContent(){return $this->content;}
	}

 ?>