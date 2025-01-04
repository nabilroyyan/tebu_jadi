@php
    $no = 1;
@endphp
@extends('layout.mainLayout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card bg-white border-0 rounded-10 mb-4">
                <div class="d-flex  align-items-center bg-body justify-content-between ">
                    <h5 class="ms-5">Table User</h5>

                    @if (Auth::user()->can('user.create'))
                        <a href="{{ route('user.create') }}" class="">
                            <button type="button" class="btn btn-primary text-white me-5">
                                Tambah
                            </button>
                        </a>
                    @endif
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
                                        <th scope="col">Role</th>
                                        <th scope="col">Email</th>
                                        @if (Auth::user()->can('user.edit') || Auth::user()->can('user.delete'))
                                            <th scope="col">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['users'] as $user)
                                        <tr>
                                            <td>
                                                {{ $no++ }}
                                            </td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->getRoleNames()->first() }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            @if (Auth::user()->can('user.edit') || Auth::user()->can('user.delete'))
                                                <td>
                                                    <div class="dropdown action-opt">
                                                        <button class="btn bg p-0" type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i data-feather="more-horizontal"></i>
                                                        </button>
                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                            @if (Auth::user()->can('user.edit'))
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('user.edit', ['id' => $user->id]) }}">
                                                                        <i data-feather="edit-3"></i>
                                                                        Rename
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if (Auth::user()->can('user.delete'))
                                                                <li>
                                                                    <form action="{{ route('user.delete', $user->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item"
                                                                            href="/kebun/{{ $user->id }}/delete">
                                                                            <i data-feather="trash-2"></i>
                                                                            Remove
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            @endif
                                                            @if (Auth::user()->can('role.management'))
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('user.managePermissions', ['userId' => $user->id]) }}">
                                                                    <i data-feather="sliders"></i>
                                                                    Manage Permissions
                                                                </a>
                                                            </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </td>
                                            @endif
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
