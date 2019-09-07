@extends('layouts.admin-master')

@section('title', 'Zidni Inbox')


@section('links')



@endsection



@section('content')



                    <!-- START MAIN CONTENT -->
                
                
                    <div class="app-content content container-fluid">
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                        <h2 class="content-header-title">Our Contact inbox</h2>
                                        <p>This board show you all Message coming from Contact us page</p>
                                    </div>
                                    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                                        <div class="breadcrumb-wrapper col-xs-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
                                                <li class="breadcrumb-item active"><a href="/admin/inbox">Contact inbox</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                    
                    
                                    <!-- HTML Markup -->
                                    <section id="html-markup" class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Contact inbox</h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="fas fa-minus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body collapse in" id="inboxTableContainer">


                                            <table id="inboxTable" class="table hover" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Full Name</th>
                                                        <th>Email</th>
                                                        <th>Message</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(count($allContacts) > 0)
                                                    @foreach($allContacts as $allContact)
                                                    <tr id="{{$allContact->id}}">
                                                        <td class="icon inboxTable-checkbox"></td>
                                                        <td>{{$allContact->name}}</td>
                                                        <td>{{$allContact->email}}</td>
                                                        <td class="inboxTable-message">
                                                            
                                                            <div class="message-container">

                                                                <a class="message-content" data-toggle="modal" data-target="#inboxMessageModal">

                                                                        {{$allContact->message}}
                                                            

                                                                </a>
                                                            
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                
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



                        <!-- Modal -->
<div class="modal fade" id="inboxMessageModal" tabindex="-1" role="dialog" aria-labelledby="inboxMessageModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="message-content-modal"></p>
            </div>
          </div>
        </div>
</div>




@endsection




@section('scripts')

<script type="text/javascript" src="{{asset('admin/js/pages/inboxPage.js')}}"></script>

@endsection