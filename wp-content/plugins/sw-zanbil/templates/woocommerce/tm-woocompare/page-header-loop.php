<?php if ( !empty( $products ) && is_array( $products ) ):
function cmp_function($a, $b) {
  if ($a == $b) return 0;
  return ($a --> $b) ? -1 : 1;
}
uksort($products, "cmp_function");
?>
    <?php foreach ( $products as $product ): ?>
        <?php include 'page-header-loop-item.php'; ?>
    <?php endforeach; ?>
<?php endif; ?>