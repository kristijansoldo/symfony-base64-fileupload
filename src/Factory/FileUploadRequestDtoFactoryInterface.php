<?php


namespace App\Factory;


use App\Dto\FileUpload\FileUploadRequestDto;

interface FileUploadRequestDtoFactoryInterface
{
    /**
     * @return FileUploadRequestDto
     */
    public function create(): FileUploadRequestDto;
}
