<?php

namespace App\Controller;

use App\Factory\PartnerRequestDtoFactoryInterface;
use App\Service\PartnerServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class PartnerController
 *
 * @Route("/partner", name="partner")
 * @package App\Controller
 */
class PartnerController extends AbstractController
{
    /**
     * @var PartnerServiceInterface
     */
    private $partnerService;

    /**
     * PartnerController constructor.
     *
     * @param PartnerServiceInterface $partnerService
     */
    public function __construct(PartnerServiceInterface $partnerService)
    {
        $this->partnerService = $partnerService;
    }

    /**
     * Creates partner.
     *
     * @Route("/", name="_create", methods={"POST"})
     *
     * @param PartnerRequestDtoFactoryInterface $partnerDtoFactory
     * @return JsonResponse
     */
    public function create(PartnerRequestDtoFactoryInterface $partnerDtoFactory)
    {
        // Creates request dto
        $partnerDto = $partnerDtoFactory->create();

        // Create partner
        $partnerResponseDto = $this->partnerService->create($partnerDto);

        // Returns json
        return $this->json($partnerResponseDto);
    }

    /**
     * Gets partners.
     *
     * @Route("/", name="_all", methods={"GET"})
     *
     * @return JsonResponse
     */
    public function getAll()
    {
        // Gets all
        $partnerResponseDtos = $this->partnerService->getAll();

        // Returns json
        return $this->json($partnerResponseDtos);
    }

}
