@extends('frontend.layouts.master')
@section('home.content')
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h6 class="title"><b>Vaccine Registration Form</b></h6>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Full Name</label>
                                    <input class="input--style-4" type="text" name="name" />
                                    @error('name')
                                    <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NID</label>
                                    <input class="input--style-4" type="text" name="nid" />
                                    @error('nid')
                                    <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" />
                                    @error('email')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone" />
                                    @error('phone')
                                    <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Select vaccine center</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="center">
                                    <option disabled="disabled" selected="selected">
                                        Choose option
                                    </option>
                                    @foreach ($centers as $center)
                                        <option value="{{ $center->id }}">{{ $center->name }}</option>
                                    @endforeach
                                </select>
                                @error('center')
                                <small style="color: red;">{{ $message }}</small>
                                @enderror
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
