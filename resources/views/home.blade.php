@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><span id="text">{{\Session::get('homeText')}}</span>
                        <button type="button"  data-toggle="modal" data-target="#home-text"
                                data-title="" class="btn btn-info header-edit-js">Edit
                        </button>
                    </div>


                </div>
            </div>
        </div>
        <div class="modal fade" id="home-text" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Home Text</label>
                            <input type="text" class="form-control" id="homeleInputText" value="{{\Session::get('homeText')}}" placeholder="Enter Text">
                        </div>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" role="button">
                            Close
                        </button>

                        <button type="button" id="saveText" class="btn btn-success " data-action="save"
                                data-dismiss="modal" role="button">Save
                        </button>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
