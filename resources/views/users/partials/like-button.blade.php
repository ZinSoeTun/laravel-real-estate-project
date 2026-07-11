@if (Auth::check() && Auth::user()->role == 'user')
    @if ($houseData->liked_by_user)
        <form method="POST" action="{{ route('dislike', $houseData->id) }}" class="d-inline">
            @csrf
            <button type="submit" class="btn p-0 border-0 bg-transparent align-baseline">
                <i class='fas fa-heart text-danger fs-4'></i>
            </button>
        </form>
    @else
        <form method="POST" action="{{ route('like', $houseData->id) }}" class="d-inline">
            @csrf
            <button type="submit" class="btn p-0 border-0 bg-transparent align-baseline">
                <i class='far fa-heart fs-4'></i>
            </button>
        </form>
    @endif
@endif
