<x-layout>
    <x-slot name="title">Layout Report</x-slot>
    <x-slot name="main">
        <form action="{{ route('layout.store' ) }}" method="POST">
            @csrf
            <div class="container">
                <div class="row m-3">
                    <!-- Centering the form on larger screens -->
                    <div class="col-12 ">
                        <h5>Layout</h5>
                        <div class="row">
                            @foreach ($categories as $category)
                            <div class="col-md-4 mt-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="d_id[]"
                                        value="{{ $category->id }}" id="category_{{ $category->id }}">
                                    <label class="form-check-label" for="category_{{ $category->id }}">
                                        {{ $category->category_name }}
                                        <i class="ri-arrow-down-s-line toggle-icon"></i>
                                        <!-- Down Arrow -->
                                    </label>
                                </div>
                                <div class="category-list ml-4" style="display: none;"> <!-- Hidden by default -->
                                    @foreach ($subcategories as $subcategory)
                                        @if($subcategory->cid === $category->id)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                    name="p_id[{{ $category->id }}][]" value="{{ $subcategory->id }}"
                                                    id="subcategory_{{ $category->id }}_{{ $subcategory->id }}">
                                                <label class="form-check-label"
                                                    for="subcategory_{{ $category->id }}_{{ $subcategory->id }}">
                                                    {{ $subcategory->sub_category_name }}
                                                </label>
                                            </div>
                                            @if($subcategory->sr_no === 1)
                                                <div class="category-list ml-4">

                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="p_id[{{ $category->id }}][]" value="{{ $subcategory->id }}"
                                                            id="subcategory_{{ $category->id }}_{{ $subcategory->id }}_AMP">
                                                        <label class="form-check-label"
                                                            for="subcategory_{{ $category->id }}_{{ $subcategory->id }}_AMP">
                                                          SR No.
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="p_id[{{ $category->id }}][]" value="{{ $subcategory->id }}"
                                                            id="subcategory_{{ $category->id }}_{{ $subcategory->id }}_AMP">
                                                        <label class="form-check-label"
                                                            for="subcategory_{{ $category->id }}_{{ $subcategory->id }}_AMP">
                                                            AMP.
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="p_id[{{ $category->id }}][]" value="{{ $subcategory->id }}"
                                                            id="subcategory_{{ $category->id }}_{{ $subcategory->id }}_VOLT">
                                                        <label class="form-check-label" for="VOLT">
                                                            VOLT
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="p_id[{{ $category->id }}][]" value="{{ $subcategory->id }}"
                                                            id="subcategory_{{ $category->id }}_{{ $subcategory->id }}_WATT">
                                                        <label class="form-check-label" for="WATT">
                                                            WATT
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </x-slot>
</x-layout>