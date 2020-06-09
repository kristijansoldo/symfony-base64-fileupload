<?php


namespace App\Dto\FileUpload;

/**
 * Class FileUploadResponseDto
 *
 * @package App\Dto\FileUpload
 */
class FileUploadResponseDto
{
    /**
     * @var string
     */
    public $filePath;

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     */
    public function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
    }
}
