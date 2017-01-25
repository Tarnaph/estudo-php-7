<!-- footer -->
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

<!-- Form Select -->
<script>
	// Form Select
	$(document).ready(function() 
	{
		$('select').material_select();
	});

	// Dialogs
	$(document).ready(function()
	{
		$('.tooltipped').tooltip({delay: 50});
	}); 

	//Data Pick
	$('.datepicker').pickadate(
	{
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 45 // Creates a dropdown of 90 years to control year
  });  

    var options = 
  [{
  	selector: '#dropdown1', offset: 0, callback: function() 
	  { Materialize.toast("<?php echo $erro; ?>", 1500 ); }
	}]; 
  Materialize.scrollFire(options); 
   
</script>

</body>
</html>
<?php ob_flush();?>
