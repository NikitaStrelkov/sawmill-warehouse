<?php

namespace App\AppBundle\Entity;

/**
 * PlankRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlankRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $plank_fields
     *
     * @return \AppBundle\Entity\Plank
     */
    public function preparePlankObject($plank_fields)
    {
        if (!empty($plank_fields['id'])) {
            $plank = $this->find($plank_fields['id']);
        } else {
            $plank = new Plank();
        }

        if (!empty($plank_fields['height'])) {
            $plank->setHeight($plank_fields['height']);
        }

        if (!empty($plank_fields['width'])) {
            $plank->setWidth($plank_fields['width']);
        }

        if (!empty($plank_fields['length'])) {
            $plank->setLength($plank_fields['length']);
        }

        if (!empty($plank_fields['quantity'])) {
            $plank->setQuantity($plank_fields['quantity']);
        }

        $em = $this->getEntityManager();

        if (!empty($plank_fields['color'])) {
            $color = $em->getRepository('AppBundle:Color')->findOneBy(['name' => $plank_fields['color']]);
            $plank->setColor($color);
        }

        if (!empty($plank_fields['material'])) {
            $material = $em->getRepository('AppBundle:Material')->findOneBy(['name' => $plank_fields['material']]);
            $plank->setMaterial($material);
        }

        return $plank;
    }
}
