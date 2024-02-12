@extends('management.layouts.master')
@section('title')
    Create Question
@endsection
@section('content')

    <?php
    $alphabets = [
        1=>'a',
        2=>'b',
        3=>'c',
        4=>'d',
        5=>'e',
        6=>'f'
    ]
    ?>
    <style>

        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }

        /*
        *
        * ==========================================
        * FOR DEMO PURPOSES
        * ==========================================
        *
        */
        body {
            min-height: 100vh;
            /*background-color: #757f9a;*/
            /*background-image: linear-gradient(147deg, #757f9a 0%, #d7dde8 100%);*/
        }

        /*
</style>
    <div class="container-fluid px-4">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title"> Create Question</h4>
                            </li>

                        </ul>
                    </div>
                </div>
                <form action="{{route('question.update',$question->id)}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card py-4">
                                <div class="header">
                                    <div class="row">
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Title </strong></label>
                                            <div class="form-line">
                                                <input type="text" id="erp_question_text"
                                                       class="form-control " name="title"
                                                       value="{{$question->title}}"
                                                       placeholder="Question Title" required>
                                            </div>
                                        </div>
                                        <div class=" col-12">
                                            <label for="email_address1"> <strong> Question Image </strong></label>
                                            <div class="col-md-6">
                                                <div class="main_container my-3">
                                                    <div class="main imagebox position-relative rounded-3 overflow-hidden">
                                                        <div class="select_img d-flex justify-content-center align-items-center">
                                                            <div class="dz-message p-3 text-center">
                                                                <div class="drag-icon-cph">
                                                                </div>
                                                                <h3>Click to upload.</h3>
                                                            </div>
                                                        </div>
                                                        <input type="file" name="question_image" accept=".jpg,.gif,.png,.webp"
                                                               class="main_file w-100 h-100 form-control position-absolute  opacity-0" />
                                                        <div class="img-thumb">
                                                            <img class="main_img d-block w-100 h-100 position-absolute" src="{{asset('images/question').'/'.$question->question_image}}" alt="">

                                                        </div>
                                                    </div>
                                                    {{--                                                            <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="card py-4">
                                <div class="header">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="multiimage">
                                                <div class="row wow-remove">
                                                    @foreach($options as $key=>$option)
                                                        <div class="col-4">
                                                            <div class="main_container my-3">
                                                                <div class="form-check form-check-radio">
                                                                    <label>
                                                                        <input name="last_correct_option" {{$option->correct_option == 1 ? 'checked' : ''}} type="checkbox" class="status custom-checkbox" value="{{$option->id}}">
                                                                        <span>Correct ({{$alphabets[$key+1]}}) </span>
                                                                    </label>
                                                                </div>
                                                                <div class="main imagebox position-relative rounded-3 overflow-hidden">
                                                                    <div class="select_img d-flex justify-content-center align-items-center">
                                                                        <div class="dz-message p-3 text-center">
                                                                            <div class="drag-icon-cph">
                                                                            </div>
                                                                            <h3>Click to upload.</h3>
                                                                        </div>
                                                                    </div>
                                                                    <input type="file" name="last_option_image[{{$option->id}}]" accept=".jpg,.gif,.png,.webp"
                                                                           class="main_file w-100 h-100 form-control position-absolute  opacity-0" />
                                                                    <div class="img-thumb">
                                                                        <img class="main_img d-block w-100 h-100 position-absolute" src="{{asset('images/options').'/'.$option->file}}" alt="">
                                                                    </div>
                                                                </div>
                                                                {{--                                                            <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>--}}
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    @for ($i = count($options); $i <= 5; $i++ )
                                                        <div class="col-4">
                                                            <div class="main_container my-3">
                                                                <div class="form-check form-check-radio">
                                                                    <label>
                                                                        <input  name="correct_option[{{$i+1}}]" type="checkbox" class="status custom-checkbox" value="1">
                                                                        <span>Correct ({{$alphabets[$i+1]}})</span>
                                                                    </label>
                                                                </div>
                                                                <div class="main imagebox position-relative rounded-3 overflow-hidden">
                                                                    <div class="select_img d-flex justify-content-center align-items-center">
                                                                        <div class="dz-message p-3 text-center">
                                                                            <div class="drag-icon-cph">
                                                                            </div>
                                                                            <h3>Click to upload.</h3>
                                                                        </div>
                                                                    </div>
                                                                    <input type="file" name="option_image[{{$i+1}}]" accept=".jpg,.gif,.png,.webp"
                                                                           class="main_file w-100 h-100 form-control position-absolute  opacity-0" />
                                                                    <div class="img-thumb">
                                                                    </div>
                                                                </div>
                                                                {{--                                                            <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>--}}
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">





                                <div class="header">
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary  my-2 float-right"> Submit   </button>
                                        </div>
                                    </div>
                                    <div class="row my-1">


                                        <div class=" col-12">
                                            <label for="email_address1">Category </label>
                                            <select class="form-control select2" name="category" id="Quiz-type" data-placeholder="Select">
                                                <option {{ $question->category == 'Sequence' ? 'Selected' : '' }}  value='Sequence'>Sequence</option>
                                                <option {{ $question->category == 'Vision' ? 'Selected' : '' }}  value='Vision'>Vision</option>
                                                <option {{ $question->category == 'Numeric' ? 'Selected' : '' }}  value='Numeric'>Numeric</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>







                <div class="d-none  cloner" style="display:none;">
                    <div class="row wow-remove">
                        <div class="col">
                            <div class="main_container m-3">
                                <div class="main imagebox position-relative rounded-3 overflow-hidden">
                                    <div class="select_img d-flex justify-content-center align-items-center">
                                        <div class="dz-message p-3 text-center">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons" style="font-size: 35px">touch_app</i>
                                            </div>
                                            <h3>Click to upload.</h3>

                                        </div>
                                    </div>
                                    <input type="file" name="image"
                                           class="main_file w-100 h-100 form-control position-absolute  opacity-0" />
                                    <div class="img-thumb">
                                    </div>
                                </div>
                                <a class="btn mt-3  fw-normal remove_clone border-0 shadow-none">Remove</a>
                                {{--                                <a class="btn mt-3  fw-normal add_clone border-0 shadow-none">Add More</a>--}}
                            </div>
                        </div>

                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        // Handle the click event for all checkboxes with class 'custom-checkbox'
                        $('.custom-checkbox').click(function() {
                            // If the clicked checkbox is checked, uncheck all other checkboxes
                            if ($(this).prop('checked')) {
                                $('.custom-checkbox').not(this).prop('checked', false);
                            }
                        });
                    });

                    $(document).ready(function () {
                        var maxField = 10; //Input fields increment limitation
                        var addButton = $('.add_clone'); //Add button selector
                        var wrapper = $('.team_main'); //Input field wrapper
                        var fieldHTML = jQuery('.cloner .row');
                        var fieldHTML2 = '<a href="javascript:void(0);" class="remove_button btn btn-dark mx-1">Cancel</a>';
                        var x = 1; //Initial field counter is 1

                        //Once add button is clicked
                        $(document).on('click','.add_clone',function () {
                            var wow = $(this);
                            //Check maximum number of input fields
                            if (x < maxField) {
                                x++;
                                $(wow).parents('.multiimage').append($(fieldHTML).clone());
                            }
                        });
                        //Once remove button is clicked
                        $(document).on('click', '.remove_clone', function (e) {

                            $(this).parents('.wow-remove').remove(); //Remove field html
                            if($(".multiimage .row").length == 0 ){
                                $('.multiimage').append($(fieldHTML).clone());

                            }

                        });
                    });

                </script>
                <script>

                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#imageResult')
                                    .attr('src', e.target.result);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    $(function () {
                        $('#upload').on('change', function () {
                            readURL(input);
                        });
                    });

                    /*  ==========================================
                        SHOW UPLOADED IMAGE NAME
                    * ========================================== */
                    var input = document.getElementById( 'upload' );
                    var infoArea = document.getElementById( 'upload-label' );

                    input.addEventListener( 'change', showFileName );
                    function showFileName( event ) {
                        var input = event.srcElement;
                        var fileName = input.files[0].name;
                        infoArea.textContent = 'File name: ' + fileName;
                    }





                </script>


@endsection

