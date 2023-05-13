<?php declare(strict_types=1);

namespace CleanWeb\PostExporter\Export\Query;

class QueryFactory {

  public function __construct(
    private readonly array $query,
  ) {}

  public function getQuery( string $kind ): Query {
		return $this->query[$kind] ?? throw new \RuntimeException(
			sprintf(
				'Query for "%s" kind not found. Did you register it?',
				$kind
			)
		);
  }
