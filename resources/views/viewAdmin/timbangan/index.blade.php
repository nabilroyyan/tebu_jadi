@extends('layout.mainLayout')

@section('content')


<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="d-flex align-items-center bg-body justify-content-between">
                <h5 class="ms-5">Table Penayangan</h5>

                <button type="button" class="btn btn-primary text-white me-5" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Tambah
                </button>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel"
                aria-labelledby="preview-tab" tabindex="0">
                <div class="default-table-area members-list">
                    <div class="table-responsive">
                        <table class="table align-middle" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama film</th>
                                    <th scope="col">Jam Mulai</th>
                                    <th scope="col">Jam Selesai</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Rows -->
                                <tr>
                                    <td>1</td>
                                    <td><a>Contoh Film</a></td>
                                    <td><a>10:00</a></td>
                                    <td><a>12:00</a></td>
                                    <td>
                                        <div class="dropdown action-opt">
                                            <button class="btn bg p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i data-feather="more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                <li>
                                                    <a class="dropdown-item" href="/penayangan/edit/1">
                                                        <i data-feather="edit-3"></i>
                                                        Rename
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="/penayangan/delete/1">
                                                        <i data-feather="trash-2"></i>
                                                        Remove
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end bg-white" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1"
    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel"
    style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
    <div class="offcanvas-header bg-body-bg py-3 px-4 mb-4">
        <h5 class="offcanvas-title fs-18" id="offcanvasScrollingLabel">Tambah Penayangan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-4">

        <form action="/penayangan/store" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group mb-4">
                        <label class="label">Nama Film</label>
                        <div class="form-group position-relative">
                            <select name="id_film" class="form-select form-control ps-5 h-58" aria-label="Default select example">
                                <!-- Example Options -->
                                <option class="text-dark" value="1">Film A</option>
                                <option class="text-dark" value="2">Film B</option>
                            </select>

                            <i class="ri-map-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-4">
                        <label class="label">Jam Mulai</label>
                        <div class="form-group position-relative">
                            <input type="text" name="jam_mulai" id="jam_mulai" class="form-control text-dark ps-5 h-58" placeholder="Jam Mulai">
                            <i class="ri-quill-pen-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group mb-4">
                        <label class="label">Jam Selesai</label>
                        <div class="form-group position-relative">
                            <input type="text" name="jam_selesai" id="jam_selesai" class="form-control text-dark ps-5 h-58" placeholder="Jam Selesai">
                            <i class="ri-quill-pen-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="py-5">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>

    </div>
</div>

@endsection