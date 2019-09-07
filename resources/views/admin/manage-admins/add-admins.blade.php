@extends('layouts.admin-master')

@section('title', 'Zidni Add Admins')


@section('links')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>

@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Manage New Admins</h2>
                                        <p>This board shows you all other admin and you can add more admin</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="/admin/home/add-admins">Manage New Admins</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                    
                                    <!-- HTML Markup -->
                                    <section id="html-markup" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Manage New Admins</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in">

                    
                                                <form id="addAdminsForm">



                                                        <div class="form-group">
                                                          <label for="adminsFullName">Full Name</label>
                                                          <input type="text" class="form-control" id="adminsFullName" name="adminsFullName" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="adminsEmail">Email</label>
                                                          <input type="text" class="form-control" id="adminsEmail" name="adminsEmail" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="adminsPassword">Create Password</label>
                                                            <span id="newAdminShowPassword">Show password</span>
                                                            <input type="password" class="form-control" id="adminsPassword" name="adminsPassword" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="adminsRetypePassword">Retype Password</label>
                                                            <input type="password" class="form-control" id="adminsRetypePassword" name="adminsRetypePassword" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="adminsRoles">Role Name</label>
                                                            <input type="text" class="form-control" id="adminsRoles" name="adminsRoles" placeholder="">
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
                            






                                                        <div class="form-submit">

                                                                <button type="submit" class="btn btn-primary btn-lg btn-block">Add Admin</button>
                                            
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


<script type="text/javascript" src="{{asset('admin/js/pages/addAdminsPage.js')}}"></script>


@endsection