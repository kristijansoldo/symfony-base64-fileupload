<?php


namespace App\Service;

use App\Dto\FileUpload\FileUploadRequestDto;
use App\Dto\FileUpload\FileUploadResponseDto;
use App\Model\UploadableFile;
use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

/**
 * Class FileUploadServiceService
 *
 * @package App\Service
 */
class FileUploadServiceService implements FileUploadServiceInterface
{
    /**
     * @var ParameterBagInterface
     */
    private $params;

    /**
     * @var string
     */
    private $publicPath;

    /**
     * @var string
     */
    private $filesPath;

    /**
     * @var string
     */
    private $uploadPath;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var array
     */
    private $supportedExtensions;

    /**
     * FileUploadServiceService constructor.
     *
     * @param ParameterBagInterface $parameterBag
     */
    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->params = $parameterBag;
        $this->publicPath = $this->params->get('public_path');
        $this->filesPath = $this->params->get('files_path');
        $this->uploadPath = $this->publicPath . $this->filesPath;
        $this->domain = $this->params->get('domain');
        $this->supportedExtensions = $this->params->get('supported_upload_extensions');
    }

    /**
     * Upload file to storage.
     *
     * @param FileUploadRequestDto $fileUploadRequestDto
     * @return FileUploadResponseDto
     * @throws Exception
     */
    public function upload(FileUploadRequestDto $fileUploadRequestDto): FileUploadResponseDto
    {
        // Gets uploadable file
        $uploadableFile = $this->getUploadableFile($fileUploadRequestDto->getFile());

        // Validate file extension
        if (!$this->isExtensionSupported($uploadableFile->getExtension())) {
            throw new BadRequestException('File type is not supported');
        }

        // Ensure that file upload folder exists
        $this->ensureFileUploadFolderExists();

        // Upload file
        $uploadedFile = file_put_contents($uploadableFile->getPrivatePath(), $uploadableFile->getBlob());

        // Throws exception if file is not uploaded
        if (!$uploadedFile) {
            throw new Exception('Cannot upload file.');
        }

        // Initialize file upload response dto
        $fileUploadResponseDto = new FileUploadResponseDto();

        // Sets file path
        $fileUploadResponseDto->setFilePath($uploadableFile->getPublicPath());

        // Returns file upload response dto
        return $fileUploadResponseDto;
    }

    /**
     * Checks is extension supported.
     *
     * @param string $extension
     * @return bool
     */
    private function isExtensionSupported(string $extension): bool
    {
        return in_array($extension, $this->supportedExtensions);
    }

    /**
     * Ensure that file upload folder exists.
     */
    private function ensureFileUploadFolderExists(): void
    {
        // Create directory
        if (!file_exists($this->uploadPath)) {
            mkdir($this->uploadPath, 0777, true);
        }
    }

    /**
     * Gets uploadable file.
     *
     * @param string $base64file
     * @return UploadableFile
     */
    private function getUploadableFile(string $base64file): UploadableFile
    {
        // Explode file
        $explodedFile = explode(',', $base64file);

        // Check if does not exists data type of file
        if (count($explodedFile) != 2) {
            throw new BadRequestException('File is not supported');
        }

        // Gets data type
        $dataType = $explodedFile[0];

        // Gets blob from base64
        $fileBlob = base64_decode($explodedFile[1]);

        // Gets extension from data type
        $extension = $this->getExtensionFromDataType($dataType);

        // Creates filename
        $filename = $this->createFilename($extension);

        // Initialize uploadable file model
        $uploadableFile = new UploadableFile();

        // Sets data
        $uploadableFile->setBlob($fileBlob);
        $uploadableFile->setExtension($extension);
        $uploadableFile->setFileName($filename);
        $uploadableFile->setPrivatePath($this->uploadPath . '/' . $uploadableFile->getFileName());
        $uploadableFile->setPublicPath($this->domain . $this->filesPath . '/' . $uploadableFile->getFileName());

        // Returns uploadable file
        return $uploadableFile;
    }

    /**
     * Creates random filename.
     *
     * @param string $extension
     * @return string
     */
    private function createFilename(string $extension): string
    {
        // Generate filename
        $fileName = uniqid() . $extension;

        // If filename exists - generate new
        if (file_exists($this->uploadPath . '/' . $fileName)) {
            return $this->createFilename($extension);
        }

        // Returns filename
        return uniqid() . $extension;
    }

    /**
     * Get extension form data type.
     *
     * @param string $dataType
     * @return string
     */
    private function getExtensionFromDataType(string $dataType): string
    {
        // Explode data type
        $explodedDataType = explode('/', $dataType);

        // Throws exception when mime type or data type not exists
        if (count($explodedDataType) != 2) {
            throw new BadRequestException('Image is not supported');
        }

        // Returns file extension
        return '.' . explode(';', $explodedDataType[1])[0];
    }
}
