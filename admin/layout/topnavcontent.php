<ul class="navbar-nav mr-auto">
    <?php
		
		$stmt = $db->query('SELECT * FROM pages WHERE isRoot=1 ORDER BY pageID');
		while($row = $stmt->fetch()){
			echo '<li><a class="nav-link';
			if($tml==$row['pageParent']){
				echo ' active';
			}
			echo '" href="adminhome.php?p='.$row['pageID'].'">'.$row['pageTitle'].'</a></li>';
			}
	?>
</ul>