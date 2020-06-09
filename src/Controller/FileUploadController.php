<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploadServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/file", name="file")
 */
class FileUploadController extends AbstractController
{
    /**
     * @var FileUploadServiceInterface
     */
    private $fileUploadService;

    /**
     * FileUploadController constructor.
     * @param FileUploadServiceInterface $fileUploadService
     */
    public function __construct(FileUploadServiceInterface $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * @Route("/upload", name="upload", methods={"POST"})
     */
    public function upload()
    {
        return $this->json(['ok']);
    }
}
