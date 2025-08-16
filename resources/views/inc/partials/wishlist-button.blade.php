@php
    $wishlistSessionIds = (array) session('wishlist', []);
    $in = in_array($medicine->id, $wishlistSessionIds, true);
@endphp

<a href="#"
   class="wishlist-toggle {{ $in ? 'is-in' : '' }}"
   data-id="{{ $medicine->id }}"
   data-url="{{ route('wishlist.toggle', $medicine) }}"
   aria-pressed="{{ $in ? 'true' : 'false' }}">
    <i class="fa fa-plus-square"></i>
    <span class="label">{{ $in ? 'В избранном' : 'Add to wishlist' }}</span>
</a>
