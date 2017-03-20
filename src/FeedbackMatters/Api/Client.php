<?php

namespace FeedbackMatters\Api;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
  /**
   * The API url
   */
  const API = 'https://api.feedbackmatters.nl/%s';

  /**
   * @var string
   */
  protected $username;

  /**
   * @var string
   */
  protected $password;

  /**
   * Client constructor.
   *
   * @param string $username
   * @param string $password
   */
  public function __construct($username, $password)
  {
    $this->client   = new GuzzleClient();
    $this->username = $username;
    $this->password = $password;
  }

  /**
   * Do a get request
   *
   * @param string $url
   * @param array  $params
   *
   * @return mixed
   */
  public function get($url, array $params = [])
  {
    return $this->createRequest('GET', $url, $params);
  }

  /**
   * Do a post request
   *
   * @param string $url
   * @param array  $params
   *
   * @return mixed
   */
  public function post($url, array $params = [])
  {
    return $this->createRequest('POST', $url, $params);
  }

  /**
   * Do a put request
   *
   * @param string $url
   * @param array  $params
   *
   * @return mixed
   */
  public function put($url, array $params = [])
  {
    return $this->createRequest('PUT', $url, $params);
  }

  /**
   * Do a delete request
   *
   * @param string $url
   * @param array  $params
   *
   * @return mixed
   */
  public function delete($url, array $params = [])
  {
    return $this->createRequest('DELETE', $url, $params);
  }

  /**
   * @param string $type
   * @param string $url
   * @param array  $params
   *
   * @return mixed
   */
  protected function createRequest($type, $url, array $params = [])
  {
    $url = sprintf(self::API, $url);

    $response = $this->client->request($type, $url, [
      'headers' => [
        'email'    => $this->username,
        'password' => $this->password
      ],
    ]);

    if ($response->getStatusCode() == 200) {
      return json_decode($response->getBody()->getContents(), true);
    }

    return null;
  }
}
