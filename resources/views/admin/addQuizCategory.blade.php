@extends('main')
@section('content')
    <div class="main">
        <div class="grid wide">
            @include('alert')
            <form action="/admin/add-quizcategory" method="POST" enctype="multipart/form-data" class="add_quizz">
                @csrf
                <div class="list">
                    <div class="name">Add Quiz Category</div>
                    <div class="topic">
                        <div class="content-wrap">
                            <select id="topic" name="topic" required>
                                <option value="">Choose Topic</option>
                                @foreach ($listTopic as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                            <select id="category" name="category" required>
                                <option value="">Choose Category</option>
                            </select>
                            <input type="text" name="quizCategoryName" placeholder="Quiz Category title" required>
                            <textarea name="description" cols="30" rows="9" placeholder="Description" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="submit_quizz add false">Add</button>
            </form>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $('#topic').change(function() {
            var idTopic = $(this).val();
            $.ajax({
                type: "GET",
                datatype: "JSON",
                url: '/admin/getcategory/' + idTopic,
                success: function(result) {
                    var html = '';
                    for (let i = 0; i < result.length; i++) {
                        html += `<option value="${result[i]['id']}">${result[i]['name']}</option>`;
                    }
                    $('#category').html(html);
                },
            });
        })
    </script>
@endsection
