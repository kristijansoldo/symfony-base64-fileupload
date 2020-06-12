<?php


namespace App\Factory;


use App\Dto\FileUpload\FileUploadRequestDto;

/**
 * Interface FileUploadRequestDtoFactoryInterface
 * @package App\Factory
 */
interface FileUploadRequestDtoFactoryInterface
{
    /**
     * @return FileUploadRequestDto
     */
    public function create(): FileUploadRequestDto;
}
