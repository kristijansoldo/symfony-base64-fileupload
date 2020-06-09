<?php


namespace App\Factory;


use Symfony\Component\HttpFoundation\RequestStack;

class RequestDtoFactory
{
    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * FileUploadRequestDtoFactory constructor.
     *
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * Populate object properties.
     *
     * @param mixed $dto
     * @return mixed
     */
    protected function populateObjectProperties($dto) {
        // Gets request
        $request = $this->requestStack->getCurrentRequest();

        // Get json content
        $json = $request->getContent();

        // Convert to array
        $data = json_decode($json, true);

        // Get class properties
        $properties = get_object_vars($dto);

        // Foreach through properties and set values
        foreach ($properties as $propertyKey => $propertyValue) {
            $dto->{$propertyKey} = $data[$propertyKey];
        }

        // Returns dto
        return $dto;
    }
}
