<?php

namespace Drupal\cities_migration;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Cities migration entity entity.
 *
 * @see \Drupal\cities_migration\Entity\CitiesMigrationEntity.
 */
class CitiesMigrationEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\cities_migration\Entity\CitiesMigrationEntityInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished cities migration entity entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published cities migration entity entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit cities migration entity entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete cities migration entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add cities migration entity entities');
  }


}
