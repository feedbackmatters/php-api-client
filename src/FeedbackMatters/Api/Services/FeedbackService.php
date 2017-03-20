<?php

namespace FeedbackMatters\Api\Services;

use FeedbackMatters\Api\Service;
use Illuminate\Support\Collection;
use FeedbackMatters\Api\Models\Website;
use FeedbackMatters\Api\Models\Feedback;

class FeedbackService extends Service
{
  /**
   * The API service URL
   */
  const URL = 'website/%s/feedback';

  /**
   * Get the website feedback
   *
   * @param Website $website
   *
   * @return Collection
   */
  public function get(Website $website)
  {
    $response = $this->client()->get(sprintf(self::URL, $website->getKey()));
    $feedback = new Collection();

    if (!is_null($response) && !empty($response['data']['data'])) {
      foreach ($response['data']['data'] as $item) {
        $feedback->push($this->createFeedbackByArray($item));
      }
    }

    return $feedback;
  }

  /**
   * Create a new feedback model by array
   *
   * @param array $data
   *
   * @return Feedback
   */
  public function createFeedbackByArray(array $data = [])
  {
    return new Feedback(
      $data['name'],
      $data['emailaddress'],
      $data['feedback'],
      $data['score'],
      $data['created_at']
    );
  }
}
