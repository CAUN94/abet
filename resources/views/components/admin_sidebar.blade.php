<li class="nav-item {{ Nav::isRoute('home') }}">
	<a class="nav-link" href="{{ route('home') }}">
	    <i class="fas fa-fw fa-desktop"></i>
	    <span>{{ __('Admin') }}</span>
	</a>
	<li class="nav-item">
	    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Line" aria-expanded="true" aria-controls="Line">
	      <i class="fas fa-clipboard"></i>
	      <span>Line</span>
	    </a>
	    <div id="Line" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	      <div class="bg-white py-2 collapse-inner rounded">
			<a class="collapse-item" href="#">Line</a>
	      </div>
	    </div>
     </li>

    <!-- Nav Item - Pages Collapse Menu -->
{{--     @foreach(Auth::user())
            <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#NTR{{}}" aria-expanded="true" aria-controls="NTR{{}}">
              <i class="fas fa-clipboard"></i>
              <span>{{}}</span>
            </a>
            <div id="NTR{{}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                @foreach()
                    <a class="collapse-item" href="#"></a>
                @endforeach
              </div>
            </div>
            </li>
    @endforeach --}}
</li>