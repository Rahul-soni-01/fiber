@extends('demo')
@section('content')
<div class="container">
    <h2>Edit Layout: {{ $layout->name }}</h2>
    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('success'))
         <div class="alert alert-success">{{ session('success') }}</div>
     @endif
    <form action="{{ route('layouts.update', $layout->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Layout Name</label>
            <input type="text" name="name" class="form-control" value="{{ $layout->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Layout Type</label>
            <select id="type" name="type" class="form-control" required>
                <option value="" disabled selected>Select Type</option>
                @foreach($types as $type)
                <option value="{{$type->id}}" @if($type->id == $layout->type) selected @endif>{{$type->name}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <select id="part" name="part" class="form-control">
                <option value="" disabled {{ old('part', $layout->part ?? null) === null ? 'selected' :
                    '' }}>
                    Select Part
                </option>
                <option value="0" {{ old('part', $layout->part ?? null) === 0 ? 'selected' : '' }}>New
                </option>
                <option value="1" {{ old('part', $layout->part ?? null) === 1 ? 'selected' : ''
                    }}>Repairing</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $layout->description }}</textarea>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_active" class="form-check-input" id="isActive" {{ $layout->is_active ?
            'checked' : '' }}>
            <label class="form-check-label" for="isActive">Set as Active</label>
        </div>

        <h4>Edit Fields</h4>
        <table class="table datatable-remove table-bordered" id="field-table">
            <thead>
                <tr>
                    <th>Field Key</th>
                    <th>Label</th>
                    <th>Visible</th>
                    <th>Sort Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="field-body">
                @foreach ($layout->fields as $index => $field)
                <tr>
                    <td>
                        @php $fieldKeyFound = false @endphp
                        @foreach ($sub_categories as $sub_category)
                        @if($sub_category->id == $field->field_key)
                        @php $fieldKeyFound = true @endphp
                        <input type="hidden" name="fields[{{ $index }}][id]" value="{{ $field->id }}">
                        <input type="text" name="fields[{{ $index }}][field_key]" class="form-control readonly-field"
                            value="{{ $sub_category->sub_category_name }}" readonly>
                        @break
                        @endif
                        @endforeach

                        @if(!$fieldKeyFound)
                        <input type="text" name="fields[{{ $index }}][field_key]" class="form-control"
                            value="{{ $field->field_key }}" required>
                        @endif
                    </td>
                    <td><input type="text" name="fields[{{ $index }}][label]" class="form-control"
                            value="{{ $field->label }}" required></td>
                    <td class="text-center"><input type="checkbox" name="fields[{{ $index }}][visible]" value="1" {{
                            $field->visible ? 'checked' : '' }}></td>
                    <td><input type="number" name="fields[{{ $index }}][sort_order]" class="form-control"
                            value="{{ $field->sort_order }}"></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="button" id="add-field" class="btn btn-secondary mb-3">+ Add Field</button>

        <div>
            <button type="submit" class="btn btn-primary">Update Layout</button>
            <a href="{{ route('layouts.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    let fieldIndex = {{ $layout->fields->count() }};
 
     $('#add-field').click(function () {
         let newRow = `
             <tr>
                 <td><input type="text" name="fields[${fieldIndex}][field_key]" class="form-control" required></td>
                 <td><input type="text" name="fields[${fieldIndex}][label]" class="form-control" required></td>
                 <td class="text-center"><input type="checkbox" name="fields[${fieldIndex}][visible]" value="1" checked></td>
                 <td><input type="number" name="fields[${fieldIndex}][sort_order]" class="form-control" value="${fieldIndex + 1}"></td>
                 <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
             </tr>`;
         $('#field-body').append(newRow);
         fieldIndex++;
     });
 
     $(document).on('click', '.remove-row', function () {
         $(this).closest('tr').remove();
     });
</script>
@endpush