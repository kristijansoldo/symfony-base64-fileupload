<?php

namespace App\Controller;

use App\Factory\DamageReportRequestDtoFactoryInterface;
use App\Service\DamageReportServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class DamageReportController
 *
 * @Route("/glasschadenmeldung", name="damage_report")
 * @package App\Controller
 */
class DamageReportController extends AbstractController
{
    /**
     * @var DamageReportServiceInterface
     */
    private $damageReportService;

    /**
     * DamageReportController constructor.
     *
     * @param DamageReportServiceInterface $damageReportService
     */
    public function __construct(DamageReportServiceInterface $damageReportService)
    {
        $this->damageReportService = $damageReportService;
    }

    /**
     * Creates damage report.
     *
     * @Route("/", name="_create", methods={"POST"})
     *
     * @param DamageReportRequestDtoFactoryInterface $damageReportRequestDtoFactory
     * @return JsonResponse
     */
    public function create(DamageReportRequestDtoFactoryInterface $damageReportRequestDtoFactory)
    {
        // Creates request dto
        $damageReportRequestDto = $damageReportRequestDtoFactory->create();

        // Create damage report
        $damageReportResponseDto = $this->damageReportService->create($damageReportRequestDto);

        // Returns json
        return $this->json($damageReportResponseDto);
    }

    /**
     * Gets damage reports.
     *
     * @Route("/", name="_all", methods={"GET"})
     *
     * @return JsonResponse
     */
    public function getAll()
    {
        // Gets all
        $damageReportResponseDtos = $this->damageReportService->getAll();

        // Returns json
        return $this->json($damageReportResponseDtos);
    }

}
