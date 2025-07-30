<nav class="py-2 px-8 bg-gray-700 flex justify-between items-center">
   
   <div class="flex items-center gap-4">
      <a href="/">
         {!! \App\Helpers\Icons::book(['class' => 'w-8 h-8 text-gray-300 hover:text-gray-200']) !!}
      </a>
      @if(request()->is('/'))
         <a href="{{route('single_course') }}" class="px-4 py-2 bg-gray-100 rounded">
            Courses
         </a>
      @endif
   </div>

   <div class="flex items-center gap-4">
      <a href="/">
         {!! \App\Helpers\Icons::moon(['class' => 'w-8 h-8 text-gray-300 hover:text-gray-200']) !!}
      </a>
      <img src="{{ asset('images/dp.jpg') }}" alt="user_pic" class="rounded-full">
   </div>




</nav>