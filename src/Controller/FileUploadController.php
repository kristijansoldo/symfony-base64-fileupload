<?php


namespace App\Controller;

use App\Dto\FileUpload\FileUploadRequestDto;
use App\Factory\FileUploadRequestDtoFactoryInterface;
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
     * @param FileUploadRequestDtoFactoryInterface $fileUploadRequestDtoFactory
     * @return JsonResponse
     */
    public function upload(FileUploadRequestDtoFactoryInterface $fileUploadRequestDtoFactory)
    {
        // Create file upload request dto
        $fileUploadRequestDto = $fileUploadRequestDtoFactory->create();

        // Upload file and generate response dto
        $fileUploadResponseDto = $this->fileUploadService->upload($fileUploadRequestDto);

        // Returns json
        return $this->json($fileUploadResponseDto);
    }
}
