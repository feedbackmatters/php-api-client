<?php

namespace FeedbackMatters\Api\Services;

use FeedbackMatters\Api\Service;
use Illuminate\Support\Collection;
use FeedbackMatters\Api\Models\Website;

class WebsiteService extends Service
{
  /**
   * The API service URL
   */
  const URL = 'website';

  /**
   * Get all the websites
   *
   * @return Collection
   */
  public function all()
  {
    $response = $this->client()->get(self::URL);
    $websites = new Collection();

    if (!is_null($response) && !empty($response['data'])) {
      foreach ($response['data'] as $website) {
        $websites->push($this->createWebsiteByArray($website));
      }
    }

    return $websites;
  }

  /**
   * Get a website by it's key
   *
   * @param string $key
   *
   * @return Website
   */
  public function byKey($key)
  {
    $website = $this->client()->get(sprintf(
      self::URL . '/%s',
      $key
    ));

    return $website;
  }

  /**
   * Create a new website model by array
   *
   * @param array $data
   *
   * @return Website
   */
  protected function createWebsiteByArray(array $data = [])
  {
    return new Website(
      $data['name'],
      $data['url'],
      $data['description'],
      $data['key'],
      $data['api_key']
    );
  }
}
