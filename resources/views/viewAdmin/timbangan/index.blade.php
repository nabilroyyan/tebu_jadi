{{-- @extends('layout.mainLayout')

@section('content')
    <div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
        <h3 class="mb-sm-0 mb-1 fs-18">Data Table</h3>
        <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
            <li>
                <a href="index.html" class="text-decoration-none">
                    <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Data Table</span>
            </li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card bg-white border-0 rounded-10 mb-4">
                <div class="card-body p-4">
                    <h4 class="fs-18 mb-4">Data Tables</h4>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel"
                            aria-labelledby="preview-tab" tabindex="0">
                            <div class="default-table-area members-list">
                                <div class="table-responsive">
                                    <table class="table align-middle" id="myTable">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-primary">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label ms-2"
                                                            for="flexCheckDefault">Name</label>
                                                    </div>
                                                </th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Project</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check pe-2">
                                                            <input class="form-check-input" type="checkbox" value
                                                                id="flexCheckDefault2">
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 lh-1">
                                                                <img src="assets/images/user-1.jpg"
                                                                    class="wh-44 rounded-circle" alt="user">
                                                            </div>
                                                            <div class="flex-grow-1 ms-10">
                                                                <h4 class="fw-semibold fs-16 mb-0">Evangelina Mcclain</h4>
                                                                <span class="text-gray-light">@jstevenson5c</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a
                                                        href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#402a2f3224212e3334253625002621322f2c6e232f2d"><span
                                                            class="__cf_email__"
                                                            data-cfemail="7e14110c1a1f100d0a1b081b3e181f0c1112501d1113">[email&#160;protected]</span></a>
                                                </td>
                                                <td>
                                                    <span>Agent</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="bg-success bg-opacity-10 text-success fs-13 fw-semibold py-1 px-2 rounded-1">Active</span>
                                                </td>
                                                <td>
                                                    <span>165</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown action-opt">
                                                        <button class="btn bg p-0" type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i data-feather="more-horizontal"></i>
                                                        </button>
                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="share-2"></i>
                                                                    Share
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="link-2"></i>
                                                                    Get Sharable Link
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="edit-3"></i>
                                                                    Rename
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="download"></i>
                                                                    Download
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="trash-2"></i>
                                                                    Remove
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check pe-2">
                                                            <input class="form-check-input" type="checkbox" value
                                                                id="flexCheckDefault3">
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 lh-1">
                                                                <img src="assets/images/user-2.jpg"
                                                                    class="wh-44 rounded-circle" alt="user">
                                                            </div>
                                                            <div class="flex-grow-1 ms-10">
                                                                <h4 class="fw-semibold fs-16 mb-0">Candice Munoz</h4>
                                                                <span class="text-gray-light">@candicemunoz</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a
                                                        href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#a3c0c2cdc7cac0c6ced6cdccd9e3c5c2d1cccf8dc0ccce"><span
                                                            class="__cf_email__"
                                                            data-cfemail="7e1d1f101a171d1b130b1011043e181f0c1112501d1113">[email&#160;protected]</span></a>
                                                </td>
                                                <td>
                                                    <span>Administrator</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="bg-success bg-opacity-10 text-success fs-13 fw-semibold py-1 px-2 rounded-1">Active</span>
                                                </td>
                                                <td>
                                                    <span>99</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown action-opt">
                                                        <button class="btn bg p-0" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i data-feather="more-horizontal"></i>
                                                        </button>
                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="share-2"></i>
                                                                    Share
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="link-2"></i>
                                                                    Get Sharable Link
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="edit-3"></i>
                                                                    Rename
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="download"></i>
                                                                    Download
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="trash-2"></i>
                                                                    Remove
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check pe-2">
                                                            <input class="form-check-input" type="checkbox" value
                                                                id="flexCheckDefault4">
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 lh-1">
                                                                <img src="assets/images/user-3.jpg"
                                                                    class="wh-44 rounded-circle" alt="user">
                                                            </div>
                                                            <div class="flex-grow-1 ms-10">
                                                                <h4 class="fw-semibold fs-16 mb-0">Bernard Langley</h4>
                                                                <span class="text-gray-light">@bernardlangley</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a
                                                        href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#67050215090615030b0609000b021e27010615080b4904080a"><span
                                                            class="__cf_email__"
                                                            data-cfemail="e88a8d9a86899a8c8489868f848d91a88e899a8784c68b8785">[email&#160;protected]</span></a>
                                                </td>
                                                <td>
                                                    <span>Contributor</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="bg-success bg-opacity-10 text-success fs-13 fw-semibold py-1 px-2 rounded-1">Active</span>
                                                </td>
                                                <td>
                                                    <span>24</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown action-opt">
                                                        <button class="btn bg p-0" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i data-feather="more-horizontal"></i>
                                                        </button>
                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="share-2"></i>
                                                                    Share
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="link-2"></i>
                                                                    Get Sharable Link
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="edit-3"></i>
                                                                    Rename
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="download"></i>
                                                                    Download
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="trash-2"></i>
                                                                    Remove
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check pe-2">
                                                            <input class="form-check-input" type="checkbox" value
                                                                id="flexCheckDefault5">
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 lh-1">
                                                                <img src="assets/images/user-4.jpg"
                                                                    class="wh-44 rounded-circle" alt="user">
                                                            </div>
                                                            <div class="flex-grow-1 ms-10">
                                                                <h4 class="fw-semibold fs-16 mb-0">Kristie Hall</h4>
                                                                <span class="text-gray-light">@kristiehall</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a
                                                        href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#711a03180205181419101d1d311710031e1d5f121e1c"><span
                                                            class="__cf_email__"
                                                            data-cfemail="ff948d968c8b969a979e9393bf999e8d9093d19c9092">[email&#160;protected]</span></a>
                                                </td>
                                                <td>
                                                    <span>Agent</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="bg-success bg-opacity-10 text-success fs-13 fw-semibold py-1 px-2 rounded-1">Active</span>
                                                </td>
                                                <td>
                                                    <span>50</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown action-opt">
                                                        <button class="btn bg p-0" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i data-feather="more-horizontal"></i>
                                                        </button>
                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="share-2"></i>
                                                                    Share
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="link-2"></i>
                                                                    Get Sharable Link
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="edit-3"></i>
                                                                    Rename
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="download"></i>
                                                                    Download
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="trash-2"></i>
                                                                    Remove
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check pe-2">
                                                            <input class="form-check-input" type="checkbox" value
                                                                id="flexCheckDefault6">
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 lh-1">
                                                                <img src="assets/images/user-5.jpg"
                                                                    class="wh-44 rounded-circle" alt="user">
                                                            </div>
                                                            <div class="flex-grow-1 ms-10">
                                                                <h4 class="fw-semibold fs-16 mb-0">Bolton Obrien</h4>
                                                                <span class="text-gray-light">@boltonobrien</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a
                                                        href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#e5878a89918a8b8a87978c808ba58384978a89cb868a88"><span
                                                            class="__cf_email__"
                                                            data-cfemail="82e0edeef6edecede0f0ebe7ecc2e4e3f0edeeace1edef">[email&#160;protected]</span></a>
                                                </td>
                                                <td>
                                                    <span>Contributor</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="bg-success bg-opacity-10 text-success fs-13 fw-semibold py-1 px-2 rounded-1">Active</span>
                                                </td>
                                                <td>
                                                    <span>34</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown action-opt">
                                                        <button class="btn bg p-0" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i data-feather="more-horizontal"></i>
                                                        </button>
                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="share-2"></i>
                                                                    Share
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="link-2"></i>
                                                                    Get Sharable Link
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="edit-3"></i>
                                                                    Rename
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="download"></i>
                                                                    Download
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="trash-2"></i>
                                                                    Remove
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check pe-2">
                                                            <input class="form-check-input" type="checkbox" value
                                                                id="flexCheckDefault7">
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 lh-1">
                                                                <img src="assets/images/user-6.jpg"
                                                                    class="wh-44 rounded-circle" alt="user">
                                                            </div>
                                                            <div class="flex-grow-1 ms-10">
                                                                <h4 class="fw-semibold fs-16 mb-0">Dee Alvarado</h4>
                                                                <span class="text-gray-light">@deealvarado</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a
                                                        href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#1f7b7a7a7e73697e6d7e7b705f797e6d7073317c7072"><span
                                                            class="__cf_email__"
                                                            data-cfemail="76121313171a00170417121936101704191a5815191b">[email&#160;protected]</span></a>
                                                </td>
                                                <td>
                                                    <span>Administrator</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="bg-success bg-opacity-10 text-success fs-13 fw-semibold py-1 px-2 rounded-1">Active</span>
                                                </td>
                                                <td>
                                                    <span>99</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown action-opt">
                                                        <button class="btn bg p-0" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i data-feather="more-horizontal"></i>
                                                        </button>
                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="share-2"></i>
                                                                    Share
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="link-2"></i>
                                                                    Get Sharable Link
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="edit-3"></i>
                                                                    Rename
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="download"></i>
                                                                    Download
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="trash-2"></i>
                                                                    Remove
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check pe-2">
                                                            <input class="form-check-input" type="checkbox" value
                                                                id="flexCheckDefault8">
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 lh-1">
                                                                <img src="assets/images/user-7.jpg"
                                                                    class="wh-44 rounded-circle" alt="user">
                                                            </div>
                                                            <div class="flex-grow-1 ms-10">
                                                                <h4 class="fw-semibold fs-16 mb-0">Cervantes Kramer</h4>
                                                                <span class="text-gray-light">@cervanteskramer</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a
                                                        href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#7516100703141b0110061e0714181007351314071a195b161a18"><span
                                                            class="__cf_email__"
                                                            data-cfemail="086b6d7a7e69667c6d7b637a69656d7a486e697a6764266b6765">[email&#160;protected]</span></a>
                                                </td>
                                                <td>
                                                    <span>Agent</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="bg-success bg-opacity-10 text-success fs-13 fw-semibold py-1 px-2 rounded-1">Active</span>
                                                </td>
                                                <td>
                                                    <span>24</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown action-opt">
                                                        <button class="btn bg p-0" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i data-feather="more-horizontal"></i>
                                                        </button>
                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="share-2"></i>
                                                                    Share
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="link-2"></i>
                                                                    Get Sharable Link
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="edit-3"></i>
                                                                    Rename
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="download"></i>
                                                                    Download
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="trash-2"></i>
                                                                    Remove
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check pe-2">
                                                            <input class="form-check-input" type="checkbox" value
                                                                id="flexCheckDefault9">
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 lh-1">
                                                                <img src="assets/images/user-8.jpg"
                                                                    class="wh-44 rounded-circle" alt="user">
                                                            </div>
                                                            <div class="flex-grow-1 ms-10">
                                                                <h4 class="fw-semibold fs-16 mb-0">Dejesus Michael</h4>
                                                                <span class="text-gray-light">@dejesusmichael</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a
                                                        href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#6400010e01171117090d070c050108240205160b084a070b09"><span
                                                            class="__cf_email__"
                                                            data-cfemail="83e7e6e9e6f0f6f0eeeae0ebe2e6efc3e5e2f1ecefade0ecee">[email&#160;protected]</span></a>
                                                </td>
                                                <td>
                                                    <span>Agent</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="bg-danger bg-opacity-10 text-danger fs-13 fw-semibold py-1 px-2 rounded-1">Deactive</span>
                                                </td>
                                                <td>
                                                    <span>50</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown action-opt">
                                                        <button class="btn bg p-0" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i data-feather="more-horizontal"></i>
                                                        </button>
                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="share-2"></i>
                                                                    Share
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="link-2"></i>
                                                                    Get Sharable Link
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="edit-3"></i>
                                                                    Rename
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="download"></i>
                                                                    Download
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="trash-2"></i>
                                                                    Remove
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check pe-2">
                                                            <input class="form-check-input" type="checkbox" value
                                                                id="flexCheckDefault10">
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 lh-1">
                                                                <img src="assets/images/user-9.jpg"
                                                                    class="wh-44 rounded-circle" alt="user">
                                                            </div>
                                                            <div class="flex-grow-1 ms-10">
                                                                <h4 class="fw-semibold fs-16 mb-0">Alissa Nelson</h4>
                                                                <span class="text-gray-light">@alissanelson</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a
                                                        href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#187974716b6b79767d746b7776587e796a7774367b7775"><span
                                                            class="__cf_email__"
                                                            data-cfemail="4524292c3636242b2029362a2b052324372a296b262a28">[email&#160;protected]</span></a>
                                                </td>
                                                <td>
                                                    <span>Contributor</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="bg-danger bg-opacity-10 text-danger fs-13 fw-semibold py-1 px-2 rounded-1">Deactive</span>
                                                </td>
                                                <td>
                                                    <span>34</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown action-opt">
                                                        <button class="btn bg p-0" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i data-feather="more-horizontal"></i>
                                                        </button>
                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="share-2"></i>
                                                                    Share
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="link-2"></i>
                                                                    Get Sharable Link
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="edit-3"></i>
                                                                    Rename
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="download"></i>
                                                                    Download
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="trash-2"></i>
                                                                    Remove
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check pe-2">
                                                            <input class="form-check-input" type="checkbox" value
                                                                id="flexCheckDefault10">
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 lh-1">
                                                                <img src="assets/images/user-34.jpg"
                                                                    class="wh-44 rounded-circle" alt="user">
                                                            </div>
                                                            <div class="flex-grow-1 ms-10">
                                                                <h4 class="fw-semibold fs-16 mb-0">Anne Nelson</h4>
                                                                <span class="text-gray-light">@annenelson</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a
                                                        href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#0564696c7676646b6069766a6b456364776a692b666a68"><span
                                                            class="__cf_email__"
                                                            data-cfemail="dabbb6b3a9a9bbb4bfb6a9b5b49abcbba8b5b6f4b9b5b7">[email&#160;protected]</span></a>
                                                </td>
                                                <td>
                                                    <span>Agent</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="bg-danger bg-opacity-10 text-danger fs-13 fw-semibold py-1 px-2 rounded-1">Deactive</span>
                                                </td>
                                                <td>
                                                    <span>34</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown action-opt">
                                                        <button class="btn bg p-0" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i data-feather="more-horizontal"></i>
                                                        </button>
                                                        <ul
                                                            class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="share-2"></i>
                                                                    Share
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="link-2"></i>
                                                                    Get Sharable Link
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="edit-3"></i>
                                                                    Rename
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
                                                                    <i data-feather="download"></i>
                                                                    Download
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:;">
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
                        <div class="tab-pane fade" id="code-tab-pane" role="tabpanel" aria-labelledby="code-tab"
                            tabindex="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@extends('layout.mainLayout')

@section('content')
    <form action="/timbangan-store" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">No SPA</label>
                    <div class="form-group position-relative">
                        <input type="text" name="no_spa" class="form-control text-dark ps-5 h-58" placeholder="Masukkan No SPA">
                        <i class="ri-file-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Tanggal</label>
                    <div class="form-group position-relative">
                        <input type="date" name="tanggal" class="form-control text-dark ps-5 h-58">
                        <i class="ri-calendar-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Nomor Kontrak</label>
                    <div class="form-group position-relative">
                        <select name="nomer_kontrak" class="form-select form-control text-dark ps-5 h-58">
                            <option value="" selected disabled>Pilih Nomor Kontrak</option>
                            @foreach ($kebuns as $kebun)
                                <option value="{{ $kebun->nomer_kontrak }}">{{ $kebun->nomer_kontrak }} - {{ $kebun->nama_kebun }}</option>
                            @endforeach
                        </select>
                        <i class="ri-contract-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>
            

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Nama Kebun</label>
                    <div class="form-group position-relative">
                        <input type="text" name="nama_kebun" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Nama Kebun">
                        <i class="ri-landscape-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Nama Petani</label>
                    <div class="form-group position-relative">
                        <input type="text" name="nama_petani" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Nama Petani">
                        <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Nopol</label>
                    <div class="form-group position-relative">
                        <input type="text" name="nopol" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Nomor Polisi">
                        <i class="ri-car-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Sopir</label>
                    <div class="form-group position-relative">
                        <input type="text" name="sopir" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Nama Sopir">
                        <i class="ri-user-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Status Timbang</label>
                    <div class="form-group position-relative">
                        <select name="status_timbang" class="form-select form-control text-dark ps-5 h-58">
                            <option value="" selected disabled>Pilih Status</option>
                            <option value="proses">Proses</option>
                            <option value="selesai_ditimbang">Selesai Ditimbang</option>
                        </select>
                        <i class="ri-checkbox-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Bruto (Kg)</label>
                    <div class="form-group position-relative">
                        <input type="number" name="bruto" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Bruto">
                        <i class="ri-scale-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Tara (Kg)</label>
                    <div class="form-group position-relative">
                        <input type="number" name="tara" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Tara">
                        <i class="ri-scale-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Neto (Kg)</label>
                    <div class="form-group position-relative">
                        <input type="number" name="neto" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Neto">
                        <i class="ri-scale-3-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Jenis Tebu</label>
                    <div class="form-group position-relative">
                        <input type="text" name="jenis_tebu" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Jenis Tebu">
                        <i class="ri-leaf-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Brix (%)</label>
                    <div class="form-group position-relative">
                        <input type="text" name="brix" class="form-control text-dark ps-5 h-58" placeholder="Masukkan Brix">
                        <i class="ri-line-chart-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Tanggal Masuk Pos</label>
                    <div class="form-group position-relative">
                        <input type="date" name="tgl_masuk_pos" class="form-control text-dark ps-5 h-58">
                        <i class="ri-time-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <!-- Tgl Timbang Masuk -->
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Tanggal Timbang Masuk</label>
                    <div class="form-group position-relative">
                        <input type="date" name="tgl_timb_masuk" class="form-control text-dark ps-5 h-58">
                        <i class="ri-time-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>

            <!-- Tgl Timbang Keluar -->
            <div class="col-lg-6">
                <div class="form-group mb-4">
                    <label class="label">Tanggal Timbang Keluar</label>
                    <div class="form-group position-relative">
                        <input type="date" name="tgl_timb_keluar" class="form-control text-dark ps-5 h-58">
                        <i class="ri-time-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                    </div>
                </div>
            </div>


        </div>

        <button type="button" class="btn btn-secondary fw-semibold text-white py-3 px-4 mt-2 w-30" onclick="window.location.href='/timbangan'">Back</button>
        <button type="submit" class="btn btn-primary fw-semibold text-white py-3 px-4 mt-2 w-30">Save</button>
    </form>
@endsection
