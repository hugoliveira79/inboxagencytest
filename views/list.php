<?php include('menu.php') ?>
<div class="col-xs-10 col-xs-offset-1 book-list">
	<?php
		$bookList=getAllBooks($conn);
	?>
	
	<ul>
			<?php
				for($i=0;$i<count($bookList);$i++){?>
				<li>
					<div class="col-xs-4 frame"><img src="images/<?php echo $bookList[$i]->getCover(); ?>"></div>
					<div class="col-xs-4 title"><?php echo $bookList[$i]->getTitle()?></div>
					<div class="col-xs-4 add-btn" onclick="addToCart(<?php echo $bookList[$i]->getId()?>);">Add to Shopping Cart</div>
					
				</li>
	
				<?php	}
			?>
	</ul>

	<div class=" checkout-button"><a href="index.php?area=checkout">Checkout</a></div>
	<div class="messages"></div>

</div>