<?php
// Codeigniter access check, remove it for direct use
if( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
/**
 * A simple to use library to access the stripe.com services
 * 
 * @copyright   Copyright (c) 2011 Pixative Solutions
 * @author      Ben Cessa <ben@pixative.com>
 * @author_url  http://www.pixative.com
 */
class Pinterest {
	/**
	 * Holder for the initial configuration parameters 
	 * 
	 * @var     resource
	 * @access  private
	 */
	private $_conf = NULL;
	
	/**
     * Pinterest's oauth endpoint
     */
    const AUTH_HOST = "https://api.pinterest.com/oauth/";
	private $host = "https://api.pinterest.com/v1/";
	const PINTEREST_API_ENDPOINT = "https://api.pinterest.com/v1/";
	
	private $access_token = NULL;
	
	/**
     * The application ID
     *
     * @var string
     */
    private $client_id;

    /**
     * The app secret
     *
     * @var string
     */
    private $client_secret;
	
	 /**
     * Random string indicating the state
     * to prevent spoofing
     *
     * @var void
     */
    private $state;
	
	/**
	 * Constructor method
	 * 
	 * @param  array         Configuration parameters for the library
	 */
	public function __construct( ) {
		$this->ci = & get_instance();
		// Store the config values
		$this->_conf = $this->ci->config->load('pinterest',TRUE);
		$this->client_id = $this->ci->config->item('client_id','pinterest');
		$this->client_secret = $this->ci->config->item('client_secret','pinterest');
		// Generate and set the state
        $this->state = $this->generateState();
		#pre($this->client_secret );die;
		#$this->_conf = $params;
	}
	
	/**
     * Returns the login url
     *
     * @access public
     * @param  array    $scopes
     * @param  string   $redirect_uri
     * @return string
     */
    public function getLoginUrl($redirect_uri, $scopes = array("read_public"), $response_type = "code")
    {
        $queryparams = array(
            "response_type"     => $response_type,
            "redirect_uri"      => $redirect_uri,
            "client_id"         => $this->client_id,
            "client_secret"     => $this->client_secret,
            "scope"             => implode(",", $scopes),
            "state"             => $this->state
        );

        // Build url and return it
        return sprintf("%s?%s", self::AUTH_HOST, http_build_query($queryparams));
    }
	
	/**
     * Generates a random string and returns is
     *
     * @access private
     * @return string       random string
     */
    private function generateState()
    {
        return substr(md5(rand()), 0, 7);
    }
	
	/**
     * Change the code for an access_token
     *
     * @param  string   $code
     * @return \DirkGroenen\Pinterest\Transport\Response
     */
    public function getOAuthToken($code)
    {
        // Build data array
        $data = array(
            "grant_type"    => "authorization_code",
            "client_id"     => $this->client_id,
            "client_secret" => $this->client_secret,
            "code"          => $code
        );

        // Perform post request
        $response = $this->post("oauth/token", $data);

        return $response;
    }
	
	/**
     * Set the access token
     *
     * @access public
     * @param  string   $token
     * @return void
     */
    public function setOAuthToken($token)
    {
        $this->access_token = $token;
    }
	
	/**
     * Get the current user
     *
     * @access public
     * @param array     $data
     * @throws Exceptions/PinterestExceptions
     * @return User
     */
    public function me($data = array())
    {
        $response = $this->get("me", $data);
		#pre($response);die;
        return $response;
    }
	
	/**
     * Get the current user
     *
     * @access public
     * @param array     $data
     * @throws Exceptions/PinterestExceptions
     * @return User
     */
    public function GetMePins($data = array())
    {
        $response = $this->get("me/pins", $data);
		#pre($response);die;
        return $response;
    }
	/**
     * Get the current user
     *
     * @access public
     * @param array     $data
     * @throws Exceptions/PinterestExceptions
     * @return User
     */
    public function GetBoardPins($target_id ,$data = array())
    {
        $response = $this->get('boards/'.$target_id."/pins", $data);
		#pre($response);die;
        return $response;
    }
	
	/**
     * Get the current user
     *
     * @access public
     * @param array     $data
     * @throws Exceptions/PinterestExceptions
     * @return User
     */
    public function me_boards($data = array())
    {
        $response = $this->get("me/boards", $data);
		#pre($response);die;
        return $response;
    }
	
	/**
     * Get the current user
     *
     * @access public
     * @param array     $data
     * @throws Exceptions/PinterestExceptions
     * @return User
     */
    public function board_details($board_id,$data = array())
    {
        $response = $this->get("boards/".$board_id, $data);
		#pre($response);die;
        return $response;
    }
	
	function create_pin($data=array()){
		$response = $this->post("pins/", $data);
		#pre($response);die;
        return $response;
	}
	
	/**
     * Make a get request to the given endpoint
     *
     * @access public
     * @param  string   $endpoint
     * @param  array    $parameters
     * @return Response
     */
    public function get($endpoint, array $parameters = array())
    {
        if (!empty($parameters)) {
            $path = sprintf("%s/?%s", $endpoint, http_build_query($parameters));
        } else {
            $path = $endpoint;
        }

		#echo sprintf("%s%s", $this->host, $path);die;
//echo $path;die;
#echo sprintf("%s%s", $this->host, $path);
        return $this->_send_request( sprintf("%s%s", $this->host, $path),"get");
    }
	
	/**
     * Make a post request to the given endpoint
     *
     * @access public
     * @param  string   $endpoint
     * @param  array    $parameters
     * @return Response
     */
    public function post($endpoint, array $parameters = array())
    {
        return $this->_send_request( sprintf("%s%s", $this->host, $endpoint),"post", $parameters);
    }
	
	/**
	 * Private utility function that prepare and send the request to the API servers
	 * 
	 * @param  string        The URL segments to use to complete the http request
	 * @param  array         The parameters for the request, if any
	 * @param  srting        Either 'post','get' or 'delete' to determine the request method, 'get' is default
	 */
	private function _send_request( $url,  $http_method = 'get',$data=array() ) {
		// Initializ and configure the request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		if($http_method == 'post'){
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //to suppress the curl output 
		$response = curl_exec($ch);
		curl_close ($ch);
		return json_decode($response,true);
	}
}
// END Stripe Class

/* End of file Stripe.php */
/* Location: ./{APPLICATION}/libraries/Stripe.php */
