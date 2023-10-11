<?php

namespace Drupal\cities_migration\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Cities migration entity entities.
 *
 * @ingroup cities_migration
 */
interface CitiesMigrationEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Cities migration entity name.
   *
   * @return string
   *   Name of the Cities migration entity.
   */
  public function getName();

  /**
   * Sets the Cities migration entity name.
   *
   * @param string $name
   *   The Cities migration entity name.
   *
   * @return \Drupal\cities_migration\Entity\CitiesMigrationEntityInterface
   *   The called Cities migration entity entity.
   */
  public function setName($name);

  /**
   * Gets the Cities migration entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Cities migration entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Cities migration entity creation timestamp.
   *
   * @param int $timestamp
   *   The Cities migration entity creation timestamp.
   *
   * @return \Drupal\cities_migration\Entity\CitiesMigrationEntityInterface
   *   The called Cities migration entity entity.
   */
  public function setCreatedTime($timestamp);

}
