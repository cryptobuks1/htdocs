<div class="gmpMapsContainer">
	<script type='text/javascript'>
		var existsMapsArr = JSON.parse('<?php  echo utilsGmp::listToJson($this->mapsArr);?>');
		var defaultOpenTab = "gmpAddMap";
	</script>
	<div id="gmpAllMapsListShell">
		<?php echo $this->allMaps?>
	</div>
</div>
