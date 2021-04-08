<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-poll"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Abet<sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Admin -->
    @if(Auth::user()->isAdmin())
        @component('components.admin_sidebar')
        @endcomponent
    @endif

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Nav::isRoute('home') }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Forms') }}</span>
        </a>
    </li>

    @if(count(Auth::user()->getNotStartedReports())>0)
        <div class="sidebar-heading">
            No Started
        </div>
    @endif
    <!-- Nav Item - Pages Collapse Menu -->
    @foreach(Auth::user()->getNotStartedReports() as $report)
            <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#NTR{{$report->id}}" aria-expanded="true" aria-controls="NTR{{$report->id}}">
              <i class="fas fa-clipboard"></i>
              <span>{{$report->Course()->name}}</span>
            </a>
            <div id="NTR{{$report->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                @foreach($report->Course()->getCategoryStart() as $category)
                    <a class="collapse-item" href="/report/{{$report->id}}">Indicator: {{$category->name}}</a>
                @endforeach
              </div>
            </div>
            </li>
    @endforeach
    <!-- Nav Item - Utilities Collapse Menu -->


    @if(count(Auth::user()->getStartedReports())>0)
        <hr class="sidebar-divider d-none d-md-block">
        <div class="sidebar-heading">
            In Progress
        </div>
    @endif

        <!-- Nav Item - Pages Collapse Menu -->
    @foreach(Auth::user()->getStartedReports() as $report)
            <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#IN{{$report->id}}" aria-expanded="true" aria-controls="IN{{$report->id}}">
              <i class="fas fa-clipboard"></i>
              <span>{{$report->course()->name}}</span>
            </a>
            <div id="IN{{$report->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                @foreach($report->Course()->getCategoryProgress() as $category)
                    <a class="collapse-item" href="/reportprogress/{{$report->id}}">Indicator: {{$category->name}}</a>
                @endforeach
              </div>
            </div>
            </li>
    @endforeach

    @if(count(Auth::user()->getFinishReports())>0)
        <hr class="sidebar-divider d-none d-md-block">
        <div class="sidebar-heading">
            Finished
        </div>
    @endif

    @foreach(Auth::user()->getFinishReports() as $report)
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#D{{$report->id}}" aria-expanded="true" aria-controls="D{{$report->id}}">
          <i class="fas fa-clipboard"></i>
          <span>{{$report->course()->name}}</span>
        </a>
        <div id="D{{$report->id}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            @foreach($report->Course()->getCategoryDone() as $category)
                <h6 class="collapse-header">Indicator: {{$category->name}}</h6>
                <a class="collapse-item" href="/finishprogress/{{$report->id}}">Indicator: {{$category->name}}</a>
            @endforeach
          </div>
        </div>
        </li>
    @endforeach

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
