<?php


namespace App\Factory;

use App\Dto\FileUpload\FileUploadRequestDto;

/**
 * Class FileUploadRequestDtoFactory
 *
 * @package App\Factory
 */
class FileUploadRequestDtoFactory extends RequestDtoFactory implements FileUploadRequestDtoFactoryInterface
{
    /**
     * Creates file upload request dto.
     *
     * @return FileUploadRequestDto
     */
    public function create(): FileUploadRequestDto
    {
        // Initialize dto
        $fileUploadRequestDto = new FileUploadRequestDto();

        // Returns populated object properties
        return $this->populateObjectProperties($fileUploadRequestDto);
    }
}
