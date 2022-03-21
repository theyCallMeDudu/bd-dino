@if (Session::has('msg_sucesso'))
    <div class="bg-lime-200 rounded-lg py-2 px-2 text-center mb-5">
        <h3>{{ session('msg_sucesso') }}</h3>
    </div>
@endif

@if (Session::has('msg_aviso'))
    <div class="bg-yellow-200 rounded-lg py-2 px-2 text-center mb-5">
        <h3>{{ session('msg_aviso') }}</h3>
    </div>
@endif

@if (Session::has('msg_erro'))
    <div class="bg-red-200 rounded-lg py-2 px-2 text-center mb-5">
        <h3>{{ session('msg_erro') }}</h3>
    </div>
@endif
