@extends('layouts.admin-master')

@section('title', 'Zidni Manage Forum')


@section('links')



@endsection



@section('content')



    <!-- START MAIN CONTENT -->


    <div class="app-content content container-fluid">
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                        <h2 class="content-header-title">Manage Forum Categories</h2>
                        <p>This board give you easy way to manage the forum categories</p>
                    </div>
                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                        <div class="breadcrumb-wrapper col-xs-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/university/home">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="/admin/university/forum">Manage Forum Categories</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-body">
    
                    <!-- HTML Markup -->
                    <section id="html-markup-1" class="card">
                        <div class="card-header">
                            <h4 class="card-title">Manage Forum Categories</h4>
                        </div>
                        <form class="card-body collapse-in university-form-style">
                            {{ csrf_field() }}
                            <div class="container">
                                <div id="add_forum" role="tablist" aria-multiselectable="true">
                                    <div class="card" data-year="1">
                                        <div class="card-header" role="tab" id="add_forum-category">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-parent="#add_forum" href="#year_1"
                                                        aria-expanded="false" aria-controls="year_1">
                                                <div class="icon-week-status">
                                                        <i class="fas fa-plus"></i>
                                                        <i class="fas fa-minus"></i>
                                                </div>
                                                <span>Add Category</span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="year_1" class="collapse show" role="tabpanel"
                                            aria-labelledby="add_forum-category">
                                            <div class="card-block">
                                                <div class="form-group">
                                                    <label>Category Name</label>
                                                    <input type="text" name="category_name" class="add_forum_category_name" placeholder="Name" required>
                                                </div>
                                                <div class="form-submit">
                                                    <button type="submit" class="btn btn-secondary btn-lg btn-block">Add Category</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-body collapse in" id="allForumCategoriesTableContainer">

                                <table id="allForumCategoriesTable" class="table hover" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Category Name</th>
                                                <th># Threads</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < 4; $i++)
                                            <tr id="{{$i}}">
                                                <td class="icon"></td>
                                                <td>
                                                    <input type="text" name="categoryName[]" class="forum_category_name" value="Category Name">
                                                </td>
                                                <td>{{$i}}</td>
                                                <td class="options-container">

                                                    <a id="{{$i}}" class="delete-instructors hide-options"><span><i class="far fa-trash-alt"></i></span></a>
                                                
                                                </td>

                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>


                        </div>
                    </section>
                    <!--/ HTML Markup -->



                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->
    
    
        <!-- END MAIN CONTENT -->


@endsection




@section('scripts')

<script type="text/javascript" src="{{asset('admin/js/pages-university/forum/forum-categories.js')}}"></script>

@endsection