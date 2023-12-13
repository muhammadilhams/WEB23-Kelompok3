<x-layout>
    @include('partials._hero')
    @include('partials._search')
    {{-- Blade avoids php tags for variables --}}
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        {{-- Blade has directives,'@' for conditionals and loops, etc... --}}
        @if (count($listings) === 0)
            <p>No Listings Found</p>
        @endif

        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing" />
            {{-- <x-listing-card listing="afkdfasomscsasa" /> for passing values directly without using variables --}}
        @endforeach

    </div>
</x-layout>
