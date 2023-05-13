<?php declare(strict_types=1);

namespace CleanWeb\PostExporter\Export\Query;

class ProductQuery implements Query {

  public function get_all(): iterable {
    return \wc_get_products();
  }

}
