<div class="col-md-3 mb-3">
    <input type="hidden" id="{{ $field }}_filter_action" value="{{ \AlwaysOpen\ReportEngine\BaseFeatures\Filters\InFilter::key() }}"/>
    <input type="hidden" id="{{ $field }}_filter_required" value="{{ $filter_required ?? '' }}"/>
    <label class="my-1 mr-2" for="{{ $field }}_filter">{{ $label }}</label>
    <div class="input-group mb-1">
        <select multiple id="{{ $field }}_filter" class="custom-select report-filter-input">
            <option></option>
            @php
                $splitValues = explode(',', $value->first());
            @endphp
            @foreach($options as $optionKey => $optionValue)
                <option
                @if (false === ($useKey ?? false))
                    {{ in_array($optionValue, $splitValues) ? 'selected' : '' }}
                @else
                    {{ in_array($optionKey, $splitValues) ? 'selected' : '' }}
                    value="{{$optionKey}}"
                @endif
                >{!! $optionValue !!}</option>
            @endforeach
        </select>
    </div>
</div>
