<?php


namespace App\Service;

use App\Dto\FileUpload\FileUploadRequestDto;
use App\Dto\FileUpload\FileUploadResponseDto;

/**
 * Interface FileUploadServiceInterface
 *
 * @package App\Service
 */
interface FileUploadServiceInterface
{
    /**
     * File upload service definition.
     *
     * @param FileUploadRequestDto $fileUploadRequestDto
     * @return FileUploadResponseDto
     */
    public function upload(FileUploadRequestDto $fileUploadRequestDto): FileUploadResponseDto;

}
