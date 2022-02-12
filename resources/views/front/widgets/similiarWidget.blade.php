<span class="fw-bolder border-bottom">Benzer Yazılar</span>
<div class="row mb-2 mt-2 text-center" style="font-size: 0.8rem">
    @foreach ($similiars as $sim)
    <div class="col-sm-4">
        <a href="{{route('single',[$sim->getCategory->slug, $sim->slug])}}">
            <div class="row">
                <div class="col-sm-4">
                    <img src="{{$sim->image}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                </div>
                <div class="col-sm-8">
                    <div class="fw-bold">{{Str::limit($sim->title,30)}}</div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
