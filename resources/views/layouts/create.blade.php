@extends('demo')
@section('content')
{{-- <h1>New Report Layout</h1> --}}
<div class="container">
    <h2>Create Manufacturing Report Layout</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Please fix the following issues:
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('layouts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Layout Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter layout name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Layout Description</label>
            <textarea name="description" class="form-control" placeholder="Enter description (optional)"></textarea>
        </div>

        <div class="form-check mb-4">
            <input type="checkbox" name="is_active" class="form-check-input" id="isActive">
            <label class="form-check-label" for="isActive">Set as Active Layout</label>
        </div>

        <h4>Fields</h4>

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
                ['field_key' => 'temp_no', 'label' => 'Temp no.'],
                ['field_key' => 'employee_name', 'label' => 'EMPLOYEE NAME'],
                ['field_key' => 'sr_fiber', 'label' => 'SR (FIBER)'],
                ['field_key' => 'mj', 'label' => 'M.J'],
                ['field_key' => 'warranty', 'label' => 'Warranty'],
                ['field_key' => 'type', 'label' => 'Type'],
                ];
                @endphp

                @foreach ($defaultFields as $index => $field)
                <tr>
                    <td><input type="text" name="fields[{{ $index }}][field_key]" class="form-control"
                            value="{{ $field['field_key'] }}" required></td>
                    <td><input type="text" name="fields[{{ $index }}][label]" class="form-control"
                            value="{{ $field['label'] }}" required></td>
                    <td class="text-center"><input type="checkbox" name="fields[{{ $index }}][visible]" value="1"
                            checked></td>
                    <td><input type="number" name="fields[{{ $index }}][sort_order]" class="form-control"
                            value="{{ $index + 1 }}"></td>
                    <td><button type="button" class="btn btn-danger btn-sm" disabled>X</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="button" id="add-field" class="btn btn-secondary mb-3">+ Add Field</button>
        <button type="button" id="preview-btn" class="btn btn-info mb-3" data-bs-toggle="modal"
            data-bs-target="#previewModal">Preview Layout</button>
        <div>
            <button type="submit" class="btn btn-primary">Create Layout</button>
            <a href="{{ route('layouts.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
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
{{-- Script to handle dynamic field rows --}}

<script>
    let fieldIndex = {{ count($defaultFields) }};
 
    document.getElementById('add-field').addEventListener('click', function () {
         const tbody = document.getElementById('field-body');
         const newRow = document.createElement('tr');
         newRow.innerHTML = `
             <td><input type="text" name="fields[${fieldIndex}][field_key]" class="form-control" required></td>
             <td><input type="text" name="fields[${fieldIndex}][label]" class="form-control" required></td>
             <td class="text-center"><input type="checkbox" name="fields[${fieldIndex}][visible]" value="1" checked></td>
             <td><input type="number" name="fields[${fieldIndex}][sort_order]" class="form-control" value="${fieldIndex + 1}"></td>
             <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
         `;
         tbody.appendChild(newRow);
         fieldIndex++;
     });
 
     document.addEventListener('click', function (e) {
         if (e.target.classList.contains('remove-row')) {
             e.target.closest('tr').remove();
            //  fieldIndex--;
         }
     });
    document.getElementById('preview-btn').addEventListener('click', function() {
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
            
            allFields.push({
                fieldKey,
                label,
                visible,
                sortOrder
            });
        });
        
        // Sort fields by sort order
        allFields.sort((a, b) => a.sortOrder - b.sortOrder);
        
        // Create container for the first row (special treatment for first 7 fields)
        const firstRow = document.createElement('div');
        firstRow.className = 'row row-cols-3 g-3 mb-3';
        fieldsContainer.appendChild(firstRow);
        
        // Create container for remaining rows (2 columns)
        const remainingRows = document.createElement('div');
        remainingRows.className = 'row g-3';
        fieldsContainer.appendChild(remainingRows);
        
        // Process first 7 fields - show empty space if not visible
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
                // Create empty placeholder for invisible fields
                fieldCol.innerHTML = `
                    <div class="border rounded p-2 h-100 bg-light">
                        <div class="text-muted small mb-1">(Hidden)</div>
                        <div class="fw-semibold">${field.label}</div>
                    </div>
                `;
            }
            
            // First 3 fields go in the 3-column row
            if (index < 3) {
                firstRow.appendChild(fieldCol);
            } 
            // Next 4 fields (index 3-6) go in 2-column rows
            else {
                // Create new row if needed (every 2 columns)
                if ((index - 3) % 2 === 0) {
                    const newRow = document.createElement('div');
                    newRow.className = 'row row-cols-2 g-3';
                    remainingRows.appendChild(newRow);
                }
                const currentRow = remainingRows.lastElementChild;
                currentRow.appendChild(fieldCol);
            }
        });
        
        // Process remaining fields (index 7+)
        allFields.slice(7).forEach((field) => {
            if (!field.visible) return; // Skip invisible fields beyond first 7
            
            const fieldCol = document.createElement('div');
            fieldCol.className = 'col';
            fieldCol.innerHTML = `
                <div class="border rounded p-2 h-100">
                    <div class="text-muted small mb-1">${field.label}</div>
                    <div class="fw-semibold">${field.fieldKey}</div>
                </div>
            `;
            
            // Add to remaining rows (2 columns)
            if (remainingRows.lastElementChild.children.length >= 2) {
                const newRow = document.createElement('div');
                newRow.className = 'row row-cols-2 g-3';
                remainingRows.appendChild(newRow);
            }
            const currentRow = remainingRows.lastElementChild;
            currentRow.appendChild(fieldCol);
        });
    });
</script>
@endsection