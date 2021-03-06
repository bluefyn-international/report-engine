<div class="col-md-3 mb-3">
    <input type="hidden" id="{{ $field }}_filter_action" value="{{ $action_types[0]->key() }}"/>
    <label class="my-1 mr-2" for="{{ $field }}_filter">{{ $label }}</label>
    <div class="input-group mb-1">
        <select id="{{ $field }}_actions" class="custom-select" onchange="$('#{{ $field }}_filter_action').val($('#{{ $field }}_actions').find(':selected').attr('filterAction'))">
            @foreach($action_types as $actionType)
                <option filterAction="{{ $actionType->key() }}" {{ $actionType->key() === $selected_operators[0] ? 'select' : '' }}>
                    {{ $actionType->label() }}
                </option>
            @endforeach
        </select>
        <input name="{{ $field }}_filter"
               id="{{ $field }}_filter"
               style="width:77%"
               @if ($placeholder ?? false)
               placeholder="{{ $placeholder }}"
               @endif
               type="{{ $input_type }}" class="form-control report-filter-input {{ $classes ?? '' }}" value="{{ $value->first() ?? '' }}"/>
    </div>
</div>
