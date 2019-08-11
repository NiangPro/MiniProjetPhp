<?php 
	/**
	 * 
	 */
	class Status
	{
		private $id_user;
		private $content;
		private $titre;
		
		function __construct($id_user, $content, $titre)
		{
			$this->setId_user($id_user);
			$this->setContent($content);
			$this->setTitre($titre);
		}

		public function getId_user(){return $this->id_user;}
		public function getContent(){return $this->content;}
		public function getTitre(){return $this->titre;}

		public function setId_user($id_user){$this->id_user = $id_user;}
		public function setContent($content){$this->content = $content;}
		public function setTitre($titre){$this->titre = $titre;}
	}

 ?>