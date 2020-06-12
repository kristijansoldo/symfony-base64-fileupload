<?php


namespace App\Dto\FileUpload;


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
    public $file;

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
}
