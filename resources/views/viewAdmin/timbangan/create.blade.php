@extends('layout.mainLayout')



@section('content')
    

<form>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group mb-4">
                <label class="label">First Name</label>
                <div class="form-group position-relative">
                    <input type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter Name">
                    <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group mb-4">
                <label class="label">Last Name</label>
                <div class="form-group position-relative">
                    <input type="text" class="form-control text-dark ps-5 h-58" placeholder="Enter Name">
                    <i class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group mb-4">
                <label class="label">Email Address</label>
                <div class="form-group position-relative">
                    <input type="email" class="form-control text-dark ps-5 h-58" placeholder="Enter Email Address">
                    <i class="ri-mail-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group mb-4">
                <label class="label">Phone</label>
                <div class="form-group position-relative">
                    <input type="number" class="form-control text-dark ps-5 h-58" placeholder="Enter Phone Number">
                    <i class="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-4">
                <label class="label">Address</label>
                <div class="form-group position-relative">
                    <input type="number" class="form-control text-dark ps-5 h-58" placeholder="Your Location">
                    <i class="ri-map-pin-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-4">
                <label class="label">Country</label>
                <div class="form-group position-relative">
                    <select class="form-select form-control ps-5 h-58" aria-label="Default select example">
                        <option selected class="text-dark">United Kingdom</option>
                        <option value="1" class="text-dark">United States</option>
                        <option value="2" class="text-dark">Canada</option>
                        <option value="3" class="text-dark">France</option>
                    </select>
                    <i class="ri-map-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group mb-4">
                <label class="label">Town/City</label>
                <div class="form-group position-relative">
                    <select class="form-select form-control ps-5 h-58" aria-label="Default select example">
                        <option selected class="text-dark">California</option>
                        <option value="1" class="text-dark">United States</option>
                        <option value="2" class="text-dark">Canada</option>
                        <option value="3" class="text-dark">France</option>
                    </select>
                    <i class="ri-list-ordered position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group mb-4">
                <label class="label">State</label>
                <div class="form-group position-relative">
                    <select class="form-select form-control ps-5 h-58" aria-label="Default select example">
                        <option selected class="text-dark">South poal evenue state 4C</option>
                        <option value="1" class="text-dark">United States</option>
                        <option value="2" class="text-dark">Canada</option>
                        <option value="3" class="text-dark">France</option>
                    </select>
                    <i class="ri-font-size position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group mb-4">
                <label class="label">Zip Code</label>
                <div class="form-group position-relative">
                    <input type="number" class="form-control ps-5 text-gray-light h-58" placeholder="Enter number">
                    <i class="ri-hashtag position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-0">
                <label class="label">Order Notes :</label>
                <div class="form-group position-relative">
                    <textarea class="form-control ps-5 text-dark" placeholder="Some demo text ... " cols="30" rows="5"></textarea>
                    <i class="ri-information-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20 pt-2"></i>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection