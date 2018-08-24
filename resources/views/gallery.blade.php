@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center" style="height: 200px;position: relative">
            <div class="text-center thumb">
                <img style="width: 150px;height: 150px;position: absolute;
    top: 0;
    left: 45%;" id="image_upload_preview" class="img-thumbnail" height="150" width="100"
                     src="http://placehold.it/100x100"
                     alt="your image">
            </div>
            <form method="post" id="form-edit-post" style="position: absolute;bottom: 0;left: 45%">
                <input style="display: none" accept="image/*" type="file" name="img" id="inputFile">
                <label class="btn-success btn " style="margin: 0" for="inputFile"> upload img</label>

                <button type="submit" class="btn-primary btn" value="save">save</button>
            </form>
        </div>
        <div class="row" id="img_block_js">
            @if(count($galleriesArr)>0)
                @foreach($galleriesArr as $gallery)
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a class="thumbnail" href="#" data-image-id="{{$gallery->id}}" data-toggle="modal" data-title=""
                           data-image="images/{{$gallery->image}}"
                           data-target="#image-gallery">
                            <img class="img-thumbnail" height="250" width="200"
                                 src="/images/{{$gallery->image}}"
                                 alt="Another alt text">
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection





