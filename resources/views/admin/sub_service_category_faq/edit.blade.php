@extends("admin.layouts.admin")

@section("title", "Edit FAQ")

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit FAQ</h3>
            </div>

            <form method="POST" action="{{ route('admin.faqs.update', $faq->id) }}">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="form-group">
                        <label for="sub_service_category_id">Sub Service Category</label>
                        <select name="sub_service_category_id" class="form-control" required>
                            @foreach($subServiceCategories as $category)
                                <option value="{{ $category->id }}" {{ $faq->sub_service_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="answer">Answer</label>
                        <textarea name="answer" class="form-control" rows="4" required>{{ old('answer', $faq->answer) }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection