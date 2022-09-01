@extends('layouts.admin_layouts')

@section('title', 'Календарь');

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="sticky-top mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Перетаскиваемые события</h4>
                        </div>

                        <div class="card-body">
                        @foreach($events as $event)
                            <!-- the events -->
                            <div id="external-events">
                                <div class="external-event bg-success">{{ $event->event }}</div>
                            </div>
                            @endforeach
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Название заметки</h3>
                        </div>
                        <form action="{{ route('calendar.add') }}" method="get">
                                <div class="card-body">
                                    <div class="input-group">
                                        <input id="new-event" name="event" type="text" class="form-control" placeholder="Название ">
                                        <div class="input-group-append">
                                            <button id="add-new-event" type="submit" class="btn btn-primary">Добавить</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-body p-0">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<script>
window.onload = function (){

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'resourceTimelineWeek'
        });
        calendar.render();
    });
}
</script>
@endsection
