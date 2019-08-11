<?php 

	/**
	 * 
	 */
	class FormStatus extends FormUsers
	{
		
		public function textearea($name, $libelle){
			echo '<div class="form-group">  
						<label for="'.$name.'" class="sr-only">'.$libelle.':</label>
						<textarea name="'.$name.'" id="'.$name.'" placeholder="Alors quoi de neuf ?" rows="3" class="form-control" required></textarea>
					</div>';
		}

		public function selectTitre($name){
			echo '
			<div class="form-group"><u>Titre</u> : 
				<select name="'.$name.'">
					<option>Informatique</option>
					<option>Litterature</option>
					<option>Musique</option>
					<option>Social</option>
					<option>Sports</option>
				</select>
			</div>
			';
		}

		public function startArticle($prenom, $nom, $titre){
			echo '<article class="media status-media">
    
						    <div class="media-body">
						    	<div class="row media-heading">
						        <div class="col-xs-7 "><h4>'.$prenom.' '.$nom.'<h4></div>
						        <div class="col-xs-4 "><h4>'.$titre.'</h4></div>
						        </div>
						        ';
		}

		public function startArticleComments($prenom, $nom, $class){
			echo '<article class="media status-media '.$class.'">
    
			    <div class="media-body">
			    	<div class="row media-heading">
			        <div class="col-xs-12 "><h4>'.$prenom.' '.$nom.'<h4></div></div>
		         ';
		}

		public function endArticle(){
			echo  '</div>
						</article>';
		}

		
		public function btnStatus($name, $libelle){
			echo '<div class="form-group status-post-submit">
						<button type="submit" name="'.$name.'" class="btn btn-success btn-xs">'.$libelle.'
					</div>';
		}

		public function btnComment($libelle,$lien){
			return '<a href="'.$lien.'" class="btn btn-info pull-right">'.$libelle.'</a>';
		}

		public function afficheCurrentUser($login, $nom, $prenom, $email, $tel){
			echo $this->startFormUser("container col-md-4 col-md-offset-1 well spacer", "Information de ".$login);
				$this->printInfo("col-xs-6", "NOM : ", $nom);
				$this->printInfo("col-xs-6", "PRENOM : ", $prenom);
				$this->printInfo("col-xs-6", "EMAIL : ", $email);
				$this->printInfo("col-xs-6", "TELEPHONE : ", "<i class='fa fa-phone'></i> ".$tel);
			echo $this->endFormUser();
		}


	}
 ?>