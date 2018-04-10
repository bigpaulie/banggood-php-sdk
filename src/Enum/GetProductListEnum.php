<?php

namespace bigpaulie\banggood\Enum;

/**
 * Class GetProductListEnum
 * @package bigpaulie\banggood\Enum
 * @see https://api.banggood.com/index.php?com=document&article_id=10
 */
class GetProductListEnum
{
    /**
     * Identifier of product category , from GetCategoryList API.
     * @var string
     */
    const PARAM_CAT_ID = 'cat_id';

    /**
     * Product published time ranges –Earliest Time(Inclusive),UTC TimeZone
     * @var \DateTime
     */
    const PARAM_ADD_DATE_START = 'add_date_start';

    /**
     * Product published time ranges – Latest Time(Inclusive),UTC TimeZone
     * @var \DateTime
     */
    const PARAM_ADD_DATE_END = 'add_date_end';

    /**
     * Product last updated time ranges –Earliest Time(Inclusive),UTC TimeZone
     * @var \DateTime
     */
    const PARAM_MODIFY_DATE_START = 'modify_date_start';

    /**
     * Product last updated time ranges – Latest Time(Inclusive),UTC TimeZone
     * @var \DateTime
     */
    const PARAM_MODIFY_DATE_END = 'modify_date_end';

    /**
     * There are 20 products of information records at most in per page .
     * @var int
     */
    const PARAM_PAGE = 'page';

    /**
     * It represents the langguage and We only offer English language now.please input“en”
     * @var string
     */
    const PARAM_LANG = 'lang';
}