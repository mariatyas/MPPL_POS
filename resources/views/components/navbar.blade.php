<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bolder ms-2">RegamTech</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      
      <!-- Forms & Tables -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
      <!-- Forms -->
      <li class="menu-item {{ Request::is('transaction') ? 'active' : '' }}">
        <a href="{{ route('transaction') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="Form Elements">Transaction</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('product') ? 'active' : '' }}">
        <a href="{{ route('product') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="Form Elements">Product</div>
        </a>
      </li>
      {{-- <li class="menu-item {{ Request::is('stocks') ? 'active' : '' }}">
        <a href="{{ route('stocks') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Form Elements">Stock</div>
        </a>
      </li> --}}
      <li class="menu-item {{ Request::is('categories') ? 'active' : '' }}">
        <a href="{{ route('categories.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-copy"></i>
          <div data-i18n="Form Elements">Categories</div>
        </a>
      </li>
      <li class="menu-item {{ Request::is('report') ? 'active' : '' }}">
        <a href="{{ route('report') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-file"></i>
          <div data-i18n="Form Elements">Reporting</div>
        </a>
      </li>
      {{-- <!-- Tables -->
      <li class="menu-item">
        <a href="tables-basic.html" class="menu-link">
          <i class="menu-icon tf-icons bx bx-table"></i>
          <div data-i18n="Tables">Tables</div>
        </a>
      </li> --}}
    </ul>
  </aside>