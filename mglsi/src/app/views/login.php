<div class="row">
<div class="col-sm-4">
</div>
<div class="col-sm-4">
<div class="page-header">
            <h3>Connexion</h3>
        </div>
<form method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">Login</label><span class="text-danger">*</span></label>
    <input type="text" name="login" class="form-control" value="<?= $resultat['pseudo'] ?>" id="formGroupExampleInput" placeholder="Hassane">
  <span class="text-danger"><?= $resultat['pseudo_err'] ?></span>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Mot de passe</label><span class="text-danger">*</span></label>
    <input type="password" name="password" value="<?= $resultat['password'] ?>" class="form-control" id="formGroupExampleInput2" placeholder="passer123">
    <span class="text-danger"><?= $resultat['password_err'] ?></span>
  </div>
  <p class="text-danger"><strong><?= $resultat['message'] ?></strong></p>
				<?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        if ($_SESSION['user']['role'] == 'admin') {
            echo "<meta http-equiv='refresh' content='0; url =/' />";
            echo "Redirection en cours...";
        } else {
            echo "<meta http-equiv='refresh' content='0; url =/' />";
            echo "Redirection en cours...";
        }
    }
    ?>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
</div>
<div class="col-sm-4">
</div>
</div>