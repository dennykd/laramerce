@extends('layouts.dashboard-layout')
@section('dashboard-content')
<!-- BEGIN: Content -->
<div class="content">
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Update {{$branch->name}}
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('manage_branch.patch',['branch'=>$branch]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="intro-y box p-5">
                    <div>
                        <label for="name" class="form-label">Branch Nama</label>
                        @error('name')
                        <small class="text-xs text-red-500 ml-1">{{'*'.$message }}</small>
                        @enderror
                        <input type="text" name="name" id="branch_name" class="form-control" placeholder="Input Branch Name" value="{{ $branch->name ?? old('name') }}">
                    </div>
                    <div class="mt-3">
                        <label for="description" class="form-label">Description</label>
                        @error('description')
                        <small class="text-xs text-red-500 ml-1">{{'*'.$message }}</small>
                        @enderror
                        <textarea id="description" name="description" class="form-control w-full" placeholder="Input Branch Description">{{ $branch->description ?? old('description')}}</textarea>
                    </div>
                    <div class="text-right mt-5">
                        <a class="btn btn-outline-secondary w-24 mr-1" href="{{ route('manage_branch.all') }}">Cancel</a>
                        <input type="submit" value="Save" class="btn btn-outline-primary shadow-md w-24 mr-1">
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
</div>
<!-- END: Content -->
@endsection