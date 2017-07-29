<?php
$ywot_options     = get_option( 'ywot_carriers' );
$items_per_column = 6;
$carriers         = Carriers::get_instance()->get_carrier_list();
$index            = 0;

?>

<tr>
	<td colspan="2">
		<label>
			<input type="checkbox" name="select_all" id="select_all"
			       value="1" onClick="toggle(this)"/><?php _e( "Select/Unselect all", 'yith-woocommerce-order-tracking' ); ?>
		</label>
	</td>
</tr>

<?php foreach ( $carriers as $key => $value ) : ?>

	<?php if ( ( $index % $items_per_column ) == 0 ) : ?>
		<tr>
	<?php endif; ?>
	<td style="vertical-align: top;">
		<label>
			<input type="checkbox" name="ywot_carriers[<?php echo $key; ?>]" id="<?php echo $key; ?>"
			       value="1" <?php is_checked_html( $ywot_options, $key ); ?> /><?php echo $value['name']; ?>
		</label>
	</td>
	<?php if ( ( ( $index + 1 ) % $items_per_column ) == 0 ) : ?>
		</tr>
	<?php endif;
	$index ++;
	?>
<?php endforeach; ?>

<script type="text/javascript">
	function toggle(source) {
		checkboxes = document.getElementsByTagName('input');
		for (var i = 0, n = checkboxes.length; i < n; i++) {
			checkboxes[i].checked = source.checked;
		}
	}
</script>