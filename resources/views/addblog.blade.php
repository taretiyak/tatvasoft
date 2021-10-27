@include('header')
<div class="container">
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
                <input type="text" class="form-control" id="title" placeholder="enter title" name="title" onkeyup="maxalert(this)" max="255">
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea class="form-control" id="description" name="description" rows="3" max="65535" onkeyup="maxalert(this)" ></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">tags</label>
                <input type="text" class="form-control" id="tags" placeholder="enter tags">
                <input type="hidden" id="hidden_tags" name="tags">
            </div>
            <div class="mb-3" id="preview-tags">
                
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </div>
    </form>
</div>
@include('footer')