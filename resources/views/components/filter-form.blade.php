@props([
    'placeholder' => 'Search...',
    'statuses' => [],
    'roomTypes' => [],
    'paymentStatuses' => [],
    'dateFilter' => false,
    'priceFilter' => false,
    'route' => '#',
])

<form method="post" class="d-flex align-items-center gap-2" action="{{ $route }}">
    @csrf
    @method('POST')
    <!-- Search -->
    <input type="text"
           name="search"
           value="{{ request('search') }}"
           class="form-control"
           placeholder="{{ $placeholder }}"
           style="width: 300px;">

    <!-- Status Filter -->
    @if(count($statuses))
        <select name="status" class="form-select">
            <option value="">All Status</option>
            @foreach($statuses as $status)
                <option value="{{ $status }}"
                    {{ request('status') == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>
    @endif

    <!-- Room Type Filter -->
    @if(count($roomTypes))
        <select name="room_type" class="form-select">
            <option value="">All Types</option>
            @foreach($roomTypes as $type)
                <option value="{{ $type }}"
                    {{ request('room_type') == $type ? 'selected' : '' }}>
                    {{ $type }}
                </option>
            @endforeach
        </select>
    @endif

    <!-- Date Filter -->
    @if($dateFilter)
        <input type="date" name="start_date"
               value="{{ request('start_date') }}"
               class="form-control">

        <input type="date" name="end_date"
               value="{{ request('end_date') }}"
               class="form-control">
    @endif

    <!-- Price Filter -->
    @if($priceFilter)
        <input type="number" name="min_price"
               value="{{ request('min_price') }}"
               class="form-control"
               placeholder="Min Price - 0">

        <input type="number" name="max_price"
               value="{{ request('max_price')  }}"
               class="form-control"
               placeholder="Max Price - 0">
    @endif

    <button type="submit" class="btn btn-primary">Filter</button>

</form>
