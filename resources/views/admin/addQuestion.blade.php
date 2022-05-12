@extends('main')
@section('content')
    <div class="main">
        <div class="grid wide">
            <div class="add_question mt-0">
                <div class="container">
                    <div class="row">
                        @include('breadcumb')
                    </div>
                </div>
                <br>
                @include('alert')
                <div class="text_head text-center title-ani">{{ $cat->name }}</div>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-8 border-right">
                            <table id="tableQuestion" class="table" data-id={{ $cat->id }}>
                                <thead class="thead-dark">
                                    <tr style="font-size: 20px; text-align:center">
                                        <th scope="col">#</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="loadData">
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="text_head text-center" style="background: #343a40;color: white;font-size: 20px;">
                                Add question for {{ $cat->name }}
                            </div>
                            <form method="POST" id="formAddQuestion">
                                @csrf
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Input question</span>
                                    </div>
                                    <input type="hidden" id="quizcategory_id" name="quizcategory_id"
                                        value="{{ $cat->id }}">
                                    <textarea class="form-control" id="question" name="question" aria-label="With textarea" required></textarea>
                                </div>
                                <button style="width:100%;" type="submit" id="buttonAddQuestion"
                                    class="btn btn-secondary">Add
                                    Question</button>
                            </form>
                            <form method="POST" id="formAddOption" class="mt-3" style="display:none">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" id="idQuestion" name="idQuestion">
                                    <label class="mb-2" for="exampleFormControlInput1">Add option</label>
                                    <textarea class="form-control" id="option" name="option" aria-label="With textarea" required></textarea>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="isCorrect" name="isCorrect"
                                        value="1">
                                    <label class="form-check-label" for="isCorrect">If the answer is correct, please tick
                                        the box!</label>
                                </div>
                                <button style="width:100%;" type="submit" class="btn btn-secondary">Add Option</button>
                            </form>
                            <button style="width:100%; display:none;" type="submit" id="buttonNewQuestion"
                                class="btn btn-dark mt-3">Add New
                                Question</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="showQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #343a40;color:white;">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Illo
                        exercitationem
                        modi facere, quibusdam
                        quasi vel?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background: #e7e9eb">
                    <div class="reviewListQuestion">

                    </div>
                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            loadData();
        });
        $(document).on('click', '#buttonShowQuestion', function(e) {
            $('#showQuestion').modal();
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                datatype: "JSON",
                url: '/admin/get-option/' + id,
                success: function(result) {
                    var bullets = 'abcdefghijklmnopqrstuvwxyz'.toUpperCase().split('');
                    var html = "";
                    var count = 0;
                    $.each(result, function(k, v) {
                        html += '<p class="pb-2">';
                        html += `<span>${bullets[count]} </span>`;
                        html += `${v.value}`;
                        if (v.iscorrect == 0) {
                            html += '<i class="fa-solid fa-xmark  text-danger"></i>';
                        } else {
                            html += '<i class="fa-solid fa-circle-check text-success"></i>';
                        }
                        html += '</p>';
                        count++;
                    });
                    $('.reviewListQuestion').html(html);
                },
            })
        });

        function loadData() {
            var idCat = $('#tableQuestion').data('id');
            $.ajax({
                type: "GET",
                datatype: "JSON",
                url: '/admin/ListQuizTest/' + idCat,
                success: function(result) {
                    var html = '';
                    if (result != null) {
                        var num = 0;
                        $.each(result, function(k, v) {
                            num++;
                            html += '<tr style="font-size: 15px;">';
                            html += `<th scope="row">${num}</th>`;
                            html += `<td>${v.question}</td>`;
                            html +=
                                `<td style="text-align: center;"> <a href="#showQuestion" data-id="${v.id}" id="buttonShowQuestion" class="mr-3"><i class="fa-solid fa-eye"></i></a>`;
                            html += `<a data-id="1" href="#editCategory" class="button-edit mr-3"><i
                                         class="fa-solid fa-pen-to-square"></i></a>`;
                            html += `<a href="/admin/question/${v.id}/delete"
                                                        onclick="confirm('Are you sure?')"><i
                                                            class="fa-solid fa-trash-can"></i></a>`;
                            html += `</td>`;
                            html += `< /tr >`;

                        });
                    } else {
                        html += '<tr>';
                        html += '    <th colspan="3">No data</th>';
                        html += ' </tr>';
                    }
                    $('.loadData').html(html);

                },
            })

        }
    </script>
    <script>
        $('#formAddQuestion').on('submit', function(e) {
            e.preventDefault();
            var quizcategory_id = $('#quizcategory_id').val();
            var question = $('#question').val();
            $.ajax({
                type: "POST",
                datatype: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    question: question,
                    quizcategory_id: quizcategory_id
                },
                url: '/admin/add-question',
                success: function(result) {
                    if (result) {
                        $("#question").attr("disabled", "disabled");
                        $('#formAddOption').css('display', 'block');
                        $('#buttonAddQuestion').html('Add success.Please add options below!');
                        $('#buttonAddQuestion').removeClass('btn-secondary').addClass('btn-success');
                        $("#buttonAddQuestion").attr('disabled', true);
                        $("#idQuestion").val(result.id);
                        loadData();
                    }
                },
            });
        })
        $('#formAddOption').on('submit', function(e) {
            e.preventDefault();
            var idQuestion = $('#idQuestion').val();
            var option = $('#option').val();
            var isCorrect = $("#isCorrect").is(':checked') ? isCorrect = $("#isCorrect").val() : 0;
            $.ajax({
                type: "POST",
                datatype: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    idQuestion: idQuestion,
                    option: option,
                    isCorrect: isCorrect
                },
                url: '/admin/add-option',
                success: function(result) {
                    $('#option').val('');
                    $('#buttonNewQuestion').css('display', 'block');
                    if (result.iscorrect == 1) {
                        $("#isCorrect").prop('checked', false);
                        $("#isCorrect").attr('disabled', true);
                    }
                    $('#formAddQuestion').append("<p class='show-option option-" + result.iscorrect +
                        "'>" + result.value + "</p>");

                },
            });
        })
        $('#buttonNewQuestion').on('click', function() {
            $('#question').val('');
            $(".show-option").remove();
            $("#question").removeAttr('disabled');
            $('#formAddOption').css('display', 'none');
            $('#buttonAddQuestion').html('Add Question');
            $('#buttonAddQuestion').removeClass('btn-success').addClass('btn-secondary');
            $("#buttonAddQuestion").attr('disabled', false);
            $("#idQuestion").val('');
            $("#isCorrect").attr('disabled', false);
            $(this).css('display', 'none');
        })
    </script>
@endsection
