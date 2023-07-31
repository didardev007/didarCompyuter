<form action="{{ url()->current() }}">
    <div class="mb-3">
        <label for="brand" class="form-label fw-semibold"></label>
        <select class="form-select form-select-sm" name="brand" id="brand">
            <option value="0"></option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" {{ $brand->id == $f_brands ? 'selected' : '' }}>{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label fw-semibold text-danger">Location</label>
        <select class="form-select form-select-sm" name="location" id="location">
            <option value="0">all</option>
            @foreach($locations as $location)
                <option value="{{ $location->id }}" {{ $location->id == $f_locations ? 'selected' : '' }}>{{ $location->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="color" class="form-label fw-semibold text-danger">color</label>
        <select class="form-select form-select-sm" name="color" id="color">
            <option value="0">all</option>
            @foreach($colors as $color)
                <option value="{{ $color->id }}" {{ $color->id == $f_color ? 'selected' : '' }}>{{ $color->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="sort" class="form-label fw-semibold text-danger">sort</label>
        <select class="form-select form-select-sm" name="sort" id="sort">
            <option value="new-to-old" {{ 'new-to-old' == $f_sort ? 'selected' : '' }}>NewToOld</option>
            <option value="old-to-new" {{ 'old-to-new' == $f_sort ? 'selected' : '' }}>OldToNew</option>
            <option value="low-to-high" {{ 'low-to-high' == $f_sort ? 'selected' : '' }}>LowToHigh</option>
            <option value="high-to-low" {{ 'high-to-low' == $f_sort ? 'selected' : '' }}>HighToLow</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="perPage" class="form-label fw-semibold text-danger">perPage</label>
        <select class="form-select form-select-sm" name="perPage" id="perPage">
            @foreach([15, 30, 60, 120] as $perPage)
                <option value="{{ $perPage }}" {{ $perPage == $f_perPage ? 'selected' : '' }}>{{ $perPage }}</option>
            @endforeach
        </select>
    </div>
    <div class="row g-3">
        <div class="col">
            <a href="{{ url()->current() }}" class="btn btn-secondary btn-sm w-100">
                clear
            </a>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-danger btn-sm w-100">
                filter
            </button>
        </div>
    </div>
</form>