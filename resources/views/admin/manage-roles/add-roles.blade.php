@extends('layouts.admin-master')

@section('title', 'Zidni Add Roles')


@section('links')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>

@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Manage New Roles</h2>
                                        <p>This board shows you all roles and you can add more roles</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="/admin/home/add-roles">Manage New Roles</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                    
                                    <!-- HTML Markup -->
                                    <section id="html-markup" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Manage New Roles</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in">

                                                <form id="add-new-role" class="form">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-body">
                                    
                                                                    <div class="form-group">
                                                                        <label for="newRole1">Role Name</label>
                                                                        <input type="text" id="newRoleName" class="form-control" name="newRoleName">
                                                                    </div>
                                    
                                    
                                                                    <div class="form-group">
                                                                        
                                                                        <div id="addRolesTable" class="table-responsive">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Controle Pages</th>
                                                                                        <th>Read</th>
                                                                                        <th>Read/Write</th>
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody>

                                                                                        <tr>
                                                                                                <th scope="row">Manage Masters Degree</th>
                                                                                                <td>
                                            
                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                        <i class="icon fas fa-check"></i>
                                                                                                                        <label></label>   
                                                                                                                                                                                                                                 </div>
                                                                                                        </div>
                                            
                                                                                                </td>
                                                                                                <td>


                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                    <i class="icon fas fa-check"></i>
                                                                                                                    <label></label>

                                                                                                                </div>
                                                                                                        </div>
                                            
                                            
                                                                                                </td>
                                                                                            </tr>




                                                                                            <tr>
                                                                                                <th scope="row">Manage Specializations</th>
                                                                                                <td>
                                            
                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                        <i class="icon fas fa-check"></i>
                                                                                                                        <label></label>   
                                                                                                                                                                                                                                    </div>
                                                                                                        </div>
                                            
                                                                                                </td>
                                                                                                <td>


                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                    <i class="icon fas fa-check"></i>
                                                                                                                    <label></label>

                                                                                                                </div>
                                                                                                        </div>
                                            
                                            
                                                                                                </td>
                                                                                            </tr>



                                                                                            <tr>
                                                                                                <th scope="row">Manage Courses</th>
                                                                                                <td>
                                            
                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                        <i class="icon fas fa-check"></i>
                                                                                                                        <label></label>   
                                                                                                                                                                                                                                    </div>
                                                                                                        </div>
                                            
                                                                                                </td>
                                                                                                <td>


                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                    <i class="icon fas fa-check"></i>
                                                                                                                    <label></label>

                                                                                                                </div>
                                                                                                        </div>
                                            
                                            
                                                                                                </td>
                                                                                            </tr>


                                                                                            <tr>
                                                                                                <th scope="row">Manage Live sessions</th>
                                                                                                <td>
                                            
                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                        <i class="icon fas fa-check"></i>
                                                                                                                        <label></label>   
                                                                                                                                                                                                                                    </div>
                                                                                                        </div>
                                            
                                                                                                </td>
                                                                                                <td>


                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                    <i class="icon fas fa-check"></i>
                                                                                                                    <label></label>

                                                                                                                </div>
                                                                                                        </div>
                                            
                                            
                                                                                                </td>
                                                                                            </tr>


                                                                                            <tr>
                                                                                                <th scope="row">Manage Quizes</th>
                                                                                                <td>
                                            
                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                        <i class="icon fas fa-check"></i>
                                                                                                                        <label></label>   
                                                                                                                                                                                                                                    </div>
                                                                                                        </div>
                                            
                                                                                                </td>
                                                                                                <td>


                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                    <i class="icon fas fa-check"></i>
                                                                                                                    <label></label>

                                                                                                                </div>
                                                                                                        </div>
                                            
                                            
                                                                                                </td>
                                                                                            </tr>


                                                                                            <tr>
                                                                                                <th scope="row">Manage Categories</th>
                                                                                                <td>
                                            
                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                        <i class="icon fas fa-check"></i>
                                                                                                                        <label></label>   
                                                                                                                                                                                                                                    </div>
                                                                                                        </div>
                                            
                                                                                                </td>
                                                                                                <td>


                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                    <i class="icon fas fa-check"></i>
                                                                                                                    <label></label>

                                                                                                                </div>
                                                                                                        </div>
                                            
                                            
                                                                                                </td>
                                                                                            </tr>



                                                                                            
                                                                                            <tr>
                                                                                                <th scope="row">Manage Website Users</th>
                                                                                                <td>
                                            
                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                        <i class="icon fas fa-check"></i>
                                                                                                                        <label></label>   
                                                                                                                                                                                                                                    </div>
                                                                                                        </div>
                                            
                                                                                                </td>
                                                                                                <td>


                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                    <i class="icon fas fa-check"></i>
                                                                                                                    <label></label>

                                                                                                                </div>
                                                                                                        </div>
                                            
                                            
                                                                                                </td>
                                                                                            </tr>


                                                                                            <tr>
                                                                                                <th scope="row">Manage Instructors</th>
                                                                                                <td>
                                            
                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                        <i class="icon fas fa-check"></i>
                                                                                                                        <label></label>   
                                                                                                                                                                                                                                    </div>
                                                                                                        </div>
                                            
                                                                                                </td>
                                                                                                <td>


                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                    <i class="icon fas fa-check"></i>
                                                                                                                    <label></label>

                                                                                                                </div>
                                                                                                        </div>
                                            
                                            
                                                                                                </td>
                                                                                            </tr>


                                                                                            <tr>
                                                                                                <th scope="row">Manage Content</th>
                                                                                                <td>
                                            
                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                        <i class="icon fas fa-check"></i>
                                                                                                                        <label></label>   
                                                                                                                                                                                                                                    </div>
                                                                                                        </div>
                                            
                                                                                                </td>
                                                                                                <td>


                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                    <i class="icon fas fa-check"></i>
                                                                                                                    <label></label>

                                                                                                                </div>
                                                                                                        </div>
                                            
                                            
                                                                                                </td>
                                                                                            </tr>


                                                                                            <tr>
                                                                                                <th scope="row">Our Contact Inbox</th>
                                                                                                <td>
                                            
                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                        <i class="icon fas fa-check"></i>
                                                                                                                        <label></label>   
                                                                                                                                                                                                                                    </div>
                                                                                                        </div>
                                            
                                                                                                </td>
                                                                                                <td>


                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                    <i class="icon fas fa-check"></i>
                                                                                                                    <label></label>

                                                                                                                </div>
                                                                                                        </div>
                                            
                                            
                                                                                                </td>
                                                                                            </tr>




                                                                                            
                                                                                            <tr>
                                                                                                <th scope="row">Manage Other Admins</th>
                                                                                                <td>
                                            
                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                        <i class="icon fas fa-check"></i>
                                                                                                                        <label></label>   
                                                                                                                                                                                                                                    </div>
                                                                                                        </div>
                                            
                                                                                                </td>
                                                                                                <td>


                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                    <i class="icon fas fa-check"></i>
                                                                                                                    <label></label>

                                                                                                                </div>
                                                                                                        </div>
                                            
                                            
                                                                                                </td>
                                                                                            </tr>



                                                                                            <tr>
                                                                                                <th scope="row">Manage Roles</th>
                                                                                                <td>
                                            
                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                        <i class="icon fas fa-check"></i>
                                                                                                                        <label></label>   
                                                                                                                                                                                                                                    </div>
                                                                                                        </div>
                                            
                                                                                                </td>
                                                                                                <td>


                                                                                                        <div class="pretty p-icon">
                                                                                                                <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                <div class="state">

                                                                                                                    <i class="icon fas fa-check"></i>
                                                                                                                    <label></label>

                                                                                                                </div>
                                                                                                        </div>
                                            
                                            
                                                                                                </td>
                                                                                            </tr>



                                                                                            <tr>
                                                                                                    <th scope="row">Sales Report</th>
                                                                                                    <td>
                                                
                                                                                                            <div class="pretty p-icon">
                                                                                                                    <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                    <div class="state">
    
                                                                                                                            <i class="icon fas fa-check"></i>
                                                                                                                            <label></label>   
                                                                                                                                                                                                                                        </div>
                                                                                                            </div>
                                                
                                                                                                    </td>
                                                                                                    <td>
    
    
                                                                                                            <div class="pretty p-icon">
                                                                                                                    <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                    <div class="state">
    
                                                                                                                        <i class="icon fas fa-check"></i>
                                                                                                                        <label></label>
    
                                                                                                                    </div>
                                                                                                            </div>
                                                
                                                
                                                                                                    </td>
                                                                                                </tr>



                                                                                                <tr>
                                                                                                        <th scope="row">Subscribe Inbox</th>
                                                                                                        <td>
                                                    
                                                                                                                <div class="pretty p-icon">
                                                                                                                        <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                        <div class="state">
        
                                                                                                                                <i class="icon fas fa-check"></i>
                                                                                                                                <label></label>   
                                                                                                                                                                                                                                            </div>
                                                                                                                </div>
                                                    
                                                                                                        </td>
                                                                                                        <td>
        
        
                                                                                                                <div class="pretty p-icon">
                                                                                                                        <input class="newRole" type="checkbox" name="newRole" />
                                                                                                                        <div class="state">
        
                                                                                                                            <i class="icon fas fa-check"></i>
                                                                                                                            <label></label>
        
                                                                                                                        </div>
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
                                    

                                                        <div class="form-optins">
                                                                <button id="reset-roles" type="reset" class="btn trans-button">Reset</button>
                                                                <button id="done-roles" type="submit" class="btn main-button">Add Role</button>
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

<script type="text/javascript" src="{{asset('admin/js/pages/addRolesPage.js')}}"></script>

@endsection