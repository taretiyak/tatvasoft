@include('header')
<div class="container">
    <div class="row">
    @if(isset($blog) && count($blog))
        @foreach($blog as $data)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('blog/'.$data->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{  $data->title }}</h5>
                        <p class="card-text">{{  $data->description }}.</p>
                        <p class="card-text">
                        @php
                        $tag=explode('@.',$data->tags);
                        @endphp
                        @foreach($tag as $tags)
                        <span class="tags">#{{$tags}}</span>
                        @endforeach
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    </div>
</div>
@include('footer')