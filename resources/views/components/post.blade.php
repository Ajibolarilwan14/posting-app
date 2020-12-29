@props(['post' => $post])
<div class="mb-4">
                        <a href="{{ route('users.post', $post->user) }}" class="font-bold">{{ $post->user->username }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

                        <p class="mb-2"><a href="{{ route('post.show', $post) }}">{{ $post->body }}</a></p>
                            @can('delete', $post)
                            <form action="{{ route('posts.delete', $post) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">Delete</button> &nbsp;
                            </form>
                            @endcan
                        <div class="flex items-center">
                            @auth
                            @if (!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Like</button> &nbsp;
                                </form>
                            @else
                                <form action="{{ route('posts.likes', $post) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-blue-500">Unlike</button> &nbsp;
                                </form>
                            @endif
                            @endauth
                            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                        </div>
</div>