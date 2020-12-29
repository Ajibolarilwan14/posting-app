@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 m-2 rounded-lg">
            {{-- Posts --}}
            @auth
                <form action="{{ route('posts') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="post something"></textarea>
                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>

                            @enderror
                            <div class="">
                                <button type="submit" class="bg-blue-500 text-white px-4 mt-2 py-2 rounded font-medium">Post</button>
                            </div>
                    </div>
                </form>
            @endauth
            @if (count($posts))
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                {{ $posts->links() }}
            @else
                <p>There are currently no posts!</p>
            @endif
        </div>
    </div>
@endsection