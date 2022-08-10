@include('header')
<link rel="stylesheet" href="{{ url('css/form.css') }}">

@if ($errors->any())
<div class="message-content message-error">
<span class="closeMessage"></span>
    <p>{{$errors->first()}}</p>
</div>
@endif
<div class="form-container" >
    <form class="form-form" method="post" action="@if($edit) {{ url('/update/'.$user->id) }} @else {{ url('/create') }} @endif">
        @csrf
       
        <div class="form-dataset-wrapper">
            <input class="form-line" type="text" required="required" aria-required="true" @if($edit) value="{{$user->name}}" @endif min="3" max="45" name="name" placeholder="name">
        <span class="input-dataset-attr">
            Name
        </span>
        </div>

        <div class="form-dataset-wrapper">
            <input class="form-line" type="text" required="required" aria-required="true" @if($edit) value="{{$user->surname}}" @endif min="3" max="45" name="surname" placeholder="surname">
            <span class="input-dataset-attr">
                Surname
            </span>
        </div>
        
        <div class="form-dataset-wrapper">
            <input class="form-line" type="date" required="required" @if($edit) value="{{date('d/m/Y', strtotime($user->brith_date))}}" @endif aria-required="true" name="brith_date">
            <span class="input-dataset-attr">
                Brith date
            </span>
        </div>

        <div class="form-dataset-wrapper">
            <select class="form-line" name="male">
                <option @if($edit && $user->male == "M") selected @endif class="form-line" value="M">Men</option>
                <option @if($edit && $user->male == "W") selected @endif  class="form-line" value="W">Women</option>
            </select>
            <span class="input-dataset-attr">
                Male
            </span>
        </div>

        <div class="form-dataset-wrapper">
            <input class="form-line" type="tel" required="required" aria-required="true" @if($edit) value="{{$user->mobile}}" @endif min="2" max="255" name="tel" placeholder="phone">
            <span class="input-dataset-attr">
                Phone number
            </span>
        </div>

        <div class="form-dataset-wrapper">
            <select class="form-line" name="car">
            @foreach($cars as $car)
                <option @if($edit && $user->car == $car->id) selected @endif value="{{$car->id}}">{{$car->model.'/'.$car->color.'/'.$car->date_production.'/'.$car->seria}}</option>
            @endforeach
            </select>
            <span class="input-dataset-attr">
                Select Car
            </span>
        </div>

        <div class="form-dataset-wrapper">
            <select class="form-line" name="region">
            @foreach($regions as $region)
                <option @if($edit && $travel->region == $region->id) selected @endif value="{{$region->id}}">{{$region->value}}</option>
            @endforeach
            </select>
            <span class="input-dataset-attr">
                Select region
            </span>
        </div>

        <div class="form-dataset-wrapper">
            <input class="form-line" type="date" required="required" aria-required="true" name="travel_date">
            <span class="input-dataset-attr">
                Date of travel
            </span>
        </div>

        <div class="form-dataset-wrapper">
            <input class="form-line" type="number" required="required" aria-required="true" @if($edit) value="{{$travel->count_days}}" @endif min="1" max="25" name="count_days" placeholder="count of days">
            <span class="input-dataset-attr">
                Count of days
            </span>
        </div>

        <input type="submit" class="form-submit" align="center" name="is_submit">
    </form>
</div>
<script>
    const closeMessage = document.querySelector(".closeMessage");
    closeMessage.addEventListener("mousedown", ()=>{
        closeMessage.closest(".message-content").remove();
    });
</script>