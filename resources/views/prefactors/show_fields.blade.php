<div class="row">
    <!-- Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('id', __('Id').':') !!}
        <p>{!! $prefactor->id !!}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_id', __('User Id').':') !!}
        <p>{!! $prefactor->user->title !!}</p>
    </div>

    <!-- Order Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('order_id', __('Order Id').':') !!}
        <p>{!! $prefactor->order->title !!}</p>
    </div>

    <!-- Factory Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('factory_id', __('Factory Id').':') !!}
        <p>{!! $prefactor->factory->title !!}</p>
    </div>

    <!-- Media Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('media_id', __('Media Id').':') !!}
        <p>{!! $prefactor->media->title !!}</p>
    </div>

    <!-- Media Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('media', __('Media').':') !!}
        <button  class='btn btn-ghost-success' data-toggle="modal" data-target="#myModal-image"><img src="{{asset($prefactor->media->url)}}" alt="{{$prefactor->media->alt}}" width="100px" height="110px" >
        <i class="fa fa-eye"></i></button>
        <!-- The Modal -->
        <div class="modal" id="myModal-image">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('Media')</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body text-center">
                        <img src="{{asset($prefactor->media->url)}}" alt="{{$prefactor->media->alt}}" width="400px" height="300px" >
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', __('Created At').':') !!}
        <p>{!! jdate($prefactor->created_at) !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', __('Updated At').':') !!}
        <p>{!! jdate($prefactor->updated_at) !!}</p>
    </div>


</div>