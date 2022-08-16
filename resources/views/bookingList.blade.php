@extends('layouts.standard')

@section('header')
    <h1>Buchungen</h1>
@endsection

@section('main')
    @empty($bookings)
        <p>Derzeit keine Buchungen verfügbar.</p>
    @else
        
        @foreach ($bookings as $booking)
            <div class="">
                <h2>Von {{ $booking->start_at->format('d.m.Y') }} bis {{ $booking->end_at->format('d.m.Y') }}</h2>
                <p>Kunde: {{ $booking->user->name }}</p>
                <p>Fahrzeug: {{ $booking->vehicle->registration }}</p>
                <p>
                    <a href="{{ route('bookings.show', [$booking->id])}}" class="btn btn-info">DETAILS</a>
                    <a href="{{ route('bookings.edit', [$booking->id])}}" class="btn btn-warning">EDIT</a>
                    <a href="{{ route('bookings.destroy', [$booking->id])}}" class="btn btn-danger deleteBtn" data-toggle="modal" data-target="#deleteModal">DELETE</a>
                </p>
            </div>
        @endforeach

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Buchung löschen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Die Buchung wirklich löschen?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form id="deleteForm" action="#" method="post">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-danger">Löschen</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

        @push('script')
            <script>
            $('.deleteBtn').click(function(event){
                event.preventDefault();
                $('#deleteForm').attr('action', $(this).attr('href'));
            })
            </script>
        @endpush    
        

    @endempty
@endsection