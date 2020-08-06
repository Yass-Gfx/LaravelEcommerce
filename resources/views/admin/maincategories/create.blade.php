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
          <li class="breadcrumb-item active">إضافة قسم رئيسي
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
                  <h4 class="form-section"><i class="ft-home"></i> بيانات القسم</h4>

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

                  @if(getLanguages()->count() > 0)
                  @foreach (getLanguages() as $index => $lang)

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label> اسم القسم الرئيسي | باللغة {{__('messages.'.$lang->abbr)}}</label>
                        <input type="text" id="name" class="form-control" name="category[{{$index}}][name]">
                        <input type="hidden" id="abbr" class="form-control" name="category[{{$index}}][abbr]"
                          value="{{$lang->abbr}}" {{old('name')}}>
                        @error("category.$index.name")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group mt-2">
                        <input type="checkbox" name="category[{{$index}}][active]" id="switcheryColor4"
                          class="switchery" data-color="success" value="1" checked />
                        <label for="switcheryColor4" class="card-title ml-1">حالة القسم الرئيسي | للغة
                          {{__('messages.'.$lang->abbr)}}</label>
                        @error("category.$index.active")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  @endforeach
                  @endif


                </div>


                <div class="form-actions">
                  <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                    <i class="ft-x"></i> تراجع
                  </button>
                  <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> حفظ
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