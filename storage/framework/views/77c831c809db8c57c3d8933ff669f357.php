<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'placeholder' => 'Search...',
    'statuses' => [],
    'roomTypes' => [],
    'paymentStatuses' => [],
    'dateFilter' => false,
    'priceFilter' => false,
    'route' => '#',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'placeholder' => 'Search...',
    'statuses' => [],
    'roomTypes' => [],
    'paymentStatuses' => [],
    'dateFilter' => false,
    'priceFilter' => false,
    'route' => '#',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<form method="post" class="d-flex align-items-center gap-2" action="<?php echo e($route); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('POST'); ?>
    <!-- Search -->
    <input type="text"
           name="search"
           value="<?php echo e(request('search')); ?>"
           class="form-control"
           placeholder="<?php echo e($placeholder); ?>"
           style="width: 300px;">

    <!-- Status Filter -->
    <?php if(count($statuses)): ?>
        <select name="status" class="form-select">
            <option value="">All Status</option>
            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($status); ?>"
                    <?php echo e(request('status') == $status ? 'selected' : ''); ?>>
                    <?php echo e($status); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    <?php endif; ?>

    <!-- Room Type Filter -->
    <?php if(count($roomTypes)): ?>
        <select name="room_type" class="form-select">
            <option value="">All Types</option>
            <?php $__currentLoopData = $roomTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($type); ?>"
                    <?php echo e(request('room_type') == $type ? 'selected' : ''); ?>>
                    <?php echo e($type); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    <?php endif; ?>

    <!-- Date Filter -->
    <?php if($dateFilter): ?>
        <input type="date" name="start_date"
               value="<?php echo e(request('start_date')); ?>"
               class="form-control">

        <input type="date" name="end_date"
               value="<?php echo e(request('end_date')); ?>"
               class="form-control">
    <?php endif; ?>

    <!-- Price Filter -->
    <?php if($priceFilter): ?>
        <input type="number" name="min_price"
               value="<?php echo e(request('min_price')); ?>"
               class="form-control"
               placeholder="Min Price - 0">

        <input type="number" name="max_price"
               value="<?php echo e(request('max_price')); ?>"
               class="form-control"
               placeholder="Max Price - 0">
    <?php endif; ?>

    <button type="submit" class="btn btn-primary">Filter</button>

</form>
<?php /**PATH E:\php internship\Laravel final project\hotel_management_system\resources\views/components/filter-form.blade.php ENDPATH**/ ?>