<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Topic
 *
 * @ORM\Table(name="topic", indexes={@ORM\Index(name="topic_category_FK", columns={"id_category"})})
 * @ORM\Entity
 */
class Topic
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_topic", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTopic;

    /**
     * @var string
     *
     * @ORM\Column(name="name_topic", type="text", length=65535, nullable=false)
     */
    private $nameTopic;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_topic", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateTopic = 'CURRENT_TIMESTAMP';

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category", referencedColumnName="id_category")
     * })
     */
    private $idCategory;

    public function getIdTopic(): ?int
    {
        return $this->idTopic;
    }

    public function getNameTopic(): ?string
    {
        return $this->nameTopic;
    }

    public function setNameTopic(string $nameTopic): self
    {
        $this->nameTopic = $nameTopic;

        return $this;
    }

    public function getDateTopic(): ?\DateTimeInterface
    {
        return $this->dateTopic;
    }

    public function setDateTopic(\DateTimeInterface $dateTopic): self
    {
        $this->dateTopic = $dateTopic;

        return $this;
    }

    public function getIdCategory(): ?Category
    {
        return $this->idCategory;
    }

    public function setIdCategory(?Category $idCategory): self
    {
        $this->idCategory = $idCategory;

        return $this;
    }


}
