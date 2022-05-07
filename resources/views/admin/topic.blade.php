@extends('main')
@section('content')
    <div class="main">
        <div class="grid wide">
            @include('breadcumb')
            <div class="quizzes">
                <div class="quizzes_search">
                    <div class="head">Please choose topic to start learn</div>
                    <div class="search--wrapper">
                        <input type="search" name="" id="" class="input_search" placeholder="Search">
                        <button type="button">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <div class="add"
                        style="float: right; color: var(--white);background-color: var(--red); font-size: 25px; padding: 20px 50px;">
                        Add topic
                    </div>
                </div>

                <div class="quizzes_section">
                    <div class="quizzes_section_head">
                        Grammar <i class="fa-solid fa-pen"></i>
                    </div>
                    <div class="row">
                        <div class="c-4">
                            <div class="quizzes_section_item ">
                                <i class="fa-solid fa-trash delete"></i>
                                <img src="./assets/img/rafiki.png" alt="" class="img">
                                <div class="text_head">English Ielts</div>
                                <div class="text_sub">
                                    Detailed explaination of a solution is provided to get
                                </div>
                                <div class="wrap">
                                    <div class="lession">
                                        30 lession
                                    </div>
                                    <div class="edit">
                                        Edit
                                        <i class="fa-solid fa-pen"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="quizzes_section">
                    <div class="quizzes_section_head">
                        Vocabulary <i class="fa-solid fa-pen"></i>
                    </div>
                    <div class="row">
                        <div class="c-4">
                            <div class="quizzes_section_item ">
                                <i class="fa-solid fa-trash delete"></i>
                                <img src="./assets/img/rafiki.png" alt="" class="img">
                                <div class="text_head">English Ielts</div>
                                <div class="text_sub">
                                    Detailed explaination of a solution is provided to get
                                </div>
                                <div class="wrap">
                                    <div class="lession">
                                        30 lession
                                    </div>
                                    <div class="edit">
                                        Edit
                                        <i class="fa-solid fa-pen"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="quizzes_section">
                    <div class="quizzes_section_head">
                        IELTS <i class="fa-solid fa-pen"></i>
                    </div>
                    <div class="row">

                        <div class="c-4">
                            <div class="quizzes_section_item ">
                                <i class="fa-solid fa-trash delete"></i>
                                <img src="./assets/img/rafiki.png" alt="" class="img">
                                <div class="text_head">English Ielts</div>
                                <div class="text_sub">
                                    Detailed explaination of a solution is provided to get
                                </div>
                                <div class="wrap">
                                    <div class="lession">
                                        30 lession
                                    </div>
                                    <div class="edit">
                                        Edit
                                        <i class="fa-solid fa-pen"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
