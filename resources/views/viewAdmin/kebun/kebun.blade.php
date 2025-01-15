@extends('layout.mainLayout')



@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card bg-white border-0 rounded-10 mb-4">
                <div class="d-flex  align-items-center bg-body justify-content-between ">
                    <h5 class="ms-5">Table Kebun</h5>

                    @if (Auth::user()->can('kebun.create'))
                        <button type="button" class="btn btn-primary text-white me-5"
                            onclick="window.location.href='/kebun-create'">
                            Tambah
                        </button>
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
                                        <th scope="col">Nomer Kontrak</th>
                                        <th scope="col">Nama Kebun</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Luas</th>
                                        <th scope="col">Provinsi</th>
                                        <th scope="col">Kecamatan</th>
                                        <th scope="col">Kabupaten</th>
                                        <th scope="col">Nama Petani</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kebuns as $item)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $item->nomer_kontrak }}
                                            </td>
                                            <td>
                                                <a href="">
                                                    {{ $item->nama_kebun }}
                                                </a>
                                            </td>

                                            <td>
                                                <a>
                                                    {{ $item->alamat }}
                                                </a>
                                            </td>

                                            <td>
                                                <a>
                                                    {{ $item->luas }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->provinsi }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->kecamatan }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->kabupaten }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->nama_petani }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->status }}
                                                </a>
                                            </td>
                                            <td>
                                                <div class="dropdown action-opt">
                                                    <button class="btn bg p-0" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i data-feather="more-horizontal"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                        @if (Auth::user()->can('kebun.edit'))
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="/kebun/{{ $item->id_master_kebun }}/edit">
                                                                    <i data-feather="edit-3"></i>
                                                                    Rename
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if (Auth::user()->can('kebun.delete'))
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="/kebun/{{ $item->id_master_kebun }}/delete">
                                                                    <i data-feather="trash-2"></i>
                                                                    Remove
                                                                </a>
                                                            </li>
                                                        @endif
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
