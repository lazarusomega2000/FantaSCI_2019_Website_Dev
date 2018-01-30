<span class="text-center"><h1><?php echo $results['pageTitle']?></h1></span>
      

    <form action="adminhome.php?p=11&action=<?php echo $results['formAction']?>" method="post">
        
        <div class="form-group" type="hidden">
            <input type="hidden" name="articleId" value="<?php echo $results['article']->id ?>"/>
        </div>

        <?php if ( isset( $results['errorMessage'] ) ) { ?>
            <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
        <?php } ?>
        
        <div class="form-group">
            <label class="font-weight-bold" for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Name of the article" required maxlength="255" value="<?php echo htmlspecialchars( $results['article']->title )?>" />
        </div>
        <div class="form-group">
            <label for="summary">Summary</label>
            <textarea name="summary" class="form-control" id="summary" placeholder="Brief description of the article" required maxlength="1000" style="height: 5em;"><?php echo htmlspecialchars( $results['article']->summary )?></textarea>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="content" placeholder="The HTML content of the article" required maxlength="100000" style="height: 30em;"><?php echo htmlspecialchars( $results['article']->content )?></textarea>
        </div>
        <div class="form-group">
            <label for="publicationDate">Write Date</label>
            <input type="date"class="form-control" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $results['article']->publicationDate ? date( "Y-m-d", $results['article']->publicationDate ) : "" ?>" />
        </div>

        <div class="button">
            <button type="submit" name="saveChanges" value="Save Changes" class="btn btn-primary">Save Changes</button>
            <button type="submit" formnovalidate name="cancel" value="Cancel" class="btn btn-primary">Cancel</button>
            <?php if ( $results['article']->id ) { ?>
                <a href="adminhome.php?p=11&action=deleteArticle&amp;articleId=<?php echo $results['article']->id ?>" class="btn btn-warning" onclick="return confirm('Delete Article: <?php echo $article->title?>?')">Delete</a>
            <?php } ?>
        </div>
    </form>


