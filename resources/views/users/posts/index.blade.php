@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1 capitalize">{{ $user->name }}</h1>
                <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and has received {{ $user->receivedLikes->count() }} likes.</p>
            </div>

            <div class="bg-white p-6 m-2 rounded-lg">
                @if (count($posts))
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                    @endforeach
                    {{ $posts->links() }}   
                @else
                    {{-- <p>There are currently no posts!</p> --}}
                    <p>{{ $user->name }} does not have any post yet!</p>
                @endif
            </div>
        </div>
    </div>
@endsection