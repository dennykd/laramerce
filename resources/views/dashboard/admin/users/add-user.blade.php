@extends('layouts.dashboard-layout')
@section('head')
<style>
    .upload__box {
        margin-top: 9px
    }

    .upload__inputfile {
        width: .1px;
        height: .1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .upload__btn {
        display: inline-block;
        font-weight: 600;
        color: #fff;
        text-align: center;
        min-width: 116px;
        padding: 5px;
        transition: all .3s ease;
        cursor: pointer;
        border: 2px solid;
        border-radius: 10px;
        line-height: 26px;
        font-size: 14px;
    }

    .upload__btn-box {
        margin-bottom: 10px;
    }

    .upload__img-wrap {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .upload__img-box {
        width: 200px;
        padding: 0 10px;
        margin-bottom: 12px;
    }

    .upload__img-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;
    }

    .upload__img-close:after {
        content: '\2716';
        font-size: 14px;
        color: white;
    }

    .img-bg {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        padding-bottom: 100%;
    }
</style>
@endsection
@section('dashboard-content')
<!-- BEGIN: Content -->
<div class="content">
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add New User
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('manage_user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="intro-y box p-5">
                    <div>
                        <label for="name" class="form-label">Name</label>
                        @error('name')
                        <small class="text-xs text-red-500 ml-1">{{'*'.$message }}</small>
                        @enderror
                        <input id="name" name="name" type="text" class="form-control w-full" placeholder="Input Name">
                    </div>
                    <div class="mt-3">
                        <label for="phone" class="form-label mt-2">Phone</label>
                        <input id="phone" name="phone" type="text" class="form-control w-full" placeholder="Input Phone">
                    </div>
                    <div class="mt-3">
                        <label for="email" class="form-label mt-2">Email</label>
                        <input id="email" name="email" type="text" class="form-control w-full" placeholder="Input Email">
                    </div>
                    <div class="mt-3">
                        <label for="address" class="form-label mt-2">Address</label>
                        <input id="address" name="address" type="text" class="form-control w-full" placeholder="Input Address">
                    </div>
                </div>
                <div class="text-right mt-5">
                    <a href="{{ route('manage_user.all') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <button type="submit" class="btn btn-primary shadow-md w-24 mr-1">Save</button>
                </div>
        </div>
        </form>
        <!-- END: Form Layout -->
    </div>
</div>
</div>
<!-- END: Content -->
@endsection
@section('script')
<script src=""></script>
@endsection