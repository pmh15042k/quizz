@extends('main')
@section('content')
    <div class="main">
        <div class="grid wide">
            <div class="add_question mt-0">
                @include('breadcumb')
                <br>
                @include('alert')
                <div class="d-flex justify-content-between">
                    <div class="text_head mb-5">{{ $listItem->name }}</div>
                    <button data-toggle="modal" data-target="#addCategory" type="button" class="custom-btn btn-15"> <i
                            class="fa-solid fa-plus"></i> Create quiz
                    </button>
                </div>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Question</th>
                            <th scope="col">Action</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 0;
                        @endphp
                        @foreach ($listItem->quizCategory as $value)
                            @php
                                $num++;
                            @endphp
                            <tr>
                                <th scope="row">{{ $num }}</th>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->description }}</td>
                                <td>{{ count($value->question) }}</td>
                                <td>
                                    <a data-name="{{ $value->name }}" data-id={{ $value->id }}
                                        href="#modalDetailTestQuiz" id="buttonDetailTestQuiz" class="mr-3">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a data-id={{ $value->id }} href="#editCategory" class="button-edit mr-3"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="/admin/quizcategory/{{ $value->id }}/delete"
                                        onclick="confirm('Are you sure?')"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                                <td>
                                    <a href="/admin/add-question/{{ $value->id }}" class="button2 b-green rot-135"> <i
                                            class="fa-solid fa-plus"></i> Add question</a>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal add -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header"
                    style="font-size: 25px;font-weight:700; background-color:#121212;color:#FFFFFF  ">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Quiz Category {{ $listItem->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" style="background: #e0e5ec;">
                    <form action="/admin/add-quizcategory" method="POST" enctype="multipart/form-data"
                        class="add_quizz mb-0 mt-0">
                        @csrf
                        <div class="list mb-3">
                            <div class="topic">
                                <div class="content-wrap mr-0">
                                    <input type="hidden" id="category" name="category" value="{{ $listItem->id }}"
                                        class="bg-transparent">
                                    <input type="text" name="quizCategoryName" placeholder="Quiz Category title"
                                        class="bg-transparent" required>
                                    <textarea class="bg-transparent" name="description" cols="30" rows="9" placeholder="Description" required></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="custom-btn btn-3"><span>Submit Create</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal add -->
    <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header"
                    style="font-size: 25px;font-weight:700; background-color:#121212;color:#FFFFFF  ">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Quiz Category {{ $listItem->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" style="background: #e0e5ec;">
                    <form action="/admin/update-quizcategory" method="POST" enctype="multipart/form-data"
                        class="add_quizz mb-0 mt-0">
                        @csrf
                        @method('put')
                        <div class="list mb-3">
                            <div class="topic">
                                <div class="content-wrap mr-0">
                                    <input type="hidden" id="setId" name="id" class="bg-transparent">
                                    <input type="text" name="quizCategoryName" id="setCategoryName"
                                        placeholder="Quiz Category title" class="bg-transparent" required>
                                    <textarea class="bg-transparent" name="description" id="setDescription" cols="30" rows="9" placeholder="Description"
                                        required></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="custom-btn btn-3"><span>Submit Create</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Show Detail Test Quiz -->
    <div class="modal fade" id="modalDetailTestQuiz" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title titleModalDetailTestQuiz" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="question-item">
                        <div class="question-title">Lorem ipsum dolor sit amet.?</div>
                        <ul class="list-option-question">
                            <li>
                                <p class="pb-2"><span>A. </span>Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit.<i class="fa-solid fa-xmark  text-danger"></i></p>
                            </li>
                            <li>
                                <p class="pb-2"><span>A. </span>Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit.<i class="fa-solid fa-xmark  text-danger"></i></p>
                            </li>
                            <li>
                                <p class="pb-2"><span>A. </span>Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit.<i class="fa-solid fa-xmark  text-danger"></i></p>
                            </li>
                            <li>
                                <p class="pb-2"><span>A. </span>Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit.<i class="fa-solid fa-circle-check text-success"></i></p>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            $('.button-edit').on('click', function() {
                $('#editCategory').modal();
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    datatype: "JSON",
                    url: '/admin/QuizTest/' + id,
                    success: function(result) {
                        $('#setCategoryName').val(result['name']);
                        $('#setDescription').val(result['description']);
                        $('#setId').val(result['id']);
                    },
                });
            })


            // SHOW MODAL LIST QUESTION 
            $('#buttonDetailTestQuiz').on('click', function() {
                $('#modalDetailTestQuiz').modal();
                var name = $(this).data("name");
                $('.titleModalDetailTestQuiz').html(name);
                var id = $(this).data('id');
                var html = '';
                $.ajax({
                    type: "GET",
                    datatype: "JSON",
                    url: '/admin/QuestionByQuiz/' + id,
                    success: function(result) {
                        $.each(result, function(k, v) {
                                html +=        '<div class="question-item">';
                                html +=            '<div class="question-title">'.v.question.'</div>';
                            //     $html+=            '<ul class="list-option-question">';
                            //                     <li>
                            //                         <p class="pb-2"><span>A. </span>Lorem ipsum, dolor sit amet consectetur
                            //                             adipisicing elit.<i class="fa-solid fa-xmark  text-danger"></i></p>
                            //                     </li>
                            //                 </ul>
                            //                 <hr>
                            //             </div>
                        })
                    },
                });
            })
        })
    </script>
@endsection
