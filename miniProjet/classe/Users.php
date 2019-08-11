<?php 

	/**
	 * 
	 */
	class Users
	{
		private $nom;
		private $prenom;
		private $email;
		private $tel;
		private $login;
		private $mdp;
		
		// LE CONSTRUCTEUR
		function __construct($nom, $prenom, $email, $tel, $login, $mdp)
		{
			$this->setNom($nom);
			$this->setPrenom($prenom);
			$this->setEmail($email);
			$this->setTel($tel);
			$this->setLogin($login);
			$this->setMdp($mdp);
		}

		// LES SETTERS
		public function setNom($nom){$this->nom = $nom;}
		public function setPrenom($prenom){$this->prenom = $prenom;}
		public function setEmail($email){$this->email = $email;}
		public function setTel($tel){$this->tel = $tel;}
		public function setLogin($login){$this->login = $login;}
		public function setMdp($mdp){$this->mdp = $mdp;}
		
		// LES GETTERS
		public function getNom(){return $this->nom;}
		public function getPrenom(){return $this->prenom ;}
		public function getEmail(){return $this->email ;}
		public function getTel(){return $this->tel;}
		public function getLogin(){return $this->login ;}
		public function getMdp(){return $this->mdp ;}
		
	}
 ?>