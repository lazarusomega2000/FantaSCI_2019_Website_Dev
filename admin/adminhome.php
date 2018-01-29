<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); exit(); }

//define page title
$title = 'Administration';

//include header template
require('layout/adminheader.php');

//retrieve action to take if filled
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

//retrieve or set the page for the main admin menus
if(!isset($_GET['p'])){		//if there is no variable 'p' passed into the page, sets initial page
	$q = $db->query("SELECT * FROM pages WHERE pageID='8'");
	$id='8';
	$tml='1';
	} else { 				//if variable passed, locate page and pass variables for active menu items
		$id = trim(strip_tags($_GET['p']));
		$q = $db->query("SELECT * FROM pages WHERE pageID='$id' LIMIT 1");
		$rowtop = $q->fetch();
		$tml = $rowtop['pageParent'];
		if($rowtop['pageParent']==$rowtop['pageID']){
			$s = $db->query('SELECT * FROM pages WHERE pageParent='.$tml.' AND isRoot=0 LIMIT 1');
			$rowtop = $s->fetch();
			$id = $rowtop['pageID'];
		}
	}
?>
   
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="adminhome.php">Dashboard</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">

    <?php require('layout/topnavcontent.php')?> <!-- Link to Content for Top Nav -->

        <form class="form-inline mt-2 mt-md-0">
            <a class="btn btn-outline-danger my-2 my-sm-0" href="logout.php" type="submit">Log Out</a>
        </form>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
            <?php require('layout/sidenavcontent.php')?> <!-- Link to Content for Side Nav -->
        </nav>

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">

            <h4><?php echo 'Page ID: '.$id . ' ---remove after testing ---' ?></h4>
            <?php 
                switch ($id) {
                    case '11':
                        require ('layout/newsroom/newsadmin.php');
                        break;
                    default:
                        echo '<h1>defaulted<h1>';
                }
            ?>    
        </main>
    </div>
</div>

<?php 
//include header template
require('layout/footer.php'); 
?>
