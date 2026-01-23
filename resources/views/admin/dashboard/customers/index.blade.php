@extends('layouts.app')

@section('title', 'Admin dashboard')
@section('selection', 'Customers')

@section('content')

<style>
    /* ===== HARD STOP HORIZONTAL SCROLL ===== */
    html, body, .container-fluid, .row, .col-12 {
        max-width: 100vw;
        overflow-x: hidden !important;
    }

    /* Lock table layout */
    .fixed-table {
        table-layout: fixed !important;
        width: 100% !important;
        max-width: 100% !important;
    }

    /* Force cells to stay inside */
    .fixed-table th,
    .fixed-table td {
        max-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Button column safety */
    .action-buttons {
        display: flex;
        gap: 6px;
        flex-wrap: nowrap;
        max-width: 100%;
    }

    .action-buttons form {
        margin: 0;
    }
</style>

<div class="container-fluid px-2">
    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <h5 class="card-header">List</h5>

                <div class="card-body p-2">
                    <!-- DO NOT use table-responsive -->
                    <table class="table fixed-table align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th style="width:5%">#</th>
                                <th style="width:11%">User Name</th>
                                <th style="width:5%">Role</th>
                                <th style="width:15%">Email</th>
                                <th style="width:13%">Address</th>
                                <th style="width:10%">Contact</th>
                                <th style="width:10%">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($customers as $index => $customer)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>
                                        {{ $customer->first_name }} {{ $customer->last_name }}
                                        @if($customer->user->isAdmin)
                                            <span class="badge bg-success ms-1">You</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $customer->user->isAdmin ? 'Admin' : 'User' }}
                                    </td>

                                    <td>
                                        {{ $customer->user->email }}
                                    </td>

                                    <td>
                                        {{ $customer->address }}
                                    </td>

                                    <td>
                                        {{ $customer->phone_number }}
                                    </td>

                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('profile.show', $customer->id) }}"
                                               class="btn btn-sm btn-primary">
                                                View
                                            </a>

                                            <a href="{{ route('admin.edit.customer',$customer->id) }}"
                                               class="btn btn-sm btn-warning">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.destroy.customer', $customer->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
