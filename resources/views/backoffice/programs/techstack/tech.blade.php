
<div class="p-1" style="display:flex;flex-wrap:wrap; margin: 10px 0;">
    {{-- <form action="{{ route('backoffice.program.techstack.destory') }}"></form>EWorked --}}
    {{-- @if($project->projectphotos != null) --}}
        @forelse($techstacks AS $techstack)
            <div class='' style="width:max-content; padding: 2px; margin: 1px;">
                {{-- <div class='hidden' style="position:absolute; margin: 3px; width:15px; height:15px; border-radius:5px;">
                    <input type='checkbox' name='images[]' id='{{ "pht".$loop->iteration }}' class='' style="width:5px; height:5px;
                    border:1px solid rgb(1, 255, 136);" value='{{ $techstack->logo }}' onchange="selectOrg(event)"/>
                </div> --}}
                <div class="tech" for='{{ "pht".$loop->iteration }}' style="position: relative; width:200px; height:200px; border-radius:5px; overflow: hidden;">
                    <div style="z-index: 1;">
                        <img class='w-full object-cover' src='{{ asset('images/program/techstack/'.$techstack->logo) ?? asset('images/user.webp') }}' 
                    alt='picture' style="width:200px;height:200px;">
                    </div>
                    <div class="details" style="position: absolute; background-color: #000000bb;top: 0;height: 100%; width: 100%;display: flex; flex-direction: column; justify-content:center; align-items:center;">
                        <div style="border-radius: 5px;cursor: pointer;background-color: #a11e22;color: white;padding: 5px 10px; margin: 0px auto 10px auto ;width:max-content;"
                            hx-get="/delete-techstack"
                            hx-trigger="click"
                            hx-headers='{"Content-Type": "application/json"}'
                            hx-vals='{"id": {{ $techstack->id }} }'
                            hx-target="#contain"
                            hx-swap="innerHTML"
                        >
                            Delete
                        </div>
                        <div style="border-top: 1px gray solid; border-bottom: 1px gray solid;">
                            <div style="padding: 1px 10px;color:white;">
                                {{ $techstack->name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div>
                <p>No tech stack Uploaded yet</p>
            </div>
        @endforelse
    {{-- @endif --}}
</div>