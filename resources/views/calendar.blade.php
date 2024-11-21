@extends('layout.master')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center text-primary font-weight-bold">
            <i class="fas fa-map-marked-alt"></i>
            <span class="ml-2">Event Calendar</span>
        </h2>
        <div id="calendar"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" />

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '{{ route('events.get') }}', // Fetch events from the server
                editable: true, // Allow dragging/resizing
                selectable: true, // Allow date selection
                select: function (info) {
                    let title = prompt('Enter event title:');
                    if (title) {
                        fetch('{{ route('events.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                title: title,
                                start: info.startStr,
                                end: info.endStr
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                calendar.addEvent({
                                    id: data.event.id,
                                    title: data.event.title,
                                    start: data.event.start,
                                    end: data.event.end
                                });
                                alert('Event added successfully!');
                            } else {
                                alert(data.message);
                            }
                        });
                    }
                    calendar.unselect();
                },
                eventClick: function (info) {
                    if (confirm('Do you want to delete this event?')) {
                        fetch('{{ route('events.delete', ':id') }}'.replace(':id', info.event.id), {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                info.event.remove();
                                alert('Event deleted successfully!');
                            } else {
                                alert(data.message);
                            }
                        });
                    }
                },
                eventDrop: function (info) {
                    fetch('{{ route('events.update', ':id') }}'.replace(':id', info.event.id), {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            start: info.event.start.toISOString(),
                            end: info.event.end ? info.event.end.toISOString() : null
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status !== 'success') {
                            alert(data.message);
                        }
                    });
                }
            });

            calendar.render();
        });
    </script>
@endsection
kjhjkh
