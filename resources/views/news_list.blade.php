@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>List of News Section</h4>
                <div class="row">
                    <div class="upload">
                        <h3>NEWS CREATE</h3>
                        <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                              action="{{ url('/news/create') }}">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea type="text" class="form-control" placeholder="news" name="news" min="1"
                                              max="20"></textarea>
                                </div>
                                @if ($errors->has('news'))
                                    <span style="margin-left: 15px;color: red">{{$errors->first('news')}}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Description" name="description"
                                           min="1" max="255">
                                </div>
                                @if ($errors->has('description'))

                                    <span style="margin-left: 15px;color: red">{{$errors->first('description')}}</span>
                                @endif
                            </div>

                            <div class="form-group">

                                <div class="col-md-12">
                                    <input style="display: none" accept="image/*" type="file" name="image" id="img">
                                    <label class="btn-success btn " style="margin: 0" for="img"> upload
                                        image</label>

                                    <button type="submit" class="btn btn-primary pull-right">
                                        Create
                                    </button>
                                </div>
                                @if ($errors->has('image'))
                                    <span style="margin-left: 15px;color: red">{{$errors->first('image')}}</span>
                                @endif
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            @if(count($newsArr)>0)
                @foreach($newsArr as $news)
                    <div class="col-md-9 news-block-js">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="card bg-warning">
                                    <button type="button" class="close" ><span aria-hidden="true"  data-id="{{$news->id}}" class="remove">×</span></button>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="/news/images/{{$news->image}}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="news-title">
                                                    <a href="#"><h5>{{$news->description}}</h5></a>
                                                </div>
                                                <div class="news-cats">
                                                    <ul class="list-unstyled list-inline mb-1">

                                                        <li class="list-inline-item">
                                                            <i class="fa fa-folder-o text-danger"></i>
                                                            <a href="#">
                                                                <small>Author</small>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-folder-o text-danger"></i>
                                                            <a href="#">
                                                                <small>4th July 2018</small>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="news-content">
                                                    <p style="   height: 165px;overflow: auto;">{{$news->info}} </p>
                                                </div>
                                                <div class="news-buttons">
                                                    <a href="{{route('getNews',['id'=>$news->id])}}"
                                                       class="btn btn-outline-danger btn-sm">Read
                                                        More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>
                @endforeach
            @endif

        </div>
    </div>




@endsection
