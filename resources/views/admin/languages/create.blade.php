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
              <form class="form" action="{{route('admin.languages.store')}}" method="POST"
                enctype="multipart/form-data">
                <div class="form-body">
                  <h4 class="form-section"><i class="ft-home"></i> إضافة لغة جديدة </h4>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput1"> اسم اللغة </label>
                        <input type="text" value="" id="name" class="form-control" placeholder="ادخل اسم اللغة  "
                          name="name">
                        <span class="text-danger"> </span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput1"> اسم اللغة </label>
                        <input type="text" value="" id="name" class="form-control" placeholder="ادخل اسم اللغة  "
                          name="name">
                        <span class="text-danger"> </span>
                      </div>
                    </div>
                  </div>


                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput1"> الاختصار </label>
                        <input type="text" value="" id="name" class="form-control" placeholder="ادخل اختصار اللغة     "
                          name="name">
                        <span class="text-danger"> </span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput1"> الاختصار </label>
                        <input type="text" value="" id="name" class="form-control" placeholder="ادخل اختصار اللغة     "
                          name="name">
                        <span class="text-danger"> </span>
                      </div>
                    </div>

                  </div>


                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="projectinput2"> الاتجاة </label>
                        <select name="academy_id" class="select2 form-control">
                          <optgroup label="من فضلك أختر اتجاه اللغة ">
                            <option value="rtl">من اليمين الي اليسار</option>
                            <option value="rtl">من اليسار الي اليمين</option>
                          </optgroup>
                        </select>
                        <span class="text-danger"> </span>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mt-1">
                        <input type="checkbox" name="status" id="switcheryColor4" class="switchery" data-color="success"
                          checked />
                        <label for="switcheryColor4" class="card-title ml-1">الحالة </label>
                      </div>
                    </div>
                  </div>
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