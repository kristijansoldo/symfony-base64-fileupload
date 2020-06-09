<?php


namespace App\Dto\FileUpload;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class FileUploadRequestDto
 *
 * @package App\Dto\FileUpload
 */
class FileUploadRequestDto
{
    /**
     * @var string
     */
    private $file;

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile(string $file): void
    {
        $this->file = $file;
    }

    /**
     * Create dto from request.
     *
     * @param Request $request
     * @return static
     */
    public static function createFromRequest(Request $request)
    {
        // Initialize dto
        $dto = new static();

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
