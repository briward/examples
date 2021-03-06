<?php

namespace Drupal\api\Plugin\Rest\Resource\v2_0;

use Drupal\Component\Uuid\Uuid;
use Drupal\rest\ResourceResponse;

/**
 * Provides a resource to get bundles by entity.
 *
 * @RestResource(
 *   id = "articles_v2_0",
 *   label = @Translation("Articles (v2.0)"),
 *   uri_paths = {
 *     "canonical" = "/api/v2.0/articles/{uuid}"
 *   }
 * )
 */
class ArticleBundleResource extends BaseBundleResource {

  /*
   * Responds to GET requests.
   *
   * Returns an article by UUID.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The response containing an article object (transformed).
   *
   * @throws \Symfony\Component\HttpKernel\Exception\HttpException
   */
  public function get($uuid = NULL) {
    if (Uuid::isValid($uuid)) {
      $entity = $this->getArticle($uuid);
      return new ResourceResponse($this->transform($entity));
    } else {
      return new ResourceResponse([
        'http_code' => 400,
        'error' => 100,
        'message' => 'The UUID supplied is invalid.'
      ], 400);
    }
  }

  /**
   * Get article by UUID.
   *
   * @param $uuid
   *
   * @return array
   */
  public function getArticle($uuid) {
    $entity = \Drupal::entityManager()->getStorage('node')->loadByProperties([
      'uuid' => $uuid,
      'type' => 'article'
    ]);

    return reset($entity);
  }

  /**
   * @param $entity
   *
   * @return array
   */
  private function transform($entity) {
    return [
      'title' => $entity->title[0]->value,
      'body' => $entity->body[0]->value,
      'links' => [
        [
          'rel' => 'self',
          'uri' => '/api/v2.0/articles/'.$entity->uuid[0]->value
        ]
      ]
    ];
  }

}
