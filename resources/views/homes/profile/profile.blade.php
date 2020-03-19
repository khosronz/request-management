<div class="row clearfix">
    @include('flash::message')
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="m-b-20">
                <div class="contact-grid">
                    <div class="profile-header bg-dark">
                        <div class="user-name">{!! \Illuminate\Support\Facades\Auth::user()->name !!}</div>
                        <div class="name-center">{!! \Illuminate\Support\Facades\Auth::user()->fname !!} {!! \Illuminate\Support\Facades\Auth::user()->lname !!}</div>

                    </div>
                    <img src="{{asset('images/Userpic/profile.png')}}" class="user-img" alt="">
                    <p>
                    <div class="name-center"> {!! \Illuminate\Support\Facades\Auth::user()->email !!}</div>
                    </p>
                    <div>
                                    <span class="phone">
                                        <i class="material-icons">phone</i>{!! \Illuminate\Support\Facades\Auth::user()->phone !!}</span>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h5>{!! jdate(\Illuminate\Support\Facades\Auth::user()->created_at) !!}</h5>
                            <small>@lang('Membership history')</small>
                        </div>
                        <div class="col-4">
                            <h5>{!! \Illuminate\Support\Facades\Auth::user()->country !!}</h5>
                            <small>@lang('Country')</small>
                        </div>
                        <div class="col-4">
                            <h5>{!! jdate(\Illuminate\Support\Facades\Auth::user()->update_at) !!}</h5>
                            <small>@lang('Date Update date')</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="profile-tab-box">
                <div class="p-l-20">
                    <ul class="nav ">
                        <li class="nav-item tab-all">
                            <a class="nav-link active show" href="#project" data-toggle="tab">@lang('About me')</a>
                        </li>
                        <li class="nav-item tab-all p-l-20">
                            <a class="nav-link" href="#usersettings" data-toggle="tab">@lang('Setting')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card project_widget">
                            <div class="header">
                                <h2>@lang('About me')</h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-3 col-6 b-r">
                                        <strong>@lang('name_family')</strong>
                                        <br>
                                        <p class="text-muted">{!! \Illuminate\Support\Facades\Auth::user()->fname !!} {!! \Illuminate\Support\Facades\Auth::user()->lname !!}</p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                        <strong>@lang('phone mobile')</strong>
                                        <br>
                                        <p class="text-muted">{!! \Illuminate\Support\Facades\Auth::user()->phone !!}</p>
                                    </div>
                                    <div class="col-md-3 col-6 b-r">
                                        <strong>@lang('Email')</strong>
                                        <br>
                                        <p class="text-muted">{!! \Illuminate\Support\Facades\Auth::user()->email !!}</p>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <strong>@lang('Country')</strong>
                                        <br>
                                        <p class="text-muted">{!! \Illuminate\Support\Facades\Auth::user()->country !!}</p>
                                    </div>
                                </div>
                                <strong>@lang('Biography'):</strong>
                                <p class="m-t-30">{!! \Illuminate\Support\Facades\Auth::user()->desc !!}</p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="timeline" aria-expanded="false">
            </div>
            <div role="tabpanel" class="tab-pane" id="usersettings" aria-expanded="false">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>@lang('Settings')</strong> @lang('security')
                        </h2>
                    </div>
                    <div class="body">
                        @php
                            $user=\Illuminate\Support\Facades\Auth::user();
                        @endphp
                        {!! Form::model($user, ['route' => ['users.updatePassword', $user->id], 'method' => 'patch']) !!}
                            <div class="form-group">
                                <input name="name" type="text" value="{{$user->name}}" class="form-control" placeholder="نام کاربری" disabled/>
                            </div>
                            <div class="form-group">
                                <input name="password" type="password" class="form-control" placeholder="رمزعبور جدید"/>
                            </div>
                            <div class="form-group">
                                <input name="password_confirmation" type="password" class="form-control" placeholder="تکرار رمز عبور جدید"/>
                            </div>
                            <button type="submit" class="btn btn-primary btn-round">@lang('Save')</button>

                        {!! Form::close() !!}

                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>@lang('Settings')</strong> @lang('Account')</h2>
                    </div>
                    <div class="body">
                        @php
                            $user=\Illuminate\Support\Facades\Auth::user();
                        @endphp
                        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fname" placeholder="{{__('Fname')}}" value="{{\Illuminate\Support\Facades\Auth::user()->fname}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="lname" placeholder="{{__('Lname')}}" value="{{\Illuminate\Support\Facades\Auth::user()->lname}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="city" placeholder="{{__('City')}}" value="{{\Illuminate\Support\Facades\Auth::user()->city}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="{{__('Email')}}" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="country" placeholder="{{__('Country')}}" value="{{\Illuminate\Support\Facades\Auth::user()->country}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize" name="address1" placeholder="{{__('Address 1')}}">{{\Illuminate\Support\Facades\Auth::user()->address1}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize" name="address2" placeholder="{{__('Address 2')}}">{{\Illuminate\Support\Facades\Auth::user()->address2}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-check m-l-10">
                                            <label class="form-check-label">
                                                <input class="form-check-input" value="1" type="checkbox" id="checkbox" {{\Illuminate\Support\Facades\Auth::user()->visible_to_everyone=='1'?'checked':''}}
                                                       name="visible_to_everyone"> @lang('Visible to everyone')
                                                <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-round" type="submit">@lang('Save')</button>
                                </div>
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

