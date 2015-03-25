<div class="row">
	<div class="col-md-8">
		<form method="get" action="form-inline product-list-form">

			<?php $orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : null;?>
			<select name="orderBy" class="selectpicker products-order-by">
				<option title="Sorteren op: Standaard" value="" <?php selected('', $orderBy);?>>Standaard</option>
				<option title="Sorteren op: Prijs" value="price" <?php selected('price', $orderBy);?>>Prijs</option>
				<option title="Sorteren op: Naam" value="title" <?php selected('title', $orderBy);?>>Naam</option>
			</select>

			<?php $order = isset($_GET['order']) ? $_GET['order'] : 'asc';?>
			<button class="btn btn-info products-order"><i class="fa <?php echo $order == 'asc' ? 'fa-arrow-down' : 'fa-arrow-up';?>"></i></button>
			<select name="order" class="products-order-select hidden">
				<option value="asc" <?php selected('asc', $order);?>>Oplopend</option>
				<option value="desc" <?php selected('desc', $order);?>>Aflopend</option>
			</select>

			<?php $perPage = isset($_GET['perPage']) ? $_GET['perPage'] : null;?>
			<select name="perPage" class="selectpicker products-per-page">
				<option title="Toon: 9 per pagina" value="9" <?php selected(9, $perPage);?>>9 per pagina</option>
				<option title="Toon: 18 per pagina" value="18" <?php selected(18, $perPage);?>>18 per pagina</option>
				<option title="Toon: 36 per pagina" value="36" <?php selected(36, $perPage);?>>36 per pagina</option>
			</select>

		</form>
	</div>

	<div class="col-md-4">
	    <span class="pull-right products-listing-type">
	        <label>Weergeven als:</label>
	        <button class="btn <?php echo \Gloudemans\Products\ProductListing::getProductListingType() == 'list' ? 'btn-info' : 'btn-default';?> list"><i class="fa fa-list"></i></button>
	        <button class="btn <?php echo \Gloudemans\Products\ProductListing::getProductListingType() == 'grid' ? 'btn-info' : 'btn-default';?> grid"><i class="fa fa-th-large"></i></button>
		    <form method="post" action="">
			    <input type="hidden" name="listing-type" value="">
		    </form>
	    </span>
	</div>

</div>