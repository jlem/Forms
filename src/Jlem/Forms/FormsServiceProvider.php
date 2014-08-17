<?php namespace Jlem\Forms;

use Illuminate\Support\ServiceProvider;

class FormsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('jlem/forms');
		require __DIR__ . '/../../config/macros.php';
		require __DIR__ . '/../../config/validators.php';

        \App::error(function(FormValidationException $Exception, $code) {
            return \Redirect::back()->withErrors($Exception->getErrors())->withInput();
        });
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
