<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            contentHeight: 500,
            locale: 'pt-br',
            plugins: ['interaction', 'dayGrid'],
            selectable: true,
            events: "<?php echo base_url(); ?>index.php/qg/calendario",
        });

        calendar.render();
    });
</script>
<div class="ui segment" style="margin: 1rem 0.5rem;">
	<div class="ui centered grid">
		<div style="width: 90%; margin: 2%;">
			<div id='calendar'></div>
		</div>
	</div>
</div>
