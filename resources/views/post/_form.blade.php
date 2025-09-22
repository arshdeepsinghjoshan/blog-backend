<style>
    .ck-editor__editable_inline {
        min-height: 400px;
        max-height: 600px;
        /* optional */
    }
</style>
<form action="{{ route(empty($model->exists) ? 'post.add' : 'post.update', $model->id) }}" method="post" id="post-update" enctype="multipart/form-data">
    @csrf
    <div class="row align-items-starts">

        <div class="col-xl-6 col-lg-4 col-md-6 col-12">
            <div class="mb-3 required">
                <label class="pt-2 fw-bold" for="btncheck1"> Category </label>
                <select name="category_id" class="validate form-control" id="category_id">
                    @foreach($model->getCategoryOption() as $category)
                    <option value="{{$category->id}}" {{$category->id == $model->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach

                </select>
            </div>
            @error("category_id")
            <p style="color:red;">{{ $errors->first("category_id")}}</p>
            @enderror
        </div>
        <div class="col-xl-6 col-lg-4 col-md-6 col-12">
            <div class="mb-3 required">
                <label class="pt-2 fw-bold" for="btncheck1"> Title </label>
                <input type="text" class="form-control d-block" name="title" value="{{ old('title', $model->title) }}">
            </div>
            @error("Title")
            <p style="color:red;">{{ $errors->first("title")}}</p>
            @enderror
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-4">
            <div class="mb-6">
                <label for="message">Bill Images</label>
                <div class="input-group">
                    <input type="file" class="form-control ticket_images" name="images[]" multiple onchange="previewImages(event)">
                </div>
            </div>
            @error("image")
            <p style="color:red;">{{ $errors->first("image")}}</p>
            @enderror
        </div>


        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="mb-3 required">
                <label class="pt-2 fw-bold" for="content">Content</label>
                <textarea class="form-control" id="content" name="content">{{ old('content', $model->content) }}</textarea>

            </div>
            @error("content")
            <p style="color:red;">{{ $errors->first("content") }}</p>
            @enderror
        </div>

        <!-- Include CKEditor 5 CDN -->
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#content'))
                .catch(error => {
                    console.error(error);
                });
        </script>




        <input type="hidden" name="id" id="id" value="{{ $model->id }}" required />






        <div class="preview-images"></div>
        <div class="col-lg-12">
            <div class="d-flex align-items-center justify-content-end">
                <div class="downoad-btns text-end my-4">
                    <button class="btn btn-primary text-white ms-2">@empty($model->exists) {{ __('Add') }} @else {{ __('Update') }} @endempty</button>

                </div>
            </div>
        </div>
    </div>
</form>