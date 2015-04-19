<?php

/*
 * This file is part of Laravel Redmine API Client.
 *
 * (c) Anton Pauli <anton.pauli@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */	
	
namespace TUNER88\Redmine\Facades;

use Illuminate\Support\Facades\Facade;

class Redmine extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'redmine';
    }
}