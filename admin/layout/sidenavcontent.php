<ul class="nav nav-pills flex-column">
 	<div class="text-center">
		<p>Welcome <b><?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?></b><p>
  	</div>
  	
  	<?php
	
		$stmt = $db->query('SELECT * FROM pages WHERE pageParent='.$tml.' AND isRoot=0 ORDER BY pageID');
		while($row = $stmt->fetch()){
			echo '<li><a class="nav-link';
			if($id==$row['pageID']){
				echo ' active';
			}
			echo '" href="adminhome.php?p='.$row['pageID'].'">'.$row['pageTitle'].'</a></li>';
			}
	?>
	
</ul>