<?php


namespace App\Dto\DamageReport;

/**
 * Class DamageReportResponseDto
 *
 * @package App\Dto\DamageReport
 */
class DamageReportResponseDto
{
    /**
     * @var int|null
     */
    public $id;

    /**
     * @var string
     */
    public $vorname;

    /**
     * @var string
     */
    public $nachname;

    /**
     * @var string
     */
    public $anschrift;

    /**
     * @var string
     */
    public $telefonnummer;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $kfz_versicherung;

    /**
     * @var string
     */
    public $partner_id;

    /**
     * @var string
     */
    public $bild_location;
}
