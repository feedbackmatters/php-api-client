<?php

namespace FeedbackMatters\Api\Models;

class Website
{
  /**
   * @var string
   */
  protected $name;

  /**
   * @var string
   */
  protected $url;

  /**
   * @var string
   */
  protected $description;

  /**
   * @var string
   */
  protected $key;

  /**
   * @var string
   */
  protected $api_key;

  /**
   * Website constructor.
   *
   * @param string $name
   * @param string $url
   * @param string $description
   * @param string $key
   * @param string $api_key
   */
  public function __construct($name, $url, $description, $key, $api_key)
  {
    $this->name        = $name;
    $this->url         = $url;
    $this->description = $description;
    $this->key         = $key;
    $this->api_key     = $api_key;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }

  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * @return string
   */
  public function getKey()
  {
    return $this->key;
  }

  /**
   * @return string
   */
  public function getApiKey()
  {
    return $this->api_key;
  }
}
