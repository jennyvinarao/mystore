<?php 
	$pageTitle = "My Store";
	
?>


<?php 

require_once '../partials/template.php';
require_once '../controllers/connect.php';


?>

<?php function get_page_content() { ?>

	<div class="container-fluid">
		<div class="jumbotron bg-dark my-3 p-5">
			<h1 class="display-4 text-light">MyStore</h1>	
			<p class="display-6 text-light">Your all-in store!</p>

		</div>

	</div>



<?php }?>