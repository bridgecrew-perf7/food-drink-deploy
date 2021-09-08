<div class="sb-sidenav-menu">
    <div class="nav">
        <div class="sb-sidenav-menu-heading">{{ __('custom.home_page') }}</div>
        <a class="nav-link collapsed" href="{{route('admin')}}">
            <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
            {{ __('custom.home_page') }}
            <div class="sb-sidenav-collapse-arrow"></div>
        </a>
        <div class="sb-sidenav-menu-heading">{{ __('custom.manager') }}</div>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="false"
            aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
            {{ __('custom.user') }}
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('user.index')}}">{{ __('custom.list_users') }}</a>
            </nav>
        </div>
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseCategories"
            aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
            {{ __('custom.Category') }}
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseCategories" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('category.index')}}">{{ __('custom.Category list') }}</a>
                <a class="nav-link" href="{{route('category.create')}}">{{ __('custom.Add category') }}</a>
            </nav>
        </div>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
            aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fa fa-cubes"></i></div>
            {{ __('custom.product') }}
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseProducts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('product.index')}}">{{ __('custom.list_products') }}</a>
                <a class="nav-link" href="{{route('product.create')}}">{{ __('custom.add_product') }}</a>
            </nav>
        </div>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTags"
            aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fa fa-tags"></i></div>
            {{ __('custom.Manager_tag') }}
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseTags" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('tag.index')}}">{{ __('custom.List_tag') }}</a>
                <a class="nav-link" href="{{route('tag.create')}}">{{ __('custom.Add_tag') }}</a>
            </nav>
        </div>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
            aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart"></i></div>
            {{ __('custom.List Order') }}
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseOrders" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('order.index')}}">{{ __('custom.List Order') }}</a>
            </nav>
        </div>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStatistic"
            aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
            {{ __('custom.Statistic') }}
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseStatistic" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('statistic_product')}}">{{ __('custom.Statistic Product') }}</a>
            </nav>
        </div>
        <div class="collapse" id="collapseStatistic" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('statistic_tag')}}">{{ __('custom.Statistic Tag') }}</a>
            </nav>
        </div>
    </div>
</div>
<div class="sb-sidenav-footer">
    <div class="small">{{ __('custom.logged_in_as') }}:</div>
    <span>{{Auth::user()->name}}</span> {{-- DATA DEMO --}}
</div>