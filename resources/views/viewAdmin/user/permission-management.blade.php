@extends('layout.mainLayout')

@section('content')
<div class="container">
    <!-- Header -->
    <div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
        <h3 class="mb-sm-0 mb-1 fs-18">Permission Management</h3>
        <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
            <li>
                <a href="/" class="text-decoration-none">
                    <i class="ri-home-2-line" style="position: relative; top: -1px"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Permission Management</span>
            </li>
        </ul>
    </div>

    <!-- Permission Form -->
    <form action="{{ route('user.assignPermission', ['userId' => $user->id]) }}" method="POST">
        @csrf
        <div class="d-flex justify-content-between mb-3">
            <button type="button" id="select-all" class="btn btn-primary fw-semibold text-white py-2 px-4 mt-2 me-2">Select All</button>
            <button type="button" id="deselect-all" class="btn btn-secondary fw-semibold text-white py-2 px-4 mt-2 me-2">Deselect All</button>
        </div>

        <div class="row">
            @php
                $permissionGroups = $permissions->groupBy(function($permission) {
                    return explode(' ', $permission->name)[0]; // Group by the first word of permission name
                });
            @endphp

            @foreach ($permissionGroups as $group => $groupPermissions)
                <div class="col-md-3">
                    <h5 class="fs-16 fw-bold text-dark">{{ ucfirst($group) }}</h5>
                    @foreach ($groupPermissions as $permission)
                        <div class="form-check">
                            <input
                                class="form-check-input permission-checkbox"
                                type="checkbox"
                                name="permissions[]"
                                value="{{ $permission->name }}"
                                id="permission-{{ $permission->id }}"
                                @if($user->hasPermissionTo($permission->name)) checked @endif
                            >
                            <label class="form-check-label text-dark" for="permission-{{ $permission->id }}">
                                {{ ucwords(str_replace('.', ' ', $permission->name)) }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="mt-3 text-center">
            <button type="submit" class="btn btn-success fw-semibold text-white py-2 px-4 mt-2 me-2">Save Permissions</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('select-all').addEventListener('click', function() {
        document.querySelectorAll('.permission-checkbox').forEach(checkbox => checkbox.checked = true);
    });

    document.getElementById('deselect-all').addEventListener('click', function() {
        document.querySelectorAll('.permission-checkbox').forEach(checkbox => checkbox.checked = false);
    });
</script>
@endsection
