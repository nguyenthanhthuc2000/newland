@extends('admin.layouts.master_layout')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6">
        </div>
        <div class="masonry-item col-md-12">
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Thông tin website</h6>
                <div class="mT-30">
                    <form>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-2">
                                <label class="form-label" for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-500">Birthdate</label>
                                <div class="timepicker-input input-icon mb-3">
                                    <div class="input-group">
                                        <div class="input-group-text bgc-white bd bdwR-0">
                                            <i class="ti-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control bdc-grey-200 start-date" placeholder="Datepicker" data-provide="datepicker">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                <input type="checkbox" id="inputCall2" name="inputCheckboxesCall" class="peer">
                                <label for="inputCall2" class="form-label peers peer-greed js-sb ai-c">
                                    <span class="peer peer-greed">Call John for Dinner</span>
                                </label>
                            </div>
                        </div>
                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary btn-color btn__border">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
