@extends('layouts.custom')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h4>POSTS</h4>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Author</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Content</th>
                        <th class="px-4 py-2">Created At</th>
                        <th class="px-4 py-2">Updated At</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($posts->count()) 

                    @foreach($posts as $post)
                        <tr>
                            <td class="border px-4 py-2">{{$post->user->username}}</td>
                            <td class="border px-4 py-2">{{$post->title}}</td>
                            <td class="border px-4 py-2">{{$post->body}}</td>
                            <td class="border px-4 py-2">{{$post->created_at}}</td>
                            <td class="border px-4 py-2">{{$post->updated_at}}</td>
                            <td class="border px-4 py-2">
                                <a href="{{route('PostEdit', ['id' => $post->id])}}" class="text-blue-500">Edit</a>
                                <a href="{{route('PostDelete', ['id' => $post->id])}}" class="text-red-500">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                          <td colspan="5" class="border px-4 py-2">No posts found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <form action="{{route('CreatePost')}}" method="post">
        @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                     <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Title
                        </label>
                        <input value="{{ old('title') }}" name="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="text" placeholder="The Enigma">
                    </div>

                    @error('title')
                            <p class="text-red-500 text-xs italic">{{$message}}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Content
                        </label>
                        <textarea name="body" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" 
                        placeholder="Start typing..."></textarea>
                    </div>
                    @error('body')
                            <p class="text-red-500 text-xs italic">{{$message}}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <button class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Submit
                    </button>
                </div> </div>
    </form>
@endsection