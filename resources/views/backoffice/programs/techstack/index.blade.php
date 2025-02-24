@extends('backoffice.master')

@section('title', 'Show Tech Stack ')

@section('css')
    <style>
        .details{
            display: none;
        }
        .tech{
            &:hover{
                .details{
                    display: block;
                }
            }
        }
    </style>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                @include('backoffice/partials/alerts/response_message')

                <div class="card">
                    <div class="header">
                        <h2>
                            Tech Stack page
                        </h2>
                    </div>

                    <div class="body">
                        <div class="">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                      
                                        
                                        <div style="margin-bottom: 20px;">
                                            <h2 style="text-align: center;"><b>Technology Stacks</b></h2>
                                        </div>
                                                                                
                                        <div class="row clearfix">
                                            <div>
                                                <p>
                                                    {{ session('error') }}
                                                </p>
                                            </div>
                                            <form action="{{ route('backoffice.programs.techStack.store') }}" method="post" id="course-form" enctype="multipart/form-data">
                                                @csrf
                                                @method('post')
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="project_images">Add more Tech</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="">
            
                                                            @include('backoffice.partials.alerts.form_error', ['field' => 'image'])
                                                            <label for="TechStack" class="" style="height: 20rem; width: 20rem; border: 2px dashed blue; display: flex; align-items:center;justify-content:center;cursor:pointer;" id="frame">
                                                                <div style="text-align: center;width: max-content;color:blue;">
                                                                    upload image
                                                                </div>
                                                            </label>
                                                            
                                                            <input name="image" type="file" id="TechStack" class="hidden" required title="Must upload an image" onchange='techStackPics(event)'>
                                                            
                                                            <div class="hidden form-line" id="title" style="width: 20rem;">
                                                                <label for="TechStackTitle">Enter the tech Stack name:</label><br> 
                                                                <input type="text" name="title" id="TechStackTitle" class="form-control" required title="Must set the tech stack title"  disabled/>
                                                            </div>
                                                            <div style="margin: 10px 0;">
                                                                <div style="width: 20rem;display: flex;justify-content: space-between;">
                                                                    <div id="clearF" class="btn btn-danger">
                                                                        clear
                                                                    </div>
                                                                    <div>
                                                                        <button type="submit" class="btn btn-success">
                                                                            ADD
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    "use strict";
                                                     
                                                    const box = document.querySelector('#frame')
                                                    const cleal = document.querySelector('#clearF')
                                                    const field = document.querySelector('#TechStack')
                                                    const tite = document.querySelector('#TechStackTitle')
                                                    
                                                    function techStackPics(e) {
                                                        box.innerHTML = "<img src='" + URL.createObjectURL(e.target.files[0]) +"' class='' style='width: 100%; height: 100%;'>"
                                                        displayTitle()
                                                    }

                                                    cleal.addEventListener('click', () => {
                                                        console.log('Fer')
                                                        field.value = ''
                                                        tite.value = ''
                                                        box.innerHTML = "<label for='TechStack' style='text-align: center;width: max-content;'>upload image</label>"
                                                        displayTitle()
                                                    })

                                                    function displayTitle() {
                                                        if(field.value !== "") {
                                                            tite.disabled = false
                                                            document.querySelector('#title').classList.remove('hidden')
                                                            box.style.border = "2px solid green"
                                                        }else{
                                                            tite.disabled = true
                                                            document.querySelector('#title').classList.remove('hidden')
                                                            document.querySelector('#title').classList.add('hidden')
                                                            box.style.border = "2px dashed"
                                                        }
                                                    }
                                                </script>
                                            </form>
                                        </div>
                                        <div class="row clearfix" style="margin-top:20px;">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="project_images">Tech Stacks</label>
                                                </div>
                                                <div id="contain"
                                                    hx-get="/techstack"
                                                    hx-trigger="load"
                                                    hx-target="#contain"
                                                    hx-swap="innerHTML"
                                                >
                                                </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# -->

    </div>
    
    <script src="{{ asset('js/htmx.min.js') }}"></script> 
</section>
@endsection