<?php

namespace Drupal\cities_migration\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Cities migration entity entities.
 */
class CitiesMigrationEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
