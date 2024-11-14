<div class="pagination" id="pagination">
    <div class="pagination-list">
        <div class="previous-page {{ !$users->previousPageUrl() ? 'disabled' : '' }}">
            <a href="{{ $users->previousPageUrl() }}" class="{{ !$users->previousPageUrl() ? 'disabled' : '' }}">
                <img src="{{ asset('img/arrow.png') }}">
            </a>
        </div>

        @php
            $start = max($users->currentPage() - 1, 1);
            $end = min($users->currentPage() + 1, $users->lastPage());
        @endphp

        @for ($page = $start; $page <= $end; $page++)
            <div class="page {{ $page == $users->currentPage() ? 'active' : '' }}">
                <a href="{{ $users->url($page) }}" class="{{ $page == $users->currentPage() ? 'active' : '' }}">
                    <span>{{ $page }}</span>
                </a>
            </div>
        @endfor

        <div class="next-page {{ !$users->nextPageUrl() ? 'disabled' : '' }}">
            <a href="{{ $users->nextPageUrl() }}" class="{{ !$users->nextPageUrl() ? 'disabled' : '' }}">
                <img src="{{ asset('img/arrow.png') }}">
            </a>
        </div>
    </div>
</div>
