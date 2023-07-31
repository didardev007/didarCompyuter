<div class="border rounded shadow-sm p-3">
    <div class="d-flex justify-content-between">
        <div>
            <div class="text-danger mb-1">
                <a href="{{ route('product.index', ['brand' => $product->brand->id]) }}" class="link-danger text-decoration-none">
                    {{ $product->brand->name }}
                </a>
            </div>
            <div class="mb-1">
                <a href="{{ route('product.index', ['color' => $product->color->id]) }}" class="link-danger text-decoration-none">
                    {{ $product->color->name }}
                </a>
            </div>
        </div>
        <div class="text-end">
            <button class="btn btn-light btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCar{{ $product->id }}" aria-expanded="false" aria-controls="collapseCar{{ $product->id }}">
                <i class="bi-caret-down-fill"></i>
            </button>
        </div>
    </div>
    <div id="collapseCar{{ $product->id }}" class="small text-secondary collapse">
        <a href="{{ route('product.index', ['location' => $product->location->id]) }}" class="link-danger text-decoration-none">
            {{ $product->location->name }}
        </a>
        ∙ {{ $product->description }}
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <span class="text-primary">
                {{ round($product->price, 2) }} <small>TMT</small>
            </span>
        </div>
    </div>
</div>