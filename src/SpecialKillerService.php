<?php
declare( strict_types=1 );

namespace CleanWeb\PostExporter;

use WPDesk\Init\Configuration\ReadableConfig;
use WPDesk\WPHook\HookListenerProvider;
use WPDesk\WPHook\HookSubscriber\Conditional;
use WPDesk\WPHook\HookSubscriber\HookSubscriber;

/**
 * If we are not in admin, we don't need to do anything, so we can unsubscribe all subscribers.
 */
class SpecialKillerService implements HookSubscriber, Conditional {

	/** @var HookListenerProvider */
	private $provider;

	/** @var ReadableConfig */
	private $config;

	public function __construct(
		HookListenerProvider $provider,
		ReadableConfig $config
	) {
		$this->provider = $provider;
		$this->config   = $config;
	}

	public static function register(): iterable {
		yield 'plugins_loaded' => 'killThemAll';
	}

	public function is_needed(): bool {
		return is_admin();
	}

	public function killThemAll(): void {
		foreach ( $this->config->get( 'hook_subscribers', [] ) as $subscriber ) {
			$this->provider->unsubscribe( $subscriber );
		}
	}
}