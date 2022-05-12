@extends('main')
@section('content')
    <div class="main">
        <div class="grid wide">
            @include('breadcumb')
            @include('alert')
            <div class="quizzes">
                <div class="quizzes_search">
                    <div class="head">Please choose topic to start learn</div>
                    <div class="search--wrapper">
                        <input type="search" name="" id="" class="input_search" placeholder="Search">
                        <button type="button">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>

                    <button type="button" class="add mr-3"
                        style="float: right; color: var(--white);background-color: var(--orange); font-size: 25px; padding: 20px 50px;"
                        data-toggle="modal" data-target="#modalAddTopic">
                        Add topic
                    </button>

                    <a href="{{ route('admin.addCategory') }}" class="add mr-3"
                        style="float: right; color: var(--black);background-color: var(--green); font-size: 25px; padding: 20px 50px;">
                        Add category
                    </a>
                    <a href="/admin/add-quizcategory" class="add mr-3 "
                        style="float: right; color: var(--white);background-color: var(--blue); font-size: 25px; padding: 20px 50px;">
                        Add Quizz
                    </a>
                </div>

                @foreach ($listTopic as $item)
                    @if ($item['parent_id'] == 0)
                        <div class="quizzes_section">
                            <div class="quizzes_section_head">
                                {{ $item['name'] }}
                                <a href="#modalEditTopic" class="editTopicButton" data-id={{ $item['id'] }}
                                    data-whatever="{{ $item['name'] }}"><i class="fa-solid fa-pen"
                                        style="font-size:30px"></i></a>
                            </div>
                            <div class="row">
                                @foreach ($listTopic as $subItem)
                                    @if ($subItem['parent_id'] == $item['id'])
                                        <div class="c-4">
                                            <div class="quizzes_section_item ">
                                                <a onclick="return confirm('Are you sure?')"
                                                    href="category/{{ $subItem->id }}/delete"><i
                                                        class="fa-solid fa-trash delete"></i></a>
                                                <a href="listQuizTest/{{ $subItem->id }}">
                                                    <img src="/storage/images/category/{{ $subItem['thumb'] }}" alt=""
                                                        class="img">
                                                    <div class="text_head">{{ $subItem['name'] }}</div>
                                                </a>
                                                <div class="text_sub">
                                                    {{ $subItem['description'] }}
                                                </div>
                                                <div class="wrap">
                                                    <div class="lession">
                                                        {{ count($subItem->quizCategory) }} lession
                                                    </div>
                                                    <div class="edit">
                                                        Edit
                                                        <i class="fa-solid fa-pen"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal add topic -->
    <div class="modal fade" id="modalAddTopic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Topic</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/add-topic" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Enter topic name
                                </span>
                            </div>
                            <input type="text" class="form-control" name="nameTopic" required>
                        </div>
                        <div class="d-flex  justify-content-end">
                            <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal edit topic -->
    <div class="modal fade" id="modalEditTopic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/update-topic" method="POST">
                        @csrf
                        @method('put')
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Enter topic name
                                </span>
                            </div>
                            <input type="text" class="form-control" name="nameTopic" required>
                            <input type="hidden" class="form-control" name="idTopic" required>
                        </div>
                        <div class="d-flex  justify-content-end">
                            <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $('.editTopicButton').on('click', function() {
            $('#modalEditTopic').modal();
            var id = $(this).data('id');
            var name = $(this).data('whatever');
            $('input[name="nameTopic"]').val(name);
            $('input[name="idTopic"]').val(id);
            $('#modalEditTopic .modal-title').html('Edit Topic ' + name);
        })
    </script>
@endsection
