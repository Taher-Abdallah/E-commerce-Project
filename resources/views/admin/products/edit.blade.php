@extends('admin.master')
@section('title', __('keywords.edit_product'))

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-9 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('keywords.products') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">{{ __('keywords.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.products.index') }}">{{ __('keywords.products') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('keywords.edit_product') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-md-11">
                    <div class="content-body">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('keywords.edit_product') }}</h4>
                            </div>

                            <div class="card-content">
                                <div class="card-body">
                                    <div class="container mt-4">
                                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                                            id="product-form" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            {{-- ================= STEP 1 ================= --}}
                                            <div id="step1">
                                                <h4 class="mb-3">Step 1 - Basic Information</h4>
                                                <div class="row mt-2">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Product Name</label>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ old('name', $product->name) }}">
                                                        </div>
                                                        <x-error-validate field="name" />
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Small Description</label>
                                                            <input type="text" name="small_desc" class="form-control"
                                                                value="{{ old('small_desc', $product->small_desc) }}">
                                                        </div>
                                                        <x-error-validate field="small_desc" />
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select name="status" class="form-control">
                                                                <option value="1"
                                                                    {{ old('status', $product->status) == '1' ? 'selected' : '' }}>
                                                                    Active</option>
                                                                <option value="0"
                                                                    {{ old('status', $product->status) == '0' ? 'selected' : '' }}>
                                                                    Inactive</option>
                                                            </select>
                                                        </div>
                                                        <x-error-validate field="status" />
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>SKU</label>
                                                            <input type="text" name="sku" class="form-control"
                                                                value="{{ old('sku', $product->sku) }}">
                                                        </div>
                                                        <x-error-validate field="sku" />
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Available For</label>
                                                            <input type="date" name="available_for" class="form-control"
                                                                value="{{ old('available_for', $product->available_for) }}">
                                                        </div>
                                                        <x-error-validate field="available_for" />
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Discount</label>
                                                            <input type="number" step="0.01" name="discount"
                                                                class="form-control"
                                                                value="{{ old('discount', $product->discount) }}">
                                                        </div>
                                                        <x-error-validate field="discount" />
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Start Discount</label>
                                                            <input type="date" name="start_discount" class="form-control"
                                                                value="{{ old('start_discount', $product->start_discount) }}">
                                                        </div>
                                                        <x-error-validate field="start_discount" />
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>End Discount</label>
                                                            <input type="date" name="end_discount" class="form-control"
                                                                value="{{ old('end_discount', $product->end_discount) }}">
                                                        </div>
                                                        <x-error-validate field="end_discount" />
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Manage Stock?</label>
                                                            <select name="manage_stock" id="manage_stock"
                                                                class="form-control">
                                                                <option value="">-- Select --</option>
                                                                <option value="1"
                                                                    {{ old('manage_stock', $product->manage_stock) == '1' ? 'selected' : '' }}>
                                                                    Yes</option>
                                                                <option value="0"
                                                                    {{ old('manage_stock', $product->manage_stock) == '0' ? 'selected' : '' }}>
                                                                    No</option>
                                                            </select>
                                                        </div>
                                                        <x-error-validate field="manage_stock" />
                                                    </div>

                                                    <div class="col-md-4 quantity-field"
                                                        style="display: {{ old('manage_stock', $product->manage_stock) == '1' ? 'block' : 'none' }};">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input type="number" name="quantity" class="form-control"
                                                                value="{{ old('quantity', $product->quantity) }}">
                                                        </div>
                                                        <x-error-validate field="quantity" />
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Available in Stock</label>
                                                            <select name="available_in_stock" class="form-control">
                                                                <option value="1"
                                                                    {{ old('available_in_stock', $product->available_in_stock) == '1' ? 'selected' : '' }}>
                                                                    Available</option>
                                                                <option value="0"
                                                                    {{ old('available_in_stock', $product->available_in_stock) == '0' ? 'selected' : '' }}>
                                                                    Not Available</option>
                                                            </select>
                                                        </div>
                                                        <x-error-validate field="available_in_stock" />
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Brand</label>
                                                            <select name="brand_id" class="form-control">
                                                                @foreach ($brands as $brand)
                                                                    <option value="{{ $brand->id }}"
                                                                        {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                                                        {{ $brand->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <x-error-validate field="brand_id" />
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Category</label>
                                                            <select name="category_id" class="form-control">
                                                                @foreach ($categories as $cat)
                                                                    <option value="{{ $cat->id }}"
                                                                        {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                                                        {{ $cat->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <x-error-validate field="category_id" />
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Product Description</label>
                                                            <textarea name="desc" class="form-control" rows="4">{{ old('desc', $product->desc) }}</textarea>
                                                        </div>
                                                        <x-error-validate field="desc" />
                                                    </div>
                                                </div>

                                                <button type="button" id="nextBtn"
                                                    class="btn btn-primary mt-3">Next</button>
                                            </div>

                                            {{-- ================= STEP 2 ================= --}}
                                            <div id="step2"
                                                style="display: {{ $errors->any() ? 'block' : 'none' }};">
                                                <h4 class="mb-3">Step 2 - Images & Variants</h4>



                                                <div class="form-group">
                                                    <label>Add New Images (Optional)</label>
                                                    <input type="file" name="images[]" id="multiple-image-edit"
                                                        multiple class="form-control">
                                                    <x-error-validate field="images" />
                                                </div>
                                                <input type="hidden" name="deleted_images" id="deletedImages">


                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <label>Has Variants?</label>
                                                        <select name="has_variants" id="has_variants"
                                                            class="form-control">
                                                            <option value="">-- Select --</option>
                                                            <option value="1"
                                                                {{ old('has_variants', $product->has_variants) == '1' ? 'selected' : '' }}>
                                                                Yes</option>
                                                            <option value="0"
                                                                {{ old('has_variants', $product->has_variants) == '0' ? 'selected' : '' }}>
                                                                No</option>
                                                        </select>
                                                        <x-error-validate field="has_variants" />
                                                    </div>

                                                    <div class="col-md-6 price-field"
                                                        style="display: {{ old('has_variants', $product->has_variants) == '1' ? 'none' : 'block' }};">
                                                        <label>Price</label>
                                                        <input type="number" step="0.01" name="price"
                                                            class="form-control"
                                                            value="{{ old('price', $product->price) }}">
                                                        <x-error-validate field="price" />
                                                    </div>
                                                </div>

                                                <hr>

                                                <h5 id="variantsHeader"
                                                    style="display: {{ old('has_variants', $product->has_variants) == '1' ? 'block' : 'none' }};">
                                                    Product Variants</h5>
                                                <button type="button" id="addVariantBtn"
                                                    class="btn btn-success btn-sm mb-2"
                                                    style="display: {{ old('has_variants', $product->has_variants) == '1' ? 'inline-block' : 'none' }};">+
                                                    Add Variant</button>
                                                <div id="variantsContainer"></div>

                                                <div class="mt-3">
                                                    <button type="button" id="prevBtn"
                                                        class="btn btn-secondary">Back</button>
                                                    <button type="submit" class="btn btn-success">Update Product</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const colors = @json($colors ?? []);
            const sizes = @json($sizes ?? []);
            const existingVariants = @json($product->productVariants ?? []);
            let variantIndex = 0;

            // =============================================
            // 1️⃣ التحكم في الخطوات
            // =============================================
            @if ($errors->any())
                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'block';
            @endif

            document.getElementById('nextBtn').addEventListener('click', function() {
                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'block';
            });

            document.getElementById('prevBtn').addEventListener('click', function() {
                document.getElementById('step2').style.display = 'none';
                document.getElementById('step1').style.display = 'block';
            });

            // =============================================
            // 2️⃣ Toggle Price Field
            // =============================================
            document.getElementById('has_variants').addEventListener('change', function() {
                const priceField = document.querySelector('.price-field');
                const variantsHeader = $('#variantsHeader');
                const addVariantBtn = $('#addVariantBtn');

                if (this.value == '1') {
                    priceField.style.display = 'none';
                    document.querySelector('input[name="price"]').value = '';
                    variantsHeader.show();
                    addVariantBtn.show();
                } else {
                    priceField.style.display = 'block';
                    variantsHeader.hide();
                    addVariantBtn.hide();
                    // مسح كل الـ variants
                    $('#variantsContainer').empty();
                    variantIndex = 0;
                }
            });

            // =============================================
            // 3️⃣ Toggle Quantity Field
            // =============================================
            document.getElementById('manage_stock').addEventListener('change', function() {
                const quantityField = document.querySelector('.quantity-field');
                if (this.value == '1') {
                    quantityField.style.display = 'block';
                } else {
                    quantityField.style.display = 'none';
                    document.querySelector('input[name="quantity"]').value = '';
                }
            });

            // =============================================
            // 4️⃣ دالة لإنشاء Variant HTML
            // =============================================
            function createVariantHtml(index, variantData = {}) {
                let colorOptions = '<option value="">Select Color</option>';
                if (Array.isArray(colors)) {
                    colors.forEach(function(color) {
                        if (color && color.id && color.value) {
                            const selected = variantData.color == color.id ? 'selected' : '';
                            colorOptions +=
                                `<option value="${color.id}" ${selected}>${color.value}</option>`;
                        }
                    });
                }

                let sizeOptions = '<option value="">Select Size</option>';
                if (Array.isArray(sizes)) {
                    sizes.forEach(function(size) {
                        if (size && size.id && size.value) {
                            const selected = variantData.size == size.id ? 'selected' : '';
                            sizeOptions += `<option value="${size.id}" ${selected}>${size.value}</option>`;
                        }
                    });
                }

                const errors = @json($errors->toArray());
                let priceError = errors[`variants.${index}.price`] ?
                    `<span class="text-danger d-block">${errors['variants.' + index + '.price'][0]}</span>` : '';
                let quantityError = errors[`variants.${index}.stock`] ?
                    `<span class="text-danger d-block">${errors['variants.' + index + '.stock'][0]}</span>` : '';
                let colorError = errors[`variants.${index}.color`] ?
                    `<span class="text-danger d-block">${errors['variants.' + index + '.color'][0]}</span>` : '';
                let sizeError = errors[`variants.${index}.size`] ?
                    `<span class="text-danger d-block">${errors['variants.' + index + '.size'][0]}</span>` : '';

                const variantIdInput = variantData.id ?
                    `<input type="hidden" name="variants[${index}][id]" value="${variantData.id}">` : '';

                const html = `
            <div class="card p-3 mb-2 variant-item" data-index="${index}">
                ${variantIdInput}
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <input type="number" step="0.01" name="variants[${index}][price]" class="form-control" placeholder="Price" value="${variantData.price || ''}">
                        ${priceError}
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="variants[${index}][stock]" class="form-control" placeholder="Quantity" value="${variantData.stock || ''}">
                        ${quantityError}
                    </div>
                    <div class="col-md-3">
                        <select name="variants[${index}][color]" class="form-control">${colorOptions}</select>
                        ${colorError}
                    </div>
                    <div class="col-md-2">
                        <select name="variants[${index}][size]" class="form-control">${sizeOptions}</select>
                        ${sizeError}
                    </div>
                    <div class="col-md-1 text-center">
                        <button type="button" class="btn btn-danger btn-sm removeVariantBtn">X</button>
                    </div>
                </div>
            </div>
        `;

                return html;
            }

            // =============================================
            // تحميل الـ variants
            const variantsContainer = $('#variantsContainer');
            const oldVariants = @json(old('variants', []));

            if (Object.keys(oldVariants).length > 0) {
                Object.keys(oldVariants).forEach(function(key) {
                    variantsContainer.append(createVariantHtml(key, oldVariants[key]));
                    variantIndex = parseInt(key) + 1;
                });
            } else if (Array.isArray(existingVariants) && existingVariants.length > 0) {
                existingVariants.forEach(function(variant, index) {

                    let colorId = null;
                    let sizeId = null;

                    if (variant.variant_attributes && Array.isArray(variant.variant_attributes)) {
                        variant.variant_attributes.forEach(function(variantAttr) {

                            const attrName = variantAttr.attribute_value.attribute.name
                                .toLowerCase();

                            if (attrName.includes('color')) {
                                colorId = variantAttr.attribute_value_id;
                            } else if (attrName.includes('size')) {
                                sizeId = variantAttr.attribute_value_id;
                            }
                        });
                    }

                    const variantData = {
                        id: variant.id,
                        price: variant.price,
                        stock: variant.stock,
                        color: colorId,
                        size: sizeId
                    };

                    variantsContainer.append(createVariantHtml(index, variantData));
                    variantIndex = index + 1;
                });
            }



            // =============================================
            // 6️⃣ إضافة Variant جديد
            // =============================================
            $('#addVariantBtn').on('click', function() {
                variantsContainer.append(createVariantHtml(variantIndex, {}));
                variantIndex++;
            });

            // =============================================
            // 7️⃣ حذف Variant
            // =============================================
            $(document).on('click', '.removeVariantBtn', function() {
                $(this).closest('.variant-item').remove();
            });
        });
    </script>



    <script>
        $(function() {
            var deletedImages = []; // array لتخزين IDs الصور المحذوفة

            $("#multiple-image-edit").fileinput({
                theme: "fa5",
                allowedFileExtensions: ["jpg", "png", "gif"],
                allowedFileTypes: ["image"],
                maxFileCount: 5,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                    @foreach ($product->productImages as $image)
                        "{{ asset('storage/products/' . $image->file_name) }}",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach ($product->productImages as $image)
                        {
                            caption: "{{ $image->file_name }}",
                            key: "{{ $image->id }}",
                            url: "{{ route('admin.products.delete-image', $image->id) }}",
                            extra: {
                                _token: "{{ csrf_token() }}"
                            }
                        },
                    @endforeach
                ],
                showRemove: false,
                showDelete: true,

            });
        });
    </script>
@endpush
