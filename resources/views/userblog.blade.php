@include('header')
<div class="container">
    <a href="/addblog" class="btn btn-success float-end">Add</button></a>
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
                        <a class="btn btn-info" href="{{url('/editblog/'.$data->id)}}">Edit</a>
                        <button class="btn btn-danger delete-blog" rel="{{$data->id}}" >Delete</button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    </div>
</div>
@include('footer')