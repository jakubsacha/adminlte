<?php
/**
 * @author jsacha
 * @since 31/05/15 18:06
 */

namespace jakubsacha\adminlte\Repository\Permission\PermissionsListRepository;


class GetDataResult
{
    private $iRecordsTotal;
    private $iRecordsFiltered;
    private $aData;

    /**
     * @param int $iRecordsTotal
     * @param int $iRecordsFiltered
     * @param [] $aData
     */
    public function __construct(
        $iRecordsTotal,
        $iRecordsFiltered,
        $aData
    ) {
        $this->iRecordsTotal = $iRecordsTotal;
        $this->iRecordsFiltered = $iRecordsFiltered;
        $this->aData = $aData;
    }

    /**
     * @return int
     */
    public function getRecordsTotal()
    {
        return $this->iRecordsTotal;
    }

    /**
     * @return int
     */
    public function getRecordsFiltered()
    {
        return $this->iRecordsFiltered;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->aData;
    }
}