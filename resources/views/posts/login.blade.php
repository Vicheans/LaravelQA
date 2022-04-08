@extends('layouts.custom')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <h4>LOGIN</h4>

            @if(session('status'))
                {{session('status')}}
            @endif

            <form action="{{route('PostLoginAction')}}" method="post">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                     <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Email
                        </label>
                        <input value="{{ old('email') }}" name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="email" placeholder="joe@email.com">
                    </div>

                    @error('email')
                            <p class="text-red-500 text-xs italic">{{$message}}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Password
                        </label>
                        <input name="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
                    </div>
                    @error('password')
                            <p class="text-red-500 text-xs italic">{{$message}}</p>
                    @enderror
                </div>

                <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Remember me
                        </label>
                <input type="checkbox" name="remember" id="remember">
            </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <button class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Login
                    </button>
                </div> </div>

            </form>
        </div>
    </div>
@endsection