@extends('demo')
@section('content')
<div class="container-fluid">
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
            <label class="form-label">Layout Part</label>
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
                @php
                $defaultFields = [
                ['field_key' => 'part', 'label' => 'Part'],
                ['field_key' => 'temp', 'label' => 'Temp no.'],
                ['field_key' => 'worker_name', 'label' => 'EMPLOYEE NAME'],
                ['field_key' => 'sr_no_fiber', 'label' => 'SR (FIBER)'],
                ['field_key' => 'mj', 'label' => 'M.J'],
                ['field_key' => 'warranty', 'label' => 'Warranty'],
                ['field_key' => 'type', 'label' => 'Type'],
                ];

                $allFields = array_merge(
                $defaultFields,
                $sub_categories->map(function($item) {
                return [
                'is_subcategory' => true,
                'id' => $item['id'],
                'field_key' => $item['category']['category_name'].' '.$item['sub_category_name'],
                'label' => ucwords($item['category']['category_name']).'-'.ucwords($item['sub_category_name'])
                ];
                })->toArray()
                );
                @endphp
                {{-- {{ dd($allFields)}} --}}
                @foreach ($layout->fields as $index => $field)
                <tr>
                    <td>
                        @php $fieldKeyFound = false @endphp
                        @foreach ($sub_categories as $sub_category)
                            @if($sub_category->id == $field->field_key)
                                {{-- {{dd($field,$sub_category);}} --}}
                                {{-- {{ dd($field);}} --}}
                                @php $fieldKeyFound = true @endphp
                                <input type="hidden" name="fields[{{ $index }}][id]" value="{{ $field->id }}">
                                <input type="text" name="fields[{{ $index }}][field_key]" class="form-control readonly-field"
                                    value="{{ $sub_category->sub_category_name }}" readonly>
                                @break
                            
                            @else

                            @endif
                            
                        @endforeach

                        @if(!$fieldKeyFound)
                        <input type="text" name="fields[{{ $index }}][field_key]" class="form-control"
                            value="{{ $field->field_key }}" required>
                        @endif
                    </td>
                    <td><input type="text" name="fields[{{ $index }}][label]" class="form-control" value="{{ $field->label }}" required></td>
                    <td class="text-center"><input type="checkbox" name="fields[{{ $index }}][visible]" value="1" {{ $field->visible ? 'checked' : '' }}></td>
                    <td><input type="number" name="fields[{{ $index }}][sort_order]" class="form-control" value="{{ $field->sort_order }}"></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row">{{ $index }}</button></td></tr>
                @endforeach
            </tbody>
        </table>

        <button type="button" id="add-field" class="btn btn-secondary mb-3">+ Add Field</button>
        <button type="button" id="preview-btn" class="btn btn-info mb-3" data-bs-toggle="modal"
            data-bs-target="#previewModal">Preview Layout</button>
        <div>
            <div>
                <button type="submit" class="btn btn-primary">Update Layout</button>
                <a href="{{ route('layouts.index') }}" class="btn btn-secondary">Back</a>
            </div>
    </form>

    <!-- Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Layout Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Layout Preview using row/col -->
                    <div class="container-fluid">
                        <div class="row g-3" id="preview-fields-container"></div>
                    </div>

                    <!-- Layout Details -->
                    <div class="mt-4 p-3 bg-light rounded">
                        <h6>Layout Details:</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Name:</strong> <span id="preview-layout-name"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Description:</strong> <span id="preview-layout-desc"></span></p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Active:</strong> <span id="preview-layout-active"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let fieldIndex = 7 + {{ count($sub_categories)}};
    
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

    document.getElementById('preview-btn').addEventListener('click', function() {
    // $(document).on('click', '#preview-btn', function () {

        // Get layout details
        const layoutName = document.querySelector('input[name="name"]').value || 'Untitled Layout';
        const layoutDesc = document.querySelector('textarea[name="description"]').value || 'No description';
        const isActive = document.querySelector('input[name="is_active"]').checked ? 'Yes' : 'No';
        
        // Update layout details
        document.getElementById('preview-layout-name').textContent = layoutName;
        document.getElementById('preview-layout-desc').textContent = layoutDesc;
        document.getElementById('preview-layout-active').textContent = isActive;
        
        // Get all fields
        const rows = document.querySelectorAll('#field-body tr');
        const fieldsContainer = document.getElementById('preview-fields-container');
        
        // Clear previous content
        fieldsContainer.innerHTML = '';
        
        // Collect all fields (including visibility status) sorted by sort order
        const allFields = [];
        
        rows.forEach(row => {
            const fieldKey = row.querySelector('input[name*="[field_key]"]').value;
            const label = row.querySelector('input[name*="[label]"]').value;
            const visible = row.querySelector('input[name*="[visible]"]').checked;
            const sortOrder = parseInt(row.querySelector('input[name*="[sort_order]"]').value) || 0;
            const isSubcategory = row.querySelector('input[name*="[is_subcategory]"]')?.checked || false;
            
            allFields.push({
                fieldKey,
                label,
                visible,
                sortOrder,
                isSubcategory
            });
        });
        
        // Sort fields by sort order
        allFields.sort((a, b) => a.sortOrder - b.sortOrder);
        
        // Create containers for different field groups
        const firstRow = document.createElement('div');
        firstRow.className = 'row row-cols-3 g-2 mb-2';
        fieldsContainer.appendChild(firstRow);
        
        const secondRow = document.createElement('div');
        secondRow.className = 'row row-cols-2 g-2 mb-2';
        fieldsContainer.appendChild(secondRow);
        
        const remainingContainer = document.createElement('div');
        remainingContainer.className = 'remaining-fields';
        fieldsContainer.appendChild(remainingContainer);
        
        // Process first 7 fields
        allFields.slice(0, 7).forEach((field, index) => {
            const fieldCol = document.createElement('div');
            fieldCol.className = 'col';
            
            if (field.visible) {
                fieldCol.innerHTML = `
                    <div class="border rounded p-2 h-100">
                        <div class="text-muted small mb-1">${field.label}</div>
                        <div class="fw-semibold">${field.fieldKey}</div>
                    </div>
                `;
            } else {
                fieldCol.innerHTML = `
                    <div class="border rounded p-2 h-100 bg-light">
                        <div class="text-muted small mb-1">(Hidden)</div>
                        <div class="fw-semibold">${field.label}</div>
                    </div>
                `;
            }
            
            if (index < 3) {
                firstRow.appendChild(fieldCol);
            } else {
                secondRow.appendChild(fieldCol);
            }
        });
        
        // Process remaining fields (index 7+)
        let currentRow = null;
        
        allFields.slice(7).forEach((field) => {
            if (!field.visible) return;
            
            // Create new row for subcategories or if no current row exists
            if (field.isSubcategory || !currentRow) {
                currentRow = document.createElement('div');
                currentRow.className = 'row row-cols-1 g-2 mb-2';
                remainingContainer.appendChild(currentRow);
            }
            
            const fieldCol = document.createElement('div');
            fieldCol.className = 'col';
            fieldCol.innerHTML = `
                <div class="border rounded p-2 h-100">
                    <div class="text-muted small mb-1">${field.label}</div>
                    <div class="fw-semibold">${field.fieldKey}</div>
                </div>
            `;
            
            currentRow.appendChild(fieldCol);
        });
    });
</script>
@endsection