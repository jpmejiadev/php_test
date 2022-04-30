<?php

class ABPromotion
{
    private $promotionId;
    private $promotionName;
    private $designId;
    private $designName;
    private $splitPercent;

    /**
     * @return mixed
     */
    public function getPromotionId()
    {
        return $this->promotionId;
    }

    /**
     * @param mixed $promotionId
     */
    public function setPromotionId($promotionId)
    {
        $this->promotionId = $promotionId;
    }

    /**
     * @return mixed
     */
    public function getPromotionName()
    {
        return $this->promotionName;
    }

    /**
     * @param mixed $promotionName
     */
    public function setPromotionName($promotionName)
    {
        $this->promotionName = $promotionName;
    }

    /**
     * @return mixed
     */
    public function getDesignId()
    {
        return $this->designId;
    }

    /**
     * @param mixed $designId
     */
    public function setDesignId($designId)
    {
        $this->designId = $designId;
    }

    /**
     * @return mixed
     */
    public function getDesignName()
    {
        return $this->designName;
    }

    /**
     * @param mixed $designName
     */
    public function setDesignName($designName)
    {
        $this->designName = $designName;
    }

    /**
     * @return mixed
     */
    public function getSplitPercent()
    {
        return $this->splitPercent;
    }

    /**
     * @param mixed $splitPercent
     */
    public function setSplitPercent($splitPercent)
    {
        $this->splitPercent = $splitPercent;
    }

    public  function toArray() {
        return array(
            'promotion_id' => $this->getPromotionId(),
            'promotion_name' => $this->getPromotionName(),
            'design_id' => $this->getDesignId(),
            'designName' => $this->getDesignName(),
            'slipt_percent' => $this->getSplitPercent()
        );
    }

}