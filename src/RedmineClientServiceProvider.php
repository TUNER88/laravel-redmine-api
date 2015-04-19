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
        $app = $this->app;
        
        // create image
        $app['redmine'] = $app->share(function ($app) {
	        
	        $configs = $app['config']->get('redmine');
	        
	        if(!empty($configs['key'])) {
		    	return new \Redmine\Client($configs['url'], $configs['key']);    
	        } else {
		        return new \Redmine\Client($configs['url'], $configs['username'], $configs['password']);
	        }
	        
        });
	}

}