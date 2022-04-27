<?php
use Exads\ABTestData;
include 'ABPromotion.php';
class ABTestingGenerator
{
    public function getData(int $promotionId): ABPromotion
    {
        $abPromotion = new ABPromotion;
        $abTest = new ABTestData($promotionId);
        $promotionName = $abTest->getPromotionName();
        $abPromotion->setPromotionId($promotionId);
        $abPromotion->setPromotionName($promotionName);
        $designs = ($abTest->getAllDesigns());
        $randomIndex = rand(0, count($designs) - 1);
        $abPromotion->setDesignId($designs[$randomIndex]['designId']);
        $abPromotion->setDesignName($designs[$randomIndex]['designName']);
        $abPromotion->setSplitPercent($designs[$randomIndex]['splitPercent']);
        return $abPromotion;
    }
}
