<?php


namespace App\Controller;

use App\Dto\FileUpload\FileUploadRequestDto;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploadServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class FileUploadController
 *
 * @Route("/file", name="file")
 * @package App\Controller
 */
class FileUploadController extends AbstractController
{
    /**
     * @var FileUploadServiceInterface
     */
    private $fileUploadService;

    /**
     * FileUploadController constructor.
     *
     * @param FileUploadServiceInterface $fileUploadService
     */
    public function __construct(FileUploadServiceInterface $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * Base64 file upload.
     *
     * @Route("/upload", name="upload", methods={"POST"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function upload(Request $request)
    {
        // Create file upload request dto
        $fileUploadRequestDto = FileUploadRequestDto::createFromRequest($request);

        // Returns json
        return $this->json($fileUploadRequestDto->getFile());
    }
}
