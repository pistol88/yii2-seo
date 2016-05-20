if (typeof pistol88 == "undefined" || !pistol88) {
    var pistol88 = {};
}

pistol88.seo = {
    init: function () {
	$('.pistol88-seo .toggle').on('click', function() {
            $($(this).attr('href')).toggle();
            return false;
	});
    },
}

pistol88.seo.init();