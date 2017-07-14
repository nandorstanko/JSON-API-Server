<?php
declare(strict_types=1);

namespace Enm\JsonApi\Server\ResourceProvider;

use Enm\JsonApi\Exception\JsonApiException;
use Enm\JsonApi\Exception\NotAllowedException;
use Enm\JsonApi\Model\Resource\Relationship\RelationshipInterface;
use Enm\JsonApi\Model\Resource\ResourceInterface;
use Enm\JsonApi\Server\Model\Request\AdvancedJsonApiRequestInterface;
use Enm\JsonApi\Server\Model\Request\SaveRelationshipRequestInterface;
use Enm\JsonApi\Server\Model\Request\SaveRequestInterface;

/**
 * @author Philipp Marien <marien@eosnewmedia.de>
 */
trait FetchOnlyTrait
{
    /**
     * Creates a single resource
     *
     * @param SaveRequestInterface $request
     * @return ResourceInterface
     * @throws JsonApiException
     */
    public function createResource(SaveRequestInterface $request): ResourceInterface
    {
        throw new NotAllowedException('You are not allowed to create resources of type ' . $request->type());
    }

    /**
     * Patches a single resource
     *
     * @param SaveRequestInterface $request
     * @return ResourceInterface
     * @throws JsonApiException
     */
    public function patchResource(SaveRequestInterface $request): ResourceInterface
    {
        throw new NotAllowedException('You are not allowed to patch resources of type ' . $request->type());
    }

    /**
     * Deletes a resource by type and id
     *
     * @param AdvancedJsonApiRequestInterface $request
     *
     * @return void
     * @throws JsonApiException
     */
    public function deleteResource(AdvancedJsonApiRequestInterface $request)
    {
        throw new NotAllowedException('You are not allowed to delete resources of type ' . $request->type());
    }

    /**
     * @param SaveRelationshipRequestInterface $request
     * @return RelationshipInterface
     * @throws JsonApiException
     */
    public function modifyRelationship(SaveRelationshipRequestInterface $request): RelationshipInterface
    {
        throw new NotAllowedException('You are not allowed to modify the relationship ' . $request->relationship());
    }
}
