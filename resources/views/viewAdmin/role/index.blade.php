@php
    $no = 1;
@endphp
@extends('layout.mainLayout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card bg-white border-0 rounded-10 mb-4">
                <div class="d-flex  align-items-center bg-body justify-content-between ">
                    <h5 class="ms-5">Table Roles</h5>

                    <a href="{{ route('user.create') }}" class="">
                        <button type="button" class="btn btn-primary text-white me-5">
                            Tambah
                        </button>
                    </a>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel" aria-labelledby="preview-tab"
                    tabindex="0">
                    <div class="default-table-area members-list">
                        <div class="table-responsive">
                            <table class="table align-middle" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Guard</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['roles'] as $role)
                                        <tr>
                                            <td>
                                                {{ $no++ }}
                                            </td>
                                            <td>
                                                {{ $role->name }}
                                            </td>
                                            <td>
                                                {{ $role->guard_name }}
                                            </td>
                                            <td>
                                                <div class="dropdown action-opt">
                                                    <button class="btn bg p-0" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i data-feather="more-horizontal"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('user.edit', ['id' => $role->id]) }}">
                                                                <i data-feather="edit-3"></i>
                                                                Rename
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('user.delete', $role->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item"
                                                                    href="/kebun/{{ $role->id }}/delete">
                                                                    <i data-feather="trash-2"></i>
                                                                    Remove
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('role.managePermissions', ['role' => $role->id]) }}">
                                                                <i data-feather="sliders"></i>
                                                                Manage Permissions
                                                            </a>
                                                        </li>
                                                    </ul>
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
