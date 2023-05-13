<?php declare(strict_types=1);

namespace CleanWeb\PostExporter\Export\Query;

use CleanWeb\PostExporter\Export\Query;

class PostQuery implements Query {

  public function __construct(
    private readonly \WP_Query $query,
  ) {
  }

  public function get_all(): iterable {
    return $this->query->get_posts();
  }

}
