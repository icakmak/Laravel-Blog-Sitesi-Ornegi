
    <div class="card">
        <div class="card-header bg-success text-center" style="font-weight: bold;color:#fff">
            En Çok Okunanlar
        </div>
        <div class="card-body m-0 p-0">
            <ul class="list-group list-group-flush">
                @if (isset($articleHits))
                @foreach ($articleHits as $ahit)
                <li class="list-group-item list-group-item-action">
                    <div class="row">
                        <a href="{{$ahit->slug}}" class="col-sm-10">{{Str::limit($ahit->title,20)}}</a>
                        <span class="badge bg-success float-right col-sm-2">{{$ahit->hit}}</span>
                    </div>
                </li>
                @endforeach
                @else
                <li class="list-group-item list-group-item-action">
                    <div class="row">
                        <a href="#" class="col-sm-10">Yakında Eklenecek</a>
                        <span class="badge bg-danger float-right col-sm-2">0</span>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>

