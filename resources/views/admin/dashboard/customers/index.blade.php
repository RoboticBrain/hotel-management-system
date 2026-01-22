@extends('layouts.app')

@section('title', 'Admin dashboard')
@section('selection', 'Customers')

@section('content')
<div class="container-fluid w-100">
    <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-lg-0 w-100">
            <div class="card">
                <h5 class="card-header">List</h5>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">customer name</th>
                                    <th scope="col">role</th>
                                    <th scope="col">email</th>
                                    <th scope="col">address</th>
                                    <th scope="col">contact</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($customers as $index => $customer)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>

                                        <td>
                                              @php echo $customer->user->isAdmin ?  $customer->first_name . ' ' . $customer->last_name . ' (You)'   :   $customer->first_name . ' ' . $customer->last_name
                                                @endphp
                                        </td>

                                        <td>
                                            {{ $customer->user->isAdmin ? 'Admin' : 'User' }}
                                        </td>

                                        <td>{{ $customer->user->email }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->phone_number }}</td>

                                        <td>
                                            <div>
                                                <a href="{{ route('profile.show', $customer->id) }}"
                                                   class="btn btn-sm btn-primary">
                                                    View
                                                </a>

                                                <a href="#" class="btn btn-sm btn-warning">
                                                    Edit
                                                </a>

                                                <form action="{{ route('admin.destroy.room', 1) }}"
                                                      method="POST"
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="btn btn-sm btn-danger justify-self-center">
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
</div>
@endsection
