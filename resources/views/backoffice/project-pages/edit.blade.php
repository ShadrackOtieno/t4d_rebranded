@extends('backoffice.master')

@section('title', 'Update Project')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                UPDATE PROJECT PAGE
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
                                    <form action="{{route('backoffice.project-pages.update', $project)}}" method="post" id="course-form" enctype="multipart/form-data">
                                        

                                        @csrf
                                        @method('PUT')
                                        
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
                                                        <input type="text" name="title" class="form-control" placeholder="Project Title" value="{{ $project->title ?? ld('title') }}" id="Title">
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
                                                        <input type="text" name="client" class="form-control" placeholder="Client name" value="{{old('client')  ?? $project->client }}" id="client">
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
                                        
                                        <!-- Client's Name and Logo dispalay -->
                                        
                                        
                                        <div class="row clearfix" style="margin-bottom: 30px;">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="project_images">Client</label>
                                            </div>
                                            <div>
                                                <div class="p-3" style="display:flex;flex-wrap:wrap;" style="margin: 10px 0;">
                                                        {{-- @foreach($project->organisations AS $organisation) --}}
                                                            <div class='' style="position: relative; width:min-content; padding: 5px;border-radius:5px; margin: 10px;">
                                                                {{-- <div class='hidden' style="position:absolute; margin: 2px; width:15px; height:15px; border-radius:5px;">
                                                                    <input type='checkbox' name='photo[]' id='{{ "org".$loop->iteration }}' class='' style="width:5px; height:5px;" 
                                                                    value='{{ $organisation->photo }}' onchange="selectOrg(event)"/>
                                                                </div> --}}
                                                                <div for='' style="width:300px;height:300px;">
                                                                    <img class='w-full object-cover' src='{{ asset('images/client/'.$project->client_logo) ?? asset('images/user.webp') }}' 
                                                                    alt='picture' style="width:300px;height:300px;">
                                                                    <div class="fw-bold">
                                                                        {{ $project->client }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {{-- @endforeach --}}
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
                                                        <input type="number" name="budget" class="form-control" placeholder="" value="{{ old('budget') ?? $project->budget }}" id="Budget">
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
                                                        <input type="text" name="location" class="form-control" placeholder="" value="{{ old('location') ?? $project->location }}" id="Location">
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
                                                        <input type="text" name="region" class="form-control" placeholder="" value="{{ old('region') ?? $project->region}}" id="region">
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
                                                        <input type="text" name="sector" class="form-control" placeholder="" value="{{ old('sector') ?? $project->sector}}" id="Industrial Sector">
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
                                                        <input type="text" name="industry" class="form-control" placeholder="" value="{{ old('industry') ?? $project->industry }}" id="industry">
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
                                                        <input type="text" name="nature" class="form-control" placeholder="" value="{{ old('nature') ?? $project->nature }}" id="Type/ Nature of Project">
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
                                                        <div style="color: green;">
                                                            {{ $project->started_on }}
                                                        </div>
                                                        <div class="form-line">

                                                            @include('backoffice.partials.alerts.form_error', ['field' => 'Sdate'])

                                                            <input type="date" class="form-control" placeholder="Date start..." name="Sdate" value="{{ old('Sdate') ?? $project->started_on }}" >
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
                                                        <div style="color: green;">
                                                            {{ $project->ended_on }}
                                                        </div>
                                                        <div class="form-line">

                                                            @include('backoffice.partials.alerts.form_error', ['field' => 'Edate'])

                                                            <input type="date" class="form-control" placeholder="Date start..." name="Edate" value="{{ old('Edate') ?? $project->ended_on }}" >
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
                                                        <textarea name="excerpt" class="ckeditor" id="Excerpt">{{ old('excerpt') ?? $project->excerpt }}</textarea>                                                    </div>
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
                                                        <textarea name="description" class="ckeditor" id="Project Description">{{ old('description') ??$project->description }}</textarea>                                                    </div>
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
                                                        <input type="number" name="impact" class="form-control" id="Population Impact Excerpt" value="{{ old('impact') ?? $project->p_impacted }}"/>                                                    
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
                                                <div class="col-md-6 mb-2">
                                                    <img id="preview-image-before-upload" src="{{ asset('images/project/'.$project->image) ?? asset('images/user.webp') }}"
                                                        alt="{{ $project->image ?? 'Image not upload yet' }}" style="max-height: 250px;">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End -->

                                        <hr/>

                                        <div>
                                            <button type="submit" class="btn btn-success">
                                                UPDATE
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Gallery -->

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                      
                                        
                                        <div style="margin-bottom: 20px;">
                                            <h2 style="text-align: center;"><b>Photos taken during the project</b></h2>
                                        </div>
                                                                                
                                        <div class="row clearfix">
                                            <form action="{{route('backoffice.project-pages.gallery.update', $project)}}" method="post" id="course-form" enctype="multipart/form-data">
                                        
                                                @csrf
                                                @method('PUT')
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="project_images">Add more Photos</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
            
                                                            @include('backoffice.partials.alerts.form_error', ['field' => 'images'])
                                                            
                                                            <input name="images[]" type="file" id="project_images" multiple onchange='projectPics(event)'>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-success">
                                                            ADD
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>    
                                        @if($project->projectphotos()->exists() != null)                                  
                                        <div class="row clearfix" style="margin-top:20px;">
                                            <form action="{{route('backoffice.project-pages.gallery.destroy', $project)}}" method="post" 
                                            id="course-form" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="project_images">Photos</label>
                                                </div>
                                                <div>
                                                    <div class="p-1" style="display:flex;flex-wrap:wrap; margin: 10px 0;">
                                                        @if($project->projectphotos != null)
                                                            @foreach($project->projectphotos AS $photo)
                                                                <div class='' style="position: relative; width:max-content; padding: 2px; border-radius:5px; margin: 1px;">
                                                                    <div class='hidden' style="position:absolute; margin: 3px; width:15px; height:15px; border-radius:5px;">
                                                                        <input type='checkbox' name='images[]' id='{{ "pht".$loop->iteration }}' class='' style="width:5px; height:5px;
                                                                        border:1px solid rgb(1, 255, 136);" value='{{ $photo->name }}' onchange="selectOrg(event)"/>
                                                                    </div>
                                                                    <label for='{{ "pht".$loop->iteration }}' style="width:200px;height:200px;">
                                                                        <img class='w-full object-cover' src='{{ asset('images/project/'.$photo->name) ?? asset('images/user.webp') }}' 
                                                                        alt='picture' style="width:200px;height:200px;">
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div style="width: max-content; margin: 0 auto;">
                                                        <button onclick="return confirm('Are you sure to delete photo(s)?') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                            DELETE
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>

                        <!-- Organisation -->

                        <div class="body">
                            <div class="row clearfix" style="margin-top:20px;">
                                <div class="col-sm-12">
                                        <div style="margin-bottom: 20px;">
                                            <h2 style="text-align: center;"><b>Organisation Collaborated With:</b></h2>
                                        </div>
                                         
                                        <form action="{{route('backoffice.project-pages.collaborates.update', $project)}}" method="post" id="course-form" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
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
                                                </div>
                                            </div>
                                            <div style="width: max-content; margin: 0 auto;">
                                                <button type="submit" class="btn  btn-success">
                                                    ADD Organisation
                                                </button>
                                            </div>
                                        </form>
                                        <script>
                                            function selectOrg(e){
                                                var box = document.getElementById(e.target.id)

                                                if(box.parentElement.style.backgroundColor !== 'blue'){
                                                    box.parentElement.style.backgroundColor = 'blue'
                                                    box.parentElement.parentElement.style.opacity = '0.5'
                                                    box.parentElement.parentElement.style.border = '3px solid blue'
                                                }else{
                                                    box.parentElement.style.backgroundColor = ''
                                                    box.parentElement.parentElement.style.opacity = '1'
                                                    box.parentElement.parentElement.style.border = '0px solid blue'
                                                }
                                            }
                                        </script>

                                        @if($project->organisations()->exists())

                                        <div class="row clearfix" style="margin-top:20px;">
                                            <form action="{{route('backoffice.project-pages.collaborates.destroy', $project)}}" method="post" 
                                            id="course-form" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="project_images">Collaborates</label>
                                                </div>
                                                <div>
                                                    <div class="p-3" style="display:flex;flex-wrap:wrap;" style="margin: 10px 0;">
                                                            @foreach($project->organisations AS $organisation)
                                                                <div class='' style="position: relative; width:min-content; padding: 5px;border-radius:5px; margin: 10px;">
                                                                    <div class='hidden' style="position:absolute; margin: 2px; width:15px; height:15px; border-radius:5px;">
                                                                        <input type='checkbox' name='photo[]' id='{{ "org".$loop->iteration }}' class='' style="width:5px; height:5px;" 
                                                                        value='{{ $organisation->photo }}' onchange="selectOrg(event)"/>
                                                                    </div>
                                                                    <label for='{{ "org".$loop->iteration }}' style="width:200px;height:200px;">
                                                                        <img class='w-full object-cover' src='{{ asset('images/Orgainsation/'.$organisation->photo) ?? asset('images/user.webp') }}' 
                                                                        alt='picture' style="width:200px;height:200px;">
                                                                        <div>
                                                                            {{ $organisation->name }}
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                    </div>
                                                    <div style="width: max-content; margin: 0 auto;">
                                                        <button onclick="return confirm('Are you sure to delete the collaborate(s)?') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                            DELETE
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END#  -->
            {{--
            @include('backoffice/landing-pages/features')
            @include('backoffice/landing-pages/testimonials')
            --}}
        </div>
    </section>
@endsection
