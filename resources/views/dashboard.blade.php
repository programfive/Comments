

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('React To All Comments') }}
        </h2>
    </x-slot>

   <div class="max-w-7xl mx-auto my-10 ">
        <div class=" overflow-hidden  sm:rounded-lg">
            <div class="p-6 text-gray-900 bg-blue-500">
                <form action="{{ route('dashboard.store') }}" method="post" class="flex flex-col md:flex-row gap-5">
                    @csrf
                    <x-text-input id="body" name="body" type="text" class="mt-1 block w-full"   autocomplete="comment" />
                    <x-primary-button>{{ __('Comment') }}</x-primary-button>
                </form>
            </div>

                <div>
                    @foreach ($comments as $comment)
                        <div class="flex flex-col my-10 p-8 rounded-lg bg-white">
                            <p class="text-2xl capitalize font">{{$comment->body}}</p>
                            <div class="flex gap-2 items-center">
                                <strong class="text-sm">
                                    {{$comment->users->name}}
                                </strong>
                                <small class="text-xs">
                                    {{$comment->users->created_at->diffForHumans()}}
                                </small>   
                                <button class="text-sm text-blue-500 underline" onclick="toggleAnswers(this)">Show answers</button>
                            </div>
                
                            <div class="hidden" id="answer-section">
                                <p class="capitalize text-blue-500 my-2 text-xl">answers</p>
                                @foreach ($comment->answers as $answer)
                                    <div class="  items-center my-2 animate-fade-in">
                                        <p class="text-base">- {{$answer->body}}</p>
                                        <div>
                                            <strong class="text-sm font-bold">{{$answer->users->name}}</strong>
                                            <small class="text-xs">{{$answer->created_at->diffForHumans()}}</small>                                           
                                        </div>
                                     
                                    </div>
                                @endforeach
                                <form action="{{ route('answer.store',$comment->id) }}" method="post" >
                                    @csrf
                                    <x-text-input id="body" name="body" type="text" class=" block w-full max-w-4xl m-auto my-5" placeholder='Add Answer'  />      
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>   
            
        </div>
   </div>
   <script>
        function toggleAnswers(button) {
            const answerSection = button.parentNode.parentNode.querySelector('#answer-section');
            answerSection.classList.toggle('hidden');
            answerSection.classList.toggle('animate-fade-out');
        }
    </script>

</x-app-layout>



