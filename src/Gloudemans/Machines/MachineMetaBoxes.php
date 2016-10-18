<?php

namespace Gloudemans\Machines;

class MachineMetaBoxes {

	/**
	 * Add meta boxes
	 */
	public function __construct()
	{
		add_action('add_meta_boxes', [$this, 'addMachineMetaBoxes']);
//		add_action('save_post', [$this, 'saveMeta']);
	}

	/**
	 * Add the machine meta boxes
	 */
	public function addMachineMetaBoxes()
	{
		add_meta_box('machine-specifications', 'Specificaties', [$this, 'renderMachineMetaBoxes'], 'machine', 'advanced', 'high');
	}

	/**
	 * Render the product meta boxes
	 *
	 * @param $post
	 */
	public function renderMachineMetaBoxes($post)
	{
        $body = get_post_meta($post->ID, 'carrosserie', true);
        $fuel = get_post_meta($post->ID, 'brandstof', true);
        $transmission = get_post_meta($post->ID, 'transmissie', true);
        $vat = get_post_meta($post->ID, 'btw_marge', true);
        $color = get_post_meta($post->ID, 'basiskleur', true);
        $buildyear = get_post_meta($post->ID, 'bouwjaar', true);
        $price = get_post_meta($post->ID, 'price', true);

		?>
			<table class="form-table">
                <tbody>
					<tr>
						<th scope="row"><label for="machine-price">Prijs</label></th>
						<td><input type="text" name="machine-price" id="machine-price" value="<?php echo $price;?>" class="regular-text" readonly></td>
					</tr>
                    <tr>
                        <th scope="row"><label for="machine-fuel">Brandstof</label></th>
                        <td><input type="text" name="machine-fuel" id="machine-fuel" value="<?php echo $fuel;?>" class="regular-text" readonly></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="machine-body">Carrosserie</label></th>
                        <td><input type="text" name="machine-body" id="machine-body" value="<?php echo $body;?>" class="regular-text" readonly></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="machine-transmission">Transmissie</label></th>
                        <td><input type="text" name="machine-transmission" id="machine-transmission" value="<?php echo $transmission;?>" class="regular-text" readonly></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="machine-vat">BTW marge</label></th>
                        <td><input type="text" name="machine-vat" id="machine-vat" value="<?php echo $vat;?>" class="regular-text" readonly></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="machine-color">Basiskleur</label></th>
                        <td><input type="text" name="machine-color" id="machine-color" value="<?php echo $color;?>" class="regular-text" readonly></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="machine-buildyear">Bouwjaar</label></th>
                        <td><input type="text" name="machine-buildyear" id="machine-buildyear" value="<?php echo $buildyear;?>" class="regular-text" readonly></td>
                    </tr>
				</tbody>
			</table>
		<?php
	}

//	/**
//	 * Save the post meta
//	 *
//	 * @param $post_id
//	 */
//	public function saveMeta($post_id)
//	{
//		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
//
//		if(isset($_POST['product-price']))
//		{
//			$price = $_POST['product-price'];
//
//			$price = str_replace(',', '.', $price);
//
//			update_post_meta($post_id, 'product-price', $price);
//		}
//
//		if(isset($_POST['product-sale']))
//		{
//			update_post_meta($post_id, 'product-sale', 1);
//		}
//		else
//		{
//			update_post_meta($post_id, 'product-sale', 0);
//		}
//
//		if(isset($_POST['product-slideshow']))
//		{
//			$productSlider = $_POST['product-slideshow'];
//
//			update_post_meta($post_id, 'product-slideshow', $productSlider);
//		}
//
//		if(isset($_POST['product_specifications']))
//		{
//			$productSpecifications = $_POST['product_specifications'];
//
//			update_post_meta($post_id, 'product-specifications', $productSpecifications);
//		}
//	}

}