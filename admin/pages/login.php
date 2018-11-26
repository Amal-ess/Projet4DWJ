<?php
	if(isset($_SESSION['admin'])){
		header("Location:index.php?page=dashboard");
	}
?>


<div class="row">
	<div class="col l4 m6 s12 offset-l4 offset-m3">
		<div class="card-panel">
			<div class="row">
				<img src="../img/admin2.png" alt="utilisateur" width="100%"/>
			</div>
<?php
		if(isset($_POST['submit'])){
			$email = htmlspecialchars(trim($_POST['email']));
			$password = htmlspecialchars(trim($_POST['password']));

			$errors=[];
			if(empty($email) OR empty($password)){
				$errors['empty'] = "Les champs n'ont pas été remplis!";
			} else if(is_admin($email,$password) == 0){
				$errors['exist'] = "cet administrateur n'existe pas!";
			}

			if(!empty($errors)){
				?>
				<div class="card red">
					<div class="card-content white-text">
						<?php foreach($errors as $error){
							echo $error."<br/>";
						}
?>
					</div>
				</div>
<?php

				}else{
					$_SESSION['admin'] = $email;
					header("Location:index.php?page=dashboard");
				}
			}
?>
		<form method="post">
			<div class=row>
				<div class="col s12">
					<label for="email">Adresse email</label>
					<input type="email" id="email" name="email"/>
				</div>
			</div>
			<div class=row>
				<div class="col s12">
					<label for="password">Mot de passe</label>
					<input type="password" id="password" name="password"/>
				</div>
			</div>
			<center><button type="submit" name="submit" class="waves-effect btn pink darken-4"> Se connecter </button></center>
		</form>
		</div>
	</div>
</div>
