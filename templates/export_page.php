<?php
/**
 * Simple template for admin view allowing us to request post export.
 */
?>
<h1><?php esc_html_e( 'Here you can export posts!', 'post-exporter' ); ?></h1>
<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
	<input type="hidden" name="action" value="export_posts"/>
	<fieldset>
		<legend>
			<p><em><?php esc_html_e( 'Upcoming version will allow you to select between data types.', 'post-exporter' ); ?></em></p>
		</legend>
		<label>
			<?php esc_html_e( 'Posts', 'post-exporter' ); ?>
			<input type="radio" name="export_type" value="posts" checked disabled/>
		</label>
		<label>
			<?php esc_html_e( 'Products', 'post-exporter' ); ?>
			<input type="radio" name="export_type" value="products" disabled/>
		</label>
	</fieldset>
	<br/>
	<button class="button button-primary"><?php esc_html_e( 'Export', 'post-exporter' ); ?></button>
</form>
