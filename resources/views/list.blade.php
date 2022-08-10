@include('header')
<body>
    <link rel="stylesheet" href="{{ url('css/list.css') }}">
    <?php $users = json_decode($userList); ?>
    <div class="head-tab">
        <button class="btn btn-new" onclick="window.location.href='{{ url('/create') }}'">New user</button>
        @if($is)
        <form method="post" id="formSort">
            @csrf
            <input type="hidden" name="sort_value">
            <input type="hidden" name="is_submit" value="1">
        </form>
        <select class="selectSort">
            <option value="surname">Name</option>
            <option value="brith_date">Years old</option>
            <option value="male">Male</option>
            <option value="car">Model of car</option>
        </select>
        <input type="text" id="selectContact" placeholder="Search.." class="selectSort">
        @endif
    </div>
    @if($is)
    <div class='contacts'>
    @foreach($users as $user)
        <div class='contact-table'>
            <div class='qt-contact'>
                <div class="btn-list">
                    <p>{{$user->name}}</p>
                    <button type="button" class="btn update_contact" onclick="window.location.href='{{ url('/edit/'.$user->id) }}'" data-target="{{$user->id}}"><img src="{{ url('images/update.png') }}" alt="img-btn" class="btn_img"></button>
                    <button type="button" data-target="{{$user->id}}" class="btn is_delete_contact"><img src="{{ url('images/delete.png') }}" alt="img-btn" class="btn_img"></button>
                </div>
            </div>

            <ul class='qt-items' id='items_0'>
                <li class='qt-item'>
                    <span class='qt-item-variant'>Name: {{$user->name}}</span>
                </li>
                <li class='qt-item'>
                    <span class='qt-item-variant'>Old: {{$user->old}}</span>
                </li>
                <li class='qt-item'>
                    <span class='qt-item-variant'>Male: {{$user->male}}</span>
                </li>
                <?php $car = $user->car; ?>
                <li class='qt-item'>
                    <span class='qt-item-variant'>Model of car: {{$car->model}}</span>
                </li>
                <?php $travel = $user->travels[count($user->travels)-1]->get_region; ?>
                <li class='qt-item'>
                <span class='qt-item-variant'>Last travel: {{$travel->value}}</span>
                </li>
            </ul>
        </div>
    @endforeach
    </div>
    
    <form method="post" style="display:none" id="detele_content" class="profile-modal">
        @csrf
        <div class="pm-content">
            <span class="close_btn close-content_delete">x</span>
            <p>
                Are you sure you want to delete this contact?
                <button type="submit" class="btn delete_contact">YES</button>
            </p>
        </div>
    </form>
    @endif
</body>
@include('footer')
</html>