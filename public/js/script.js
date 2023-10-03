$('.ajax').click(function(e) {
	e.preventDefault();
	$.ajax({
		url: $(this).attr('href'),
		method: 'get',
		dataType: 'json',
		beforeSend: function(request) {
	        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
	    },
	    success: function(response) {
	    	console.log(response);
	    	getPage(response);
	    },
	});
});

$('.contents').click(function(e) {
	e.preventDefault();
	if(e.target.tagName != 'BUTTON' || !e.target.closest('.navigate')) return;

	$.ajax({
		url: $(e.target).attr('data-href'),
		method: 'get',
		dataType: 'json',
		beforeSend: function(request) {
	        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
	    },
	    success: function(response) {
	    	console.log(response);
	    	(response.show)?getPage(response):getPageFilm(response);
	    },
	});
});



function getPage (response) {
	const action = response.action;
	$('.contents').html(`<h1>${response.title}</h1>`);
	let ul = $('<ul><ul>');
	for(data of action.data ?? action) {
		ul.append(`<li><button class="btn btn-link navigate" data-href="/${response.show}/${data.id}">${data.title}</button></li>`);
	}
	$('.contents').append(ul);

	if(response.show !='genres') {
		$('.contents').append(`<div>
			<button class="btn btn-md btn-primary me-2 navigate ${!action.prev_page_url?'disabled':null}" data-href="${action.prev_page_url}">Previous</button>
			<button class="btn btn-md btn-primary me-2 navigate ${!action.next_page_url?'disabled':null}" data-href="${action.next_page_url}">Next</button>
		<div>`);
	}
}

function getPageFilm (response) {
	$('.contents').html(`<h1>${response.title}</h1>`);
	$('.contents').append(`<div><a class="me-3" href="/storage/${response.film.poster_url}">image</a> <span>${response.film.published_at}</span></div>`);
	let genres = $(`<div class="mt-3"></div>`);
	for(genre of response.film.list_genres) {
		genres.append(`<span class="me-2">${genre.title}</span>`);
	}
	$('.contents').append(genres);
}