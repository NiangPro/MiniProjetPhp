<?php 

	/**
	 * 
	 */
	class Reponse
	{
		private $id_comments;
		private $id_user;
		private $content;
		
		function __construct($id_comments, $id_user, $content)
		{
			$this->setId_comment($id_comments);
			$this->setId_user($id_user);
			$this->setContent($content);
		}

		public function getId_comment(){return $this->id_comments;}
		public function getId_user(){return $this->id_user;}
		public function getContent(){return $this->content;}
		

		public function setId_comment($id_comments){ $this->id_comments = $id_comments;}
		public function setId_user($id_user){ $this->id_user = $id_user;}
		public function setContent($content){ $this->content = $content;}
		
		
	}
 ?>