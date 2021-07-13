<?php include('menu.php') ?>
<div class="checkout">

<?php
	if(isset($_SESSION['shopping_cart']) && count($_SESSION['shopping_cart']>0)){ ?>
		<ul>
	<?php
		$total=0;
		for($i=0;$i<count($_SESSION['shopping_cart']);$i++){ ?>
			<li>
				<?php
					
					$book_detail=getBooksById($conn, $_SESSION['shopping_cart'][$i]); 
					$total+=$book_detail[0]->getPrice();
					echo $book_detail[0]->getTitle(); 
				?>
			</li>	
		<?php }
		?>
	</ul>
	<div>Total: <?php echo $total; ?></div>
	<div class="col-xs-5 btn-primary go-back"> <a href="index.php?area=list">Go Back</a>  </div>
	<div class="col-xs-2"></div>
	<div class="col-xs-5 btn-primary go-back">
		<a href="purchase/process-checkout.php">Confirm</a></div>
	
	<?php
 
	} else { ?>
		<div>No Books Selected. Go to <a class="btn-primary " href="index.php?area=list">Book list</a>
	<?php }
?>
</div>