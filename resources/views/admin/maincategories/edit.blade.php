@extends('admin.includes.index')

@section('content')

<div class="content-header row">
  <div class="content-header-left col-md-6 col-12 mb-2">
    <div class="row breadcrumbs-top">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a>
          </li>
          <li class="breadcrumb-item"><a href="{{route('admin.maincategories')}}"> الاقسام الرئيسية </a>
          </li>
          <li class="breadcrumb-item active">تعديل القسم | {{$mainCategory->name}}
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
              <form class="form" action="{{route('admin.maincategories.store')}}" method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="form-body">
                  <h4 class="form-section"><i class="ft-home"></i> تعديل القسم | {{$mainCategory->name}}</h4>

                  <div class="form-group">
                    <div class="text-center">
                      <img src="{{$mainCategory->photo}}" alt="{{$mainCategory->name}}"
                        class="reouded-circle height-150">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>صورة القسم</label>
                        <input type="file" id="photo" class="form-control" name="photo">
                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label> اسم القسم الرئيسي | باللغة {{__('messages.'.$mainCategory->translation_lang)}}</label>
                        <input type="text" id="name" class="form-control" name="category[0][name]"
                          value="{{$mainCategory->name}}">
                        <input type="hidden" id="translation_lang" class="form-control"
                          name="category[0][translation_lang]" value="{{$mainCategory->translation_lang}}"
                          {{old('translation_lang')}}>
                        @error("category.0.name")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group mt-2">
                        <input type="checkbox" name="category[0][active]" id="switcheryColor4" class="switchery"
                          data-color="success" value="1" @if ($mainCategory->active == 1) checked @endif />
                        <label for="switcheryColor4" class="card-title ml-1">حالة القسم الرئيسي | للغة
                          {{__('messages.'.$mainCategory->translation_lang)}}</label>
                        @error("category.0.active")
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