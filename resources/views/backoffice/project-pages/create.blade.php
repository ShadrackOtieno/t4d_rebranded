@extends('backoffice.master')

@section('title', 'Add Previous Projects')

@section('content')
    <section class="content">
        <div class="container-fluid">
        <script>
        function clientLogo(event){
            if(event.target.files){
                phile = event.target.files;
                const tempCache = document.getElementById('c_logo_purse')

                console.log(phile)
                
                //looping through the staged file for upload
                for(var i = 0;i < phile.length ;i++){
                    //we make sure the the container to hold the staged files
                    //to be already empty to prevent overdispalying of unwanted files
                    if(i == 0)tempCache.innerHTML = ""
                    ndiv = tempCache.appendChild(document.createElement('div'))
                    ndiv.style.width = "100px"
                    ndiv.style.margin = "2px"
                    indiv = ndiv.appendChild(document.createElement('img'))
                    indiv.src = URL.createObjectURL(phile[i])
                    indiv.setAttribute("width", "100px")
                    indiv.setAttribute("height", "100px")
                    //console.log(tempCache)
                }
            }
        }

        function projectPics(event){
            if(event.target.files){
                phile = event.target.files;
                const tempCache = document.getElementById('pic_purse')

                console.log(phile)
                
                //looping through the staged file for upload
                for(var i = 0;i < phile.length ;i++){
                    //we make sure the the container to hold the staged files
                    //to be already empty to prevent overdispalying of unwanted files
                    if(i == 0)tempCache.innerHTML = ""
                    ndiv = tempCache.appendChild(document.createElement('div'))
                    ndiv.style.width = "100px"
                    ndiv.style.margin = "2px"
                    indiv = ndiv.appendChild(document.createElement('img'))
                    indiv.src = URL.createObjectURL(phile[i])
                    indiv.setAttribute("width", "100px")
                    indiv.setAttribute("height", "100px")
                    //console.log(tempCache)
                }
            }
        }

        function organisationLogo(event){
            if(event.target.files){
                phile = event.target.files;
                const tempCache = document.getElementById('logo_purse')

                console.log(phile)

                //looping through the staged file for upload
                for(var i = 0;i < phile.length ;i++){
                    //we make sure the the container to hold the staged files
                    //to be already empty to prevent overdispalying of unwanted files
                    if(i == 0)tempCache.innerHTML = ""
                    ndiv = tempCache.appendChild(document.createElement('div'))
                    ndiv.style.width = "100px"
                    ndiv.style.margin = "2px"
                    indiv = ndiv.appendChild(document.createElement('img'))
                    indiv.src = URL.createObjectURL(phile[i])
                    indiv.setAttribute("width", "300px")
                    indiv.setAttribute("height", "300px")
                    //console.log(tempCache)
                }
            }
        }
        
        function projectCover(event){
            if(event.target.files){
                phile = event.target.files;
                const tempCache = document.getElementById('cover_purse')

                console.log(phile)

                //looping through the staged file for upload
                for(var i = 0;i < phile.length ;i++){
                    //we make sure the the container to hold the staged files
                    //to be already empty to prevent overdispalying of unwanted files
                    if(i == 0)tempCache.innerHTML = ""
                    ndiv = tempCache.appendChild(document.createElement('div'))
                    ndiv.style.width = "100px"
                    ndiv.style.margin = "2px"
                    indiv = ndiv.appendChild(document.createElement('img'))
                    indiv.src = URL.createObjectURL(phile[i])
                    indiv.setAttribute("width", "300px")
                    indiv.setAttribute("height", "300px")
                    //console.log(tempCache)
                }
            }
        }
    </script>
            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD NEW PROJECT
                            </h2>

                            <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                                <i class="material-icons" style="font-size: 11px;">
                                    arrow_back
                                </i>
                                Go back
                            </a>
                        </div>

                        @include('backoffice/partials/alerts/response_message')
                        
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <h4>Please fix below errors</h4>
                            <ul style="list-style: none">
                                @foreach ($errors->all() as $error)
                                    <li><strong>Oh Snap! </strong>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="{{route('backoffice.project-pages.store')}}" method="post" id="course-form" enctype="multipart/form-data">

                                        @csrf

                                        <div style="margin-bottom: 20px;">
                                            <h2 style="text-align: center;"><b>Project Details:</b></h2>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Title">Project Name</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'title'])
                                                        <input type="text" name="title" class="form-control" placeholder="Project Title" value="{{ old('title') }}" id="Title">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="client">Client Name</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'client'])
                                                        <input type="text" name="client" class="form-control" placeholder="Client name" value="{{ old('client') }}" id="client">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="c_logo">Client Logo</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'client_logo'])
                                                        
                                                        <input name="c_logo" type="file" id="c_logo" onchange="clientLogo(event)">
                                                    </div>
                                                </div>
                                                <div class="" style="">
                                                    <div class="" style="display:flex;flex-wrap:wrap;" id="c_logo_purse"></div>    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Budget">Cost of Project</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'budget'])
                                                        <input type="number" name="budget" class="form-control" placeholder="" value="{{ old('budget') }}" id="Budget">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Location">Country</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'location'])
                                                        <input type="text" name="location" class="form-control" placeholder="" value="{{ old('location') }}" id="Location">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="region">Region</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'region'])
                                                        <input type="text" name="region" class="form-control" placeholder="" value="{{ old('region') }}" id="region">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Industrial Sector">Sector</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'sector'])
                                                        <input type="text" name="sector" class="form-control" placeholder="" value="{{ old('sector') }}" id="Industrial Sector">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="industry">Industry</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'industry'])
                                                        <input type="text" name="industry" class="form-control" placeholder="" value="{{ old('industry') }}" id="industry">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Type/ Nature of Project">Type/ Nature of Project</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'nature'])
                                                        <input type="text" name="nature" class="form-control" placeholder="" value="{{ old('nature') }}" id="Type/ Nature of Project">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- dates when the project took place -->
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="sdate">Date the project Began</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <div class="form-line">

                                                            @include('backoffice.partials.alerts.form_error', ['field' => 'Sdate'])

                                                            <input type="date" class="form-control" placeholder="Date start..." name="Sdate" value="{{ old('Sdate') ?? null }}">
                                                        </div>           
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="edate">Ended On</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <div class="form-line">

                                                            @include('backoffice.partials.alerts.form_error', ['field' => 'Edate'])

                                                            <input type="date" class="form-control" placeholder="Date start..." name="Edate" value="{{ old('Edate') ?? null }}">
                                                        </div>           
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Excerpt">Excerpt</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'excerpt'])
                                                        <textarea name="excerpt" class="ckeditor" id="Excerpt">{{ old('excerpt') }}</textarea>                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Project Description">Project Scope</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'description'])
                                                        <textarea name="description" class="ckeditor" id="Project Description">{{ old('description') }}</textarea>                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Population Impact Excerpt">Population Impacted</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'impact'])
                                                        <input type="number" name="impact" class="form-control" id="Population Impact Excerpt" value="{{ old('impact') }}"/>                                                                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="project_image">Project Cover Photo</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'photo'])
                                                        
                                                        <input name="photo" type="file" id="project_image" onchange='projectCover(event)'>
                                                    </div>
                                                </div>
                                                <div class="" style="">
                                                    <div class="" style="display:flex;flex-wrap:wrap;" id="cover_purse"></div>    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End -->

                                        <hr/>

                                        <div style="margin-bottom: 20px;">
                                            <h2 style="text-align: center;"><b>Photos taken during the project</b></h2>
                                        </div>
                                                                                
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="project_images">Upload Photos of the Project</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'images'])
                                                        
                                                        <input name="images[]" type="file" id="project_images" multiple onchange='projectPics(event)'>
                                                    </div>
                                                </div>
                                                <div class="" style="">
                                                    <div class="" style="display:flex;flex-wrap:wrap;" id="pic_purse"></div>    
                                                </div>
                                            </div>
                                        </div>

                                        <hr/>

                                        <div style="margin-bottom: 20px;">
                                            <h2 style="text-align: center;"><b>Organisations Collaborated with:</b></h2>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="OrgName">Organisation Name</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'orgname'])
                                                        <input type="text" name="orgname" class="form-control" placeholder="organisation name" value="{{ old('orgname') }}" id="OrgName">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Logo">Organisation Logo</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'logo'])
                                                        
                                                        <input name="logo" type="file" id="Logo" onchange="organisationLogo(event)">
                                                    </div>
                                                </div>
                                                <div class="" style="">
                                                    <div class="" style="display:flex;flex-wrap:wrap;" id="logo_purse"></div>    
                                                </div>
                                            </div>
                                        </div>

                                        <hr/>

                                        <div>
                                            <button type="submit" class="btn btn-success">
                                                ADD
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END#  -->

        </div>
    </section>
@endsection
