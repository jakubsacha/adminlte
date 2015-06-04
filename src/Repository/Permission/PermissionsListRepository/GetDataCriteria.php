<?php
/**
 * @author jsacha
 * @since 31/05/15 17:53
 */

namespace jakubsacha\adminlte\Repository\Permission\PermissionsListRepository;

class GetDataCriteria
{
    private $iLimit;
    private $iOffset;
    private $sSearchQuery;

    /**
     * @param int $iLimit
     * @param int $iOffset
     * @param string $sSearchQuery
     */
    public function __construct(
        $iLimit,
        $iOffset,
        $sSearchQuery
    ) {
        $this->iLimit = $iLimit;
        $this->iOffset = $iOffset;
        $this->sSearchQuery = $sSearchQuery;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->iLimit;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->iOffset;
    }

    /**
     * @return string
     */
    public function getSearchQuery()
    {
        return $this->sSearchQuery;
    }

}