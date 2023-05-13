<?php declare(strict_types=1);

namespace CleanWeb\PostExporter\Export;

class ExporterFactory {

	/**
	 * @param array<string,Exporter> $exporters
	 */
	public function __construct(
		private readonly array $exporters
	) {}

	public function getExporter(string $kind): Exporter {
		return $this->exporters[$kind] ?? throw new \RuntimeException(
			sprintf(
				'Exporter for "%s" kind not found. Did you register it?',
				$kind
			)
		);
	}
}
