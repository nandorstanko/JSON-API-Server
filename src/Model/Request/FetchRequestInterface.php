<?php
declare(strict_types=1);

namespace Enm\JsonApi\Server\Model\Request;

/**
 * @author Philipp Marien <marien@eosnewmedia.de>
 */
interface FetchRequestInterface extends \Enm\JsonApi\Model\Request\FetchRequestInterface, AdvancedJsonApiRequestInterface
{
    /**
     * @return bool
     */
    public function isMainRequest(): bool;

    /**
     * Indicates if the response for this request should contain attributes and relationships
     *
     * @return bool
     */
    public function requestedResourceBody(): bool;

    /**
     * If a "field" parameter is available and does not contains the attribute
     * name, this method must return false.
     *
     * @param string $type
     * @param string $name
     *
     * @return bool
     */
    public function requestedField(string $type, string $name): bool;

    /**
     * Indicates if resources fetched by this request should provide their relationships even if their attributes are
     * not requested (for example with sub request for "include" parameter).
     *
     * @return bool
     */
    public function requestedRelationships(): bool;

    /**
     * @param string $relationship
     * @return bool
     */
    public function requestedInclude(string $relationship): bool;

    /**
     * Creates a new fetch resource request for the given relationship.
     * If called twice, the call will return the already created sub request.
     * A sub request does not contain pagination and sorting.
     *
     * @param string $relationship
     * @param boolean $keepFilters
     *
     * @return FetchRequestInterface
     */
    public function subRequest(string $relationship, $keepFilters = false): FetchRequestInterface;
}
