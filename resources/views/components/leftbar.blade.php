<div class="col-lg-4 mb-4">

    <!-- Illustrations -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Indicators</h6>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @foreach(Auth::user()->getCategory() as $category)
                    <li class="list-group-item">
                        {{$category->name}}. {{$category->description}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
