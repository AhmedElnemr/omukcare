$(function(e){

	//________ Datepicker
	$( '.fc-datepicker').datepicker({
		dateFormat: "dd M yy",
		monthNamesShort: [ "Jan", "Feb", "Mar", "Apr", "Maj", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dec" ],
		zIndex: 999998,
	});
	
	//______Select2
	$('.select2').select2({
		minimumResultsForSearch: Infinity
	});


	//______P-scroll-task-in
	const ps11 = new PerfectScrollbar('.task-in', {
		useBothWheelAxes:true,
		suppressScrollX:true,
	});

	//______P-scroll- task-hold
	const ps12 = new PerfectScrollbar('.task-hold', {
		useBothWheelAxes:true,
		suppressScrollX:true,
	});

	//______P-scroll- task-on
	const ps13 = new PerfectScrollbar('.task-on', {
		useBothWheelAxes:true,
		suppressScrollX:true,
	});

	//______P-scroll- task-complete
	const ps14 = new PerfectScrollbar('.task-complete', {
		useBothWheelAxes:true,
		suppressScrollX:true,
	});
	

	

 });