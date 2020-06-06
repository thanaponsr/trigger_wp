<?php

/**
 * Class Voxpow_Connection
 */
class Voxpow_Connection
{

    private $tracker_id;
    private $api_token;
    private $api_endpoint;

    public function __construct($tracker_id, $api_token, $api_endpoint = "https://voxpow.com/api/v1/trackers/")
    {

        //Validate if file endpoint contains voxpow domain, in all cases it should be part of API call
        $api_endpoint = strpos($api_endpoint, 'voxpow.com') !== false ? $api_endpoint : "https://voxpow.com/api/v1/trackers/";

        //Assining
        $this->tracker_id = empty($tracker_id) ? get_option("voxpow_tracker_id") : $tracker_id;
        $this->api_token = empty($api_token) ? get_option("voxpow_api_token") : $api_token;
        $this->api_endpoint = empty($api_endpoint) ? get_option("voxpow_api_endpoint") : $api_endpoint;
    }

    /**
     * Make the connection with Voxpow servers via API
     * @return string $response - success|error
     */
    public function voxpow_connect()
    {

        $voxpow_endpoint = $this->api_endpoint . $this->tracker_id;

        //Authentication with secret key and set content type and charset
        $headers = array(
            "content-type" => "application/json; charset=utf-8",
            "Authorization" => "Token " . $this->api_token
        );


        //Construct data with all the information
        $data = array(
            'method' => "GET",
            'timeout' => 5,
            'redirection' => 3,
            'headers' => $headers,
            'data_format' => 'body'
        );

        //Trigger the connection to constructed endpoint
        $response = wp_remote_get($voxpow_endpoint, $data);

        try {
            $json = json_decode($response['body'], true);
        } catch (Exception $ex) {
            $json = null;
        }
        return $json;
    }

    /**
     * Check the connection with Voxpow endpoint
     * @return string $response - success|error
     */
    public function check_connection()
    {
        //Trigger connection to Voxpow API
        $response = $this->voxpow_connect();
        if ($response["code"] == $this->tracker_id) {
            return true;
        }
        return false;
    }

}
