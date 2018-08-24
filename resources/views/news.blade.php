@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="news-title">
                                            <h2>{{$news->description}}</h2>
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
                                        <hr>
                                        <div class="news-image">
                                            <img src="/news/images/{{$news->image}}">
                                        </div>
                                        <div class="news-content">
                                            <p>{{$news->info}}</p>
                                        </div>

                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
