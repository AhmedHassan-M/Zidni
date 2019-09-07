@extends('layouts.admin-master')

@section('title', 'Zidni Add Categories')


@section('links')



@endsection



@section('content')



    <!-- START MAIN CONTENT -->


    <div class="app-content content container-fluid">
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                        <h2 class="content-header-title">Manage New Categories</h2>
                        <p>This board give you easy way to add Categories</p>
                    </div>
                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                        <div class="breadcrumb-wrapper col-xs-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="/admin/home/add-categories">Add New Category</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-body">
    
    
                    <!-- HTML Markup -->
                    <section id="html-markup" class="card">
                        <div class="card-header">
                            <h4 class="card-title">Manage New Category</h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">


    
                                <form id="addCategoryForm" method="POST">
                                    {{csrf_field()}}



                                        <div class="form-group">
                                          <label for="adminsCategory">Category name</label>
                                          <input type="text" class="form-control" id="adminsCategory" name="adminsCategory" placeholder="">
                                        </div>


                                      <!--   <div class="form-group">
                                                <label for="adminsSubCategory">Sub-Category Name</label>
                                                <input type="text" class="form-control" id="adminsSubCategory" name="adminsSubCategory" placeholder="">
                                        </div> -->
                                        
                                        <div class="form-submit">

                                                <button type="submit" class="btn btn-primary btn-lg btn-block">Add Category</button>
                            
                                                <div class="ajax-loading loader loader--style2" title="1">
                                                  <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                                    <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                                                      <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"
                                                      />
                                                    </path>
                                                  </svg>
                                                </div>
                            
                            
                                        </div>



                                </form>




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

<script type="text/javascript" src="{{asset('admin/js/pages/addCategoriesPage.js')}}"></script>

@endsection