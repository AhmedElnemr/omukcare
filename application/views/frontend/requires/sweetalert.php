<?php if (isset($_SESSION['sweet'])) { ?>
	<?php if ($_SESSION['sweet'] == "success_market_order") { ?>
      <script>
		  $(function() {
			  swal("Order send succesfuly!", "", "success");
			  shoppingCart.clearCart();
		  });
	  </script>
	<?php } ?>

	<?php $_SESSION['sweet'] = "" ;?>
<?php } ?>
