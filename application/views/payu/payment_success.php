<?php 
// include "templates/header.php"; 
?>	
  	<div id="all">
  		<?php 
  		$order_session = $this->session->flashdata("order_id");
        if(!empty($order_session)){
  		?>
	       	<h2> Your payment was successfully completed. Please check your order status. </h2>
	       	<h4> Please note your order id - <?php echo $this->session->flashdata('order_id'); ?> </h4>
	       	<p> Do not hit refresh. Go back to <a href="<?php echo base_url(); ?>"> Home </a></p>
	    <?php
		}
		else {
		?> 
			<h2> Some problem was occcured </h2>
	       	<p> Do not hit refresh. Go back to <a href="<?php echo base_url(); ?>"> Home </a></p>
	    <?php
	   	}
	   	?>
  	</div><!--all-->
<?php 
// include "templates/footer.php"; 
?>

<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button"; //again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script> 

