<?php

namespace FeedbackMatters\Api;

use FeedbackMatters\Api\Client;

class Service
{
  /**
   * @var Client
   */
  protected $client;

  /**
   * Service constructor.
   *
   * @param Client $client
   */
  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  /**
   * Get the API client
   *
   * @return Client
   */
  protected function client()
  {
    return $this->client;
  }
}
