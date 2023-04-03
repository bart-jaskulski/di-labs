<?php
/**
 * Simple template for admin view allowing us to request post export.
 */
?>
<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
  <input type="hidden" name="action" value="export_posts"/>
  <button><?php esc_html_e( 'Export', 'post-exporter' ); ?></button>
</form>
