<!-- Begin SideBar-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

      <li class="nav-item active"><a href="{{route('admin.dashboard')}}"><i class="la la-mouse-pointer"></i><span
            class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية</span></a>
      </li>

      <li class="nav-item "><a href=""><i class="la la-flag"></i>
          <span class="menu-title" data-i18n="nav.dash.main">لغات الموقع </span>
          <span class="badge badge badge-info badge-pill float-right mr-2">{{App\Models\Language::count()}}</span>
        </a>
        <ul class="menu-content">
          <li><a class="menu-item" href="{{route('admin.languages')}}" data-i18n="nav.dash.ecommerce">عرض الكل</a>
          </li>
          <li><a class="menu-item" href="{{route('admin.languages.create')}}" data-i18n="nav.dash.crypto">اضافة لغة
              جديدة</a>
          </li>
        </ul>
      </li>


      <li class="nav-item open"><a href=""><i class="la la-list"></i>
          <span class="menu-title" data-i18n="nav.dash.main">الأقسام الرئيسية </span>
          <span
            class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\MainCategory::where('translation_lang', getDefaultLang())->count()}}</span>
        </a>
        <ul class="menu-content">
          <li><a class="menu-item" href="{{route('admin.maincategories')}}" data-i18n="nav.dash.ecommerce">
              عرض الكل </a>
          </li>
          <li><a class="menu-item" href="{{route('admin.maincategories.create')}}" data-i18n="nav.dash.crypto">إضافة قسم
              رئيسي</a>
          </li>
        </ul>
      </li>

      <li class="nav-item"><a href=""><i class="la la-male"></i>
          <span class="menu-title" data-i18n="nav.dash.main">المدربين </span>
          <span class="badge badge badge-success badge-pill float-right mr-2"></span>
        </a>
        <ul class="menu-content">
          <li><a class="menu-item" href="" data-i18n="nav.dash.ecommerce">
              عرض الكل </a>
          </li>
          <li><a class="menu-item" href="" data-i18n="nav.dash.crypto">أضافة
              مدرب </a>
          </li>
        </ul>
      </li>


      <li class="nav-item"><a href=""><i class="la la-male"></i>
          <span class="menu-title" data-i18n="nav.dash.main">الطلاب </span>
          <span class="badge badge badge-warning  badge-pill float-right mr-2"></span>
        </a>
        <ul class="menu-content">
          <li><a class="menu-item" href="" data-i18n="nav.dash.ecommerce">
              عرض الكل </a>
          </li>
          <li><a class="menu-item" href="" data-i18n="nav.dash.crypto">أضافة
              طالب </a>
          </li>
        </ul>
      </li>


      <li class="nav-item">
        <a href=""><i class="la la-male"></i>
          <span class="menu-title" data-i18n="nav.dash.main">تذاكر المراسلات </span>
          <span class="badge badge badge-danger  badge-pill float-right mr-2">0</span>
        </a>
        <ul class="menu-content">
          <li><a class="menu-item" href="" data-i18n="nav.dash.ecommerce">
              تذاكر الطلاب </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>

<!--End Sidebare-->