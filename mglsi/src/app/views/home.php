<div class="row">
    <h2>Bienvenue sur mon site chers 
     <?php
    if (isset($_SESSION['user']['role']) && !empty($_SESSION['user']['role'])) {
        if ($_SESSION['user']['role'] == 'admin') {
            echo $_SESSION['user']['pseudo'];
        } else {
            echo $_SESSION['user']['pseudo'];
        }
    }

    ?>
    </h2>
    <div class="col-sm-8">
        <div class="page-header">
            <h3>Liste d'article categoriser</h3>
        </div>
        <?php
        if (!empty($articles)) {
            foreach ($articles as $article) : ?>

            <h3><a href="<?= $article->url; ?>"> <?= $article->titre; ?> </a></h3>

            <p><em><?= $article->libelle; ?></em></p>

            <p><?= $article->extrait; ?></p>
             <?php endforeach; ?>
        <?php 
    } else {
        echo "<p><em>Aucun donnée retrouver</em></p>";
    } ?>
    
    </div>
    <div class="col-sm-4">
        <div class="page-header">
            <h3>Categories d'Article</h3>
        </div>
        <ul>
            <?php foreach ($categories as $value) : ?>

                <li><a href="<?= $value->url; ?>"> <?= $value->libelle; ?> </a></li>

            <?php endforeach; ?>
        </ul>

    </div>
</div>
<nav aria-label="...">
  <ul class="pagination pagination-sm justify-content-center">
   <?php
    if (isset($pageno)) {
        for ($i = 1; $i <= $pageno; $i++) {
            echo "
			<li  class='page-item'><a href='/page?pageNumber=$i' class='page-link' page='$i' id='page'>$i</a></li>";
        }
    } else {
        echo "<li class='page-item disabled'>
      <a class='page-link' href='#' tabindex='-1'>1</a>
        </li> ";
    }
    ?>
  </ul>
</nav>