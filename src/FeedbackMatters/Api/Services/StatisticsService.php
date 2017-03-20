<?php

namespace FeedbackMatters\Api\Services;

use DateTime;
use FeedbackMatters\Api\Service;
use Illuminate\Support\Collection;
use FeedbackMatters\Api\Models\Website;
use FeedbackMatters\Api\Models\Statistics;

class StatisticsService extends Service
{
  /**
   * The API service URL
   */
  const URL = 'website/%s/statistics';

  /**
   * Get the statistics for a website
   *
   * @param Website       $website
   * @param DateTime|null $start
   * @param DateTime|null $end
   *
   * @return Collection
   */
  public function get(Website $website, DateTime $start = null, DateTime $end = null)
  {
    $response   = $this->client()->get(sprintf(self::URL, $website->getKey()));
    $statistics = new Collection();

    if (!is_null($response) && !empty($response['data'])) {
      foreach ($response['data'] as $item) {
        $statistics->push($this->createStatisticsByArray($item));
      }
    }

    return $statistics;
  }

  /**
   * Create a new statistics model by a array
   *
   * @param array $data
   *
   * @return Statistics
   */
  public function createStatisticsByArray(array $data = [])
  {
    return new Statistics(
      $data['opened'],
      $data['requests'],
      $data['promoters'],
      $data['passives'],
      $data['detractors'],
      $data['date'],
      $data['nps']
    );
  }
}
