<div class="alert alert-danger">
    <p class="special-box">{{ $msg }}</p>
</div>

@push('css')
    <link rel="stylesheet" href="/css/basic.css">
@endpush

@prepend('script')
    <script src="/js/basic.min.js"></script>
@endprepend