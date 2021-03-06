
        <div class="card">
            <div class="card-header bg-info text-center" style="font-weight: bold;color:#fff">
                Kategoriler
            </div>
            <div class="card-body m-0 p-0">
                <ul class="list-group list-group-flush">
                    @if (isset($categories))
                        @foreach ($categories as $category)
                        <li class="list-group-item list-group-item-action @if(Request::segment(2)==$category->slug) active text-light @endif">
                            <div class="row">
                                <a href="{{route('category',$category->slug)}}" class="col-sm-10">{{$category->name}}</a>
                                <span class="badge bg-info float-right col-sm-2">{{$category->articleCount()}}</span>
                            </div>
                        </li>
                        @endforeach
                    @else
                        <li class="list-group-item list-group-item-action">
                            <div class="row">
                                <a href="#" class="col-sm-10">Eklenecek</a>
                                <span class="badge bg-info float-right col-sm-2">0</span>
                            </div>
                        </li>
                    
                    @endif
                    
                </ul>
            </div>
        </div>
