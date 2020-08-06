@extends('admin.includes.index')

@section('content')

<div class="content-header row">
  <div class="content-header-left col-md-6 col-12 mb-2">
    <div class="row breadcrumbs-top">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a>
          </li>
          <li class="breadcrumb-item"><a href="{{route('admin.languages')}}"> اللغات </a>
          </li>
          <li class="breadcrumb-item active">إضافة لغة
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content-body">
  <!-- Basic form layout section start -->
  <section id="basic-form-layouts">
    <div class="row match-height">
      <div class="col-md-12">
        <div class="card">
          @include('admin.includes.alerts.success')
          @include('admin.includes.alerts.errors')
          <div class="card-content collapse show">
            <div class="card-body">
              <form class="form" action="{{route('admin.languages.update', $language->id)}}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-body">
                  <h4 class="form-section"><i class="ft-home"></i> تعديل اللغة | {{$language->name}} </h4>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label> اسم اللغة </label>
                        <input type="text" value="{{$language->name}}" id="name" class="form-control"
                          placeholder="ادخل اسم اللغة  " name="name">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label> اختصار اللغة </label>
                        <input type="text" value="{{$language->abbr}}" id="abbr" class="form-control"
                          placeholder="ادخل اختصار اللغة  " name="abbr">
                        @error('abbr')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label> اتجاه اللغة </label>
                        <select name="direction" class="select2 form-control">
                          <optgroup label="من فضلك أختر اتجاه اللغة ">
                            <option value="rtl" @if ($language->direction == 'rtl') selected
                              @endif>من اليمين الي اليسار
                            </option>
                            <option value="ltr" @if ($language->direction == 'ltr') selected
                              @endif>من اليسار الي اليمين
                            </option>
                          </optgroup>
                        </select>
                        @error('direction')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group mt-2">
                        <input type="checkbox" name="active" id="switcheryColor4" class="switchery" data-color="success"
                          value="1" @if ($language->active == 1) checked
                        @endif/>
                        <label for="switcheryColor4" class="card-title ml-1">حالة اللغة </label>
                        @error('active')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>


                <div class="form-actions">
                  <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                    <i class="ft-x"></i> تراجع
                  </button>
                  <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> تحديث
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- // Basic form layout section end -->
</div>

@endsection