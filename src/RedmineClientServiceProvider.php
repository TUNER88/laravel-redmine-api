<?php 

/*
 * This file is part of Laravel Redmine API Client.
 *
 * (c) Anton Pauli <anton.pauli@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */	

namespace TUNER88\Redmine;

use Illuminate\Support\ServiceProvider;

class RedmineClientServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->setupConfig();
	}
	
	/**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/redmine.php');
        $this->publishes([$source => config_path('redmine.php')]);
        $this->mergeConfigFrom($source, 'redmine');
    }

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
	    // create image
	    $this->app->singleton('redmine', function ($app) {
		$config = $app->make('config')->get('redmine');

		if (!empty($config['key'])) {
		    return new \Redmine\Client($config['url'], $config['key']);
		}

		return new \Redmine\Client($config['url'], $config['username'], $config['password']);
	    });
	}

}
