<?php

namespace Drupal\cities_migration\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Cities migration entity entity.
 *
 * @ingroup cities_migration
 *
 * @ContentEntityType(
 *   id = "cities_migration_entity",
 *   label = @Translation("Cities migration entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\cities_migration\CitiesMigrationEntityListBuilder",
 *     "views_data" = "Drupal\cities_migration\Entity\CitiesMigrationEntityViewsData",
 *
 *     "access" = "Drupal\cities_migration\CitiesMigrationEntityAccessControlHandler",
 *   },
 *   base_table = "cities_migration_entity",
 *   translatable = FALSE,
 *   admin_permission = "administer cities migration entity entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *     "published" = "status",
 *   },
 * )
 */
class CitiesMigrationEntity extends ContentEntityBase implements CitiesMigrationEntityInterface {

  use EntityChangedTrait;
  use EntityPublishedTrait;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Add the published field.
    $fields += static::publishedBaseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Cities migration entity entity.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);
    
    $fields['cities_id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('City ID'))
      ->setDescription(t('ID of the City'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
      ))
      ->setDisplayOptions('view', array(
        'type' => 'string',
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);
    
    $fields['loc']['lat'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Latituede'))
      ->setDescription(t('Latitude of the lcoation'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
      ))
      ->setDisplayOptions('view', array(
        'type' => 'string',
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);
    
    $fields['loc']['long'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Longitude'))
      ->setDescription(t('Longitude of the Location'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
      ))
      ->setDisplayOptions('view', array(
        'type' => 'string',
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);
    
    $fields['pop'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Pop'))
      ->setDescription(t('ID of the POP'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
      ))
      ->setDisplayOptions('view', array(
        'type' => 'string',
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);
    
    $fields['state_name'] = BaseFieldDefinition::create('string')
     ->setLabel(t('State'))
     ->setDescription(t('Name of the State'))
     ->setSettings([
       'max_length' => 50,
       'text_processing' => 0,
      ])
     ->setDefaultValue('')
     ->setDisplayOptions('form', array(
       'type' => 'string_textfield',
     ))
      ->setDisplayOptions('view', array(
       'type' => 'string',
     ))
     ->setDisplayConfigurable('form', TRUE)
     ->setDisplayConfigurable('view', TRUE)
     ->setRequired(TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
