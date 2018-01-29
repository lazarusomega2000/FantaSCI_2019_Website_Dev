<span class="text-center"><h1>News Releases</h1></span>
 
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
 
<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>
 
      <table class="table table-striped table-bordered table-sm">
        <tr>
          <th>Title</th>
          <th>Publication Date</th>
          <th></th>
        </tr>
 
<?php foreach ( $results['articles'] as $article ) { ?>
 
        <tr>
          <td><?php echo $article->title?></td>
          <td><?php echo date('j M Y', $article->publicationDate)?></td>
          <td>
              <a href="adminhome.php?p=11&action=editArticle&amp;articleId=<?php echo $article->id?>" class="btn btn-outline-primary btn-sm" role="button">edit</a>
              <a href="#" class="btn btn-outline-success btn-sm disabled" role="button">publish</a>
              <a href="adminhome.php?p=11&action=deleteArticle&amp;articleId=<?php echo $article->id?>" class="btn btn-outline-warning btn-sm" onclick="return confirm('Delete Article: <?php echo $article->title?>?')">delete</a>
          </td>
        </tr>
 
<?php } ?>
 
      </table>
 
      <p><?php echo $results['totalRows']?> article<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>

      <p><a class="btn btn-primary" href="adminhome.php?p=11&action=newArticle">Add a New Article</a></p>