<?php


namespace App\Model;

/**
 * Class UploadableFile
 *
 * @package App\Model
 */
class UploadableFile
{
    /**
     * @var string
     */
    protected $extension;

    /**
     * @var string
     */
    protected $blob;

    /**
     * @var string
     */
    protected $fileName;

    /**
     * @var string
     */
    protected $privatePath;

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string
     */
    public function getPrivatePath(): string
    {
        return $this->privatePath;
    }

    /**
     * @param string $privatePath
     */
    public function setPrivatePath(string $privatePath): void
    {
        $this->privatePath = $privatePath;
    }

    /**
     * @return string
     */
    public function getPublicPath(): string
    {
        return $this->publicPath;
    }

    /**
     * @param string $publicPath
     */
    public function setPublicPath(string $publicPath): void
    {
        $this->publicPath = $publicPath;
    }

    /**
     * @var string
     */
    protected $publicPath;

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @param string $extension
     */
    public function setExtension(string $extension): void
    {
        $this->extension = $extension;
    }

    /**
     * @return string
     */
    public function getBlob(): string
    {
        return $this->blob;
    }

    /**
     * @param string $blob
     */
    public function setBlob(string $blob): void
    {
        $this->blob = $blob;
    }
}
