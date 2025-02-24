<div class="max-w-sm rounded overflow-hidden shadow-lg bg-white mx-auto">
    <!-- Image Section -->
    <div class="h-48" style="">
        <a href="{{ route('course.show', $course->course->slug) }}" class="block w-full h-full">
            <img src="{{ $course->course->coverUrl($course->course->cover) }}" class="h-full w-full object-cover" alt="">
        </a>
    </div>

    <!-- Content Section -->
    <div class="p-4">
        <!-- Course Title -->
        <h5 class="text-xl font-bold text-[#00a651] mb-2">
            <a href="{{ route($course->type == 'course' ? 'course.show' : 'course.show', $course->course->slug) }}">
                {{ $course->course->name }}
            </a>
        </h5>

        <!-- Course Dates -->
        <p class="text-sm text-gray-600">
            <b>Dates:</b> {{ date('j M', strtotime($course->from)) }} &nbsp; - &nbsp; {{ date('j M', strtotime($course->to)) }} ({{ $course->duration }} {{ ngettext('day', 'days', $course->duration) }})
        </p>

        <!-- Location -->
        <p class="text-sm text-gray-600">
            <b>Location:</b> {{ "{$course->city->name}, {$course->city->venue->country}" }}
        </p>

        <!-- Fees -->
        <p class="text-sm text-gray-600">
            <b>Fees:</b>
            {{ ($kes = @$course->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '-' }}
            &vert;
            USD {{ number_format( @$course->currencies->firstWhere('code', 'USD')->pivot->amount ) }}
        </p>
    </div>
</div>
