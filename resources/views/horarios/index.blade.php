@extends('layouts.app')

@section('title', 'Horários')
@section('head')
<link href='/fullcalendar-3.4.0/fullcalendar.min.css' rel='stylesheet' />
<link href='/fullcalendar-3.4.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='/fullcalendar-3.4.0/lib/moment.min.js'></script>
<script src='/fullcalendar-3.4.0/lib/jquery.min.js'></script>
<script src='/fullcalendar-3.4.0/fullcalendar.min.js'></script>
<script src='/fullcalendar-3.4.0/locale-all.js'></script>
<script>
$(document).ready(function() {
    var initialLocaleCode = 'pt-br';

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
        },
        //defaultDate: '2017-05-12',
        locale: initialLocaleCode,
        buttonIcons: false, // show the prev/next text
        weekNumbers: true,// don't show week numbers
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
                
        //columnFormat: 'dddd', // Display just full length of weekday, without dates 
        //defaultView: 'agendaWeek', // display week view
        //hiddenDays: [0,6], // hide Saturday and Sunday
         minTime: '07:00:00', // display from 16 to
         maxTime: '23:00:00', // 23 
         slotDuration: '00:15:00', // 15 minutes for each row
         allDaySlot: true, // don't show "all day" at the top
        
        events: 
            @php
                $eventos = [];
                foreach ($turma->horarios as $horario) {
                    //dd($horario->disciplina);
                    for ($i = 1; $i<=31; $i++) {
                        $dia = date('Y-m-'.str_pad($i, 2, '0', STR_PAD_LEFT));
                        if (date('w', strtotime($dia)) == $horario->grade->dia_semana) {
                            $eventos[] = [
                                'id' => $horario->disciplina->id,
                                'title' => $horario->disciplina->disciplina,
                                'start' => $dia.'T'.$horario->grade->inicio,
                                'end' => $dia.'T'.$horario->grade->fim,
                            ];
                        }
                    }
                }
            @endphp
            
            {!! json_encode($eventos) !!}
        
    });

});

</script>
<style>

	body {
		margin: 0;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}
	
	#calendar {
		max-width: 100%;
		margin: 40px auto;
		padding: 0 10px;
	}

</style>



	
    
@endsection
@section('content')
    <h1 class="text-center">@yield('title')</h1>
        <br>
	<div id='calendar'></div>

@endsection