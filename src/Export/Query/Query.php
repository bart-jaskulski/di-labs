<?php declare(strict_types=1);

namespace CleanWeb\PostExporter\Export\Query;

/**
 * A generic interface for querying data.
 */
interface Query {

  public function get_all(): iterable;
}
