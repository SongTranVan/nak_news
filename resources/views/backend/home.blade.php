@extends('layout.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <div class="row banner">
        <div class="col-md-12">
            <div class="list-group">
                <div class="list-group-item mb-3">
                    <div class="row-action-primary">
                    </div>
                    <div class="row-content">
                        <h4 class="list-group-item-heading">Manage User</h4>
                        <a href="/admin/users" class="btn btn-success btn-raised">
                            All Users</a>
                    </div>
                </div>
                <div class="list-group-separator"></div>
                <div class="list-group-item mb-3">
                    <div class="row-action-primary">
                    </div>
                    <div class="row-content">
                        <h4 class="list-group-item-heading">Manage Roles</h4>
                        <a href="/admin/roles" class="btn btn-success btn-raised">
                            All Roles</a>
                        <a href="/admin/roles/create" class="btn btn-primary btn-raised">Create A Role</a>
                    </div>
                </div>
                <div class="list-group-separator"></div>
                <div class="list-group-item mb-3">
                    <div class="row-action-primary">
                    </div>
                    <div class="row-content">
                        <h4 class="list-group-item-heading">Manage Posts</h4>
                        <a href="/admin/posts" class="btn btn-success btn-raised">
                            All Posts</a>
                        <a href="/admin/posts/create" class="btn btn-primary btn-raised">Create A Post</a>
                    </div>
                </div>
                <div class="list-group-separator"></div>
                <div class="list-group-item mb-3">
                    <div class="row-action-primary">
                    </div>
                    <div class="row-content">
                        <h4 class="list-group-item-heading">Manage Categories</h4>
                        <a href="{{ route('all_categories') }}" class="btn btn-success btn-raised">
                            All Categories</a>
                        <a href="{{ route('new_category') }}" class="btn btn-primary btn-raised">Create A Category</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection