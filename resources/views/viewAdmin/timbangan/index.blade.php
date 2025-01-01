@extends('layout.mainLayout')



@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card bg-white border-0 rounded-10 mb-4">
                <div class="d-flex  align-items-center bg-body justify-content-between ">
                    <h5 class="ms-5">Table Timbangan</h5>

                    <button type="button" class="btn btn-primary text-white me-5" onclick="window.location.href='/timbangan-create'">
                        Tambah
                    </button>
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
                                        <th scope="col">no</th>
                                        <th scope="col">no SPA</th>
                                        <th scope="col">tanggal</th>
                                        {{-- <th scope="col">nomer kontrak</th> --}}
                                        <th scope="col">nama kebun</th>
                                        <th scope="col">nama petani</th>
                                        <th scope="col">nopol</th>
                                        <th scope="col">sopir</th>
                                        <th scope="col">status_timbang</th>
                                        <th scope="col">bruto</th>
                                        <th scope="col">tara</th>
                                        <th scope="col">neto</th>
                                        <th scope="col">tanggal masuk pos</th>
                                        <th scope="col">tanggal timbang pos</th>
                                        <th scope="col">tanggal timbang keluar</th>
                                        <th scope="col">jenis tebu</th>
                                        <th scope="col">brix</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($timbangans as $item)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $item->no_spa }}
                                            </td>
                                            <td>
                                                <a href="">
                                                    {{ $item->tanggal }}
                                                </a>
                                            </td>

                                            {{-- <td>
                                                <a>
                                                    {{ $item->master_kebun_id }}
                                                </a>
                                            </td> --}}

                                            <td>
                                                <a>
                                                    {{ $item->nama_kebun }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->nama_petani }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->nopol }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->sopir }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->status_timbang }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->bruto }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->tara }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->neto }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->tgl_masuk_pos }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->tgl_timb_masuk }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->tgl_timb_keluar }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->jenis_tebu }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->brix }}
                                                </a>
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
                                                                href="/timbangan/{{$item->id_timbangan}}/edit">
                                                                <i data-feather="edit-3"></i>
                                                                Rename
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="/timbangan/{{$item->id_timbangan}}/delete">
                                                                <i data-feather="trash-2"></i>
                                                                Remove
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
