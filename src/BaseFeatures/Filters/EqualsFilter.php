<?php

namespace AlwaysOpen\ReportEngine\BaseFeatures\Filters;

use Carbon\Carbon;
use Illuminate\Database\Query\Builder;

class EqualsFilter extends BaseFilter
{
    /**
     * @param Builder $builder
     * @param array   $options
     *
     * @return Builder
     */
    public function apply(Builder $builder, array $options = []) : Builder
    {
        if ($this->valueIsDate()) {
            /**
             * @var Carbon $value
             */
            $value = $this->getValue();
            $greaterThanEqual = new GreaterThanOrEqualFilter($this->getColumn(), $value->clone()->startOfDay());
            $lessThanEqual = new LessThanOrEqualFilter($this->getColumn(), $value->clone()->endOfDay());
            $builder = $greaterThanEqual->apply($builder, $options);

            return $lessThanEqual->apply($builder, $options);
        }

        $action = $this->getAction();

        return $builder->$action($this->getField(), $this->getValue());
    }

    /**
     * @return string
     */
    public static function label(): string
    {
        return '=';
    }

    /**
     * @return string
     */
    public static function tooltip(): string
    {
        return 'equals';
    }

    /**
     * @return string
     */
    public static function key(): string
    {
        return 'equals';
    }
}
