<?php
/**
 * Copyright 2015 Dirk Groenen
 *
 * (c) Dirk Groenen <dirk@bitlabs.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

#namespace DirkGroenen\Pinterest\Endpoints;

#use DirkGroenen\Pinterest\Transport\Request;
#use DirkGroenen\Pinterest\Pinterest;
require_once(APPPATH.'libraries/Pinterest/Transport/Request.php');
require_once(APPPATH.'libraries/Pinterest/Pinterest.php');
class Endpoint {

    /**
     * Instance of the request class
     *
     * @var Request
     */
    protected $request;

    /**
     * Instance of the master class
     *
     * @var Pinterest
     */
    protected $master;

    /**
     * Create a new model instance
     *
     * @param  Request              $request
     * @param  Pinterest            $master
     */
    public function __construct(Request $request, Pinterest $master)
    {
		require_once(APPPATH.'libraries/Pinterest/Models/Board.php');
		
        $this->request = $request;
        $this->master = $master;
    }

}