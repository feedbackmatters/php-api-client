<?php

namespace FeedbackMatters\Api;

use FeedbackMatters\Api\Services\WebsiteService;
use FeedbackMatters\Api\Services\FeedbackService;
use FeedbackMatters\Api\Services\StatisticsService;

class FeedbackMatters
{
  /**
   * @var WebsiteService
   */
  protected $websiteService;

  /**
   * @var FeedbackService
   */
  protected $feedbackService;

  /**
   * @var StatisticsService
   */
  protected $statisticsService;

  /**
   * ServiceManager constructor.
   *
   * @param $email
   * @param $password
   */
  public function __construct($email, $password)
  {
    $client = new Client($email, $password);

    $this->websiteService    = new WebsiteService($client);
    $this->feedbackService   = new FeedbackService($client);
    $this->statisticsService = new StatisticsService($client);
  }

  /**
   * Get the website service
   *
   * @return WebsiteService
   */
  public function website()
  {
    return $this->websiteService;
  }

  /**
   * Get the feedback service
   *
   * @return FeedbackService
   */
  public function feedback()
  {
    return $this->feedbackService;
  }

  /**
   * Get the statistics service
   *
   * @return StatisticsService
   */
  public function statistics()
  {
    return $this->statisticsService;
  }
}
