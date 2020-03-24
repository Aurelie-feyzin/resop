<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommissionableAssetRepository")
 * @ORM\Table(indexes={
 *   @ORM\Index(name="commissionable_asset_type_idx", columns={"type"}),
 * })
 */
class CommissionableAsset implements AvailabilitableInterface
{
    public const TYPES = [
        'Véhicule léger' => 'VL',
        'Véhicule de premiers secours' => 'VPSP',
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned": true})
     */
    public ?int $id = null;

    /**
     * @ORM\Column
     * @Assert\NotBlank
     * @Assert\Choice(choices=CommissionableAsset::TYPES)
     */
    public string $type = '';

    /**
     * @ORM\Column
     * @Assert\NotBlank
     */
    public string $name = '';

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Organization")
     * @ORM\JoinColumn(nullable=false)
     */
    public Organization $organization;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommissionableAssetAvailability", mappedBy="asset")
     */
    public iterable $availabilities = [];

    public function __construct(
        ?int $id,
        Organization $organization,
        string $type,
        string $name
    ) {
        $this->id = $id;
        $this->organization = $organization;
        $this->type = $type;
        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->type.' - '.$this->name;
    }

    public function getAvailabilities(): iterable
    {
        return $this->availabilities;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
