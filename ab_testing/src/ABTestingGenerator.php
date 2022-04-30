<?php
use Exads\ABTestData;
class ABTestingGenerator
{
    public function getData(int $promotionId): ABPromotion
    {
        $abTest = new ABTestData($promotionId);
        $promotionName = $abTest->getPromotionName();
        $abPromotion = new ABPromotion;
        $abPromotion->setPromotionId($promotionId);
        $abPromotion->setPromotionName($promotionName);
        // select design
        $abDesign = $this->getDesign($abTest);
        $abPromotion->setDesignId($abDesign['designId']);
        $abPromotion->setDesignName($abDesign['designName']);
        $abPromotion->setSplitPercent($abDesign['splitPercent']);

        return $abPromotion;
    }
    public function getDesign($abTest){
        $designs = $abTest->getAllDesigns();
        $randomIndex = rand(0, count($designs) - 1);
        $designAB = $designs[$randomIndex];
        return $designAB;
    }
}
