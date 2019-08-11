<?php

	 
	/**
	 * 
	 */
	class Database
	{
		private $db;
		
		public function __construct($db_host = Constante::DB_HOST, $db_name = Constante::DB_NAME, $user_name = Constante::USER_NAME, $pwd = Constante::PWD)
		{
			try {
				$this->db = new PDO("mysql:host=".$db_host.";dbname=".$db_name, $user_name, $pwd);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				die('Erreur'.$e->getMessage());
			}
		}

		public function getDB(){
			return $this->db;
		}

	// POUR LES UTILISATEURS
		public function addUser(Users $user){
			try {
				$q = $this->getDB()->prepare("INSERT INTO users VALUES(null, :nom, :prenom, :email, :tel, :login, :mdp)");
				$resultat = $q->execute([
					'nom'=> $user->getNom(),
					'prenom'=> $user->getPrenom(),
					'email'=> $user->getEmail(),
					'tel'=> $user->getTel(),
					'login'=> $user->getLogin(),
					'mdp'=> $user->getMdp()
					
				]);
			} catch (PDOException $e) {
				message("La valeur du champs login est déjà existante");
			}

			return $resultat;
		}

		public function updateUserInfos($nom, $prenom, $email, $tel){
			try {
				$q = $this->getDB()->prepare("UPDATE  users SET nom =:nom, prenom =:prenom, email =:email, tel =:tel");
				$resultat = $q->execute([
					'nom'=> $nom,
					'prenom'=> $prenom,
					'email'=> $email,
					'tel'=> $tel
				]);
			} catch (PDOException $e) {
				message("La valeur du champs login est déjà existante");
			}

			return $resultat;
		}

		//cette methode permet de tester l'existance de login et le password dans la base
		public function userHasBeenExist($login, $mdp){
			
			$q = $this->getDB()->prepare('SELECT * from users WHERE login = :login AND mdp = :mdp');
				$q->execute([
					'login' => $login,
					'mdp' => $mdp
				]);

				$donnees = $q->fetch(PDO::FETCH_OBJ);

				return $donnees;

		}

		public function getAllUsers(){
			$q = $this->getDB()->prepare('SELECT * FROM users WHERE profile = "user" ');
			$q->execute();

			$data = $q->fetchAll(PDO::FETCH_OBJ);

			return $data;
		}

		 public function updateUser($id){
		 	$q = $this->getDB()->prepare('UPDATE users SET status = "1" 
		 		WHERE id = :id');
		 	$result = $q->execute([
		 		'id' => $id
		 	]);

		 	return $result;
		 }

// POUR LES PUBLICATIONS
		public function addStatus(Status $st){
			try {
				$q = $this->getDB()->prepare('INSERT INTO status VALUES(null, :id_user, :content, :titre)');
				$result = $q->execute([
					'id_user' => $st->getId_user(),
					'content' => $st->getContent(),
					'titre' => $st->getTitre()
				]);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		
			return $result;
		}

		public function getAllStatusByGroup(){
			$q =$this->getDB()->prepare('SELECT st.id as id ,content, titre, nom, prenom, id_user 
				FROM status st, users u
				WHERE st.id_user = u.id
				ORDER BY st.id desc');
			$q->execute();
			$donnees = $q->fetchAll(PDO::FETCH_OBJ);

			return $donnees;
		}

		public function getStatusById($idst){
			try{
				$q =$this->getDB()->prepare('SELECT st.id as id ,content, titre, nom, prenom, id_user 
				FROM status st, users u
				WHERE (st.id_user = u.id AND st.id = :idst)
				');
				$q->execute(['idst' => $idst]);
				$donnees = $q->fetch(PDO::FETCH_OBJ);

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $donnees;
		}

// POUR LES COMMENTAIRES
		public function addComment(Comments $com){
			try {
				$q = $this->getDB()->prepare('INSERT INTO comments VALUES(null, :id_status, :id_user1, :id_user2, :content)');
				$result = $q->execute([
					'id_status' => $com->getId_status(),
					'id_user1' => $com->getId_user1(),
					'id_user2' => $com->getId_user2(),
					'content' => $com->getContent()
				]);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		
			return $result;
		}

		public function getAllCommentsByIdStatus($id_status){
			try{
				$q =$this->getDB()->prepare('SELECT c.id as id ,nom, prenom, content
				FROM comments c, users u
				WHERE (c.id_status = :id_status AND c.id_user2 = u.id) ORDER BY c.id desc
				');
				$q->execute(['id_status' => $id_status]);
				$donnees = $q->fetchAll(PDO::FETCH_OBJ);

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $donnees;
		}

		public function getCommentsById($idcom){
			try{
				$q =$this->getDB()->prepare('SELECT * FROM comments 
				      WHERE id = :id ');
				$q->execute(['id'=>$idcom]);
				$donnees = $q->fetch(PDO::FETCH_OBJ);

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $donnees;
		}

// POUR LES NOTIFICATIONS
		public function addNotification(Notification $notif){
			try {
				$q = $this->getDB()->prepare('INSERT INTO notifications(subject_id, name, user_id)
					 VALUES(:subject_id, :name, :user_id)');
				$result = $q->execute([
					'subject_id' => $notif->getSubject_id(),
					'name' => $notif->getName(),
					'user_id' => $notif->getUser_id()
				]);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		
			return $result;
		}

		public function getNotificationByUserID($iduser){
			try{
				$q =$this->getDB()->prepare("SELECT n.id as id, nom, prenom, email, subject_id, name, user_id ,seen
				 FROM notifications n, users u 
				 WHERE u.id = user_id AND subject_id = ?
				 ORDER BY n.id DESC
				");
				$q->execute([$iduser]);
				$donnees = $q->fetchAll(PDO::FETCH_OBJ);

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $donnees;
		}

		public function updateUserNotification($iduser){
			$q = $this->getDB()->prepare("UPDATE notifications SET seen = '1' WHERE subject_id = ?");
 			$q->execute([$iduser]);

		}

		public function getCountNotificationByIdUser($iduser){
			
			 $q = $this->getDB()->prepare("SELECT id FROM notifications
			 WHERE subject_id = ? AND seen = '0'");
			
			 $q->execute([$iduser]);
			
			 $count = $q->rowCount();

			 return $count;
		}

// LES REPONSES
		public function addReponse(Reponse $rep){
			try {
				$q = $this->getDB()->prepare('INSERT INTO reponse
					 VALUES(null,:id_comments, :id_user, :content)');
				$result = $q->execute([
					'id_comments' => $rep->getId_comment(),
					'id_user' => $rep->getId_user(),
					'content' => $rep->getContent()
				]);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		
			return $result;
		}

		public function getReponseByIdCom($idcom){
			try{
				$q =$this->getDB()->prepare("SELECT content, nom, prenom
				 FROM reponse r, users u 
				 WHERE r.id_user = u.id AND r.id_comments = ?
				 ORDER BY r.id DESC
				");
				$q->execute([$idcom]);
				$donnees = $q->fetchAll(PDO::FETCH_OBJ);

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $donnees;
		}
	}
?>