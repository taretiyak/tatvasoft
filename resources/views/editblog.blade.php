@include('header')
<div class="container">
    @php
    if(!isset($blog->id)){
        echo"blog not found";
        die;
    }
    @endphp
    @if(session()->has('error'))
        <div class="alert alert-danger">
        <strong>{{ session('error')}}</strong>
        </div>
    @endif
    @if(count($errors->all()))
        @foreach($errors->all() as $message)
        <div class="alert alert-danger">
        <strong>{{ $message }}</strong>
        </div>
        @endforeach
    @endif
    <form class="row g-3 m-auto w-50" method="post" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control" id="title" placeholder="enter title" name="title" max="255" value="{{$blog->title}}" onkeyup="maxalert(this)">
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea class="form-control" id="description" name="description" rows="3" max="65535" onkeyup="maxalert(this)">{{$blog->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            @if(!empty($blog->image))
            <img src="{{ url('blog/'.$blog->image)}}" class="card-img-top w-25" alt="...">
            @endif
            <div class="mb-3">
                <label for="tags" class="form-label">tags</label>
                <input type="text" class="form-control" id="tags" placeholder="enter tags">
                <input type="hidden" id="hidden_tags" name="tags" value="{{$blog->tags}}">
            </div>
            <div class="mb-3" id="preview-tags">
                @php
                $tag=explode('@.',$blog->tags);
                @endphp
                @foreach($tag as $tags)
                <div class="input-group flex-nowrap">
                    <div class="tags">
                    {{$tags}}<span class="delete-tags" rel="{{$tags}}">X</span>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </div>
    </form>
</div>
@include('footer')