<?php

namespace AlwaysOpen\ReportEngine\BaseFeatures\Data\Types;

use AlwaysOpen\ReportEngine\BaseFeatures\Data\Types\Bases\BaseType;
use AlwaysOpen\ReportEngine\BaseFeatures\Filters\EqualsFilter;
use AlwaysOpen\ReportEngine\BaseFeatures\Filters\InFilter;
use Illuminate\Support\Collection;

class EnumMultiSelect extends Enum
{
    protected string $filterView = 'report-engine::partials.enum-multi-select-filter';

    /**
     * Filters this data type can utilize.
     *
     * @return array
     */
    public static function availableFilters(): array
    {
        return [
            InFilter::class,
        ];
    }

    /**
     * @param string     $label
     * @param string     $name
     * @param array      $action_types
     * @param BaseType   $columnType
     * @param Collection $value
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function renderFilter(string $label, string $name, array $action_types, BaseType $columnType, Collection $value)
    {
        return view($this->filterView)->with([
            'label' => $label,
            'field' => $name,
            'options' => $this->options,
            'value' => $value,
            'useKey' => $this->use_keys,
        ]);
    }

    public function inputType() : string
    {
        return 'select';
    }
}
