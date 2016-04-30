var stickySidebar = $('.sticky');

if (stickySidebar.length > 0) {
    var stickyHeight = stickySidebar.height(),
        sidebarTop = stickySidebar.offset().top;
}

// on scroll move the sidebar. Also update the css of the sidebar buttons to highlight which section you're in
$(window).scroll(function () {
	
    if (stickySidebar.length > 0) {
        var scrollTop = $(window).scrollTop();
		
		
		//Div positions
		var divTops = new Array();
		divTops[0] = $('#personDiv').position().top;
		divTops[1] = $('#langSkills').position().top;
		divTops[2] = $('#siteDiv').position().top;
		divTops[3] = $('#gitPanel').position().top;
		divTops[4] = $('#videoDiv').position().top;
		
		
		var index = -1; //Which div am I past? -1 represents the top of page
		for(var divInd = 0; divInd < 4; divInd++){
			if(scrollTop > divTops[divInd] && scrollTop < divTops[divInd+1]){
				index = divInd;
				break;
			}
			if(divInd == 3 && scrollTop > divTops[divInd+1]){
				index = 4;
			}
		}
		index += 1;
		
		
		
		//Get the appropriate button from nav sidebar and change its styling
		var buttonElements = $('.sticky .button');
		console.log(buttonElements.length);
		buttonElements.removeAttr("id");
		var button = buttonElements[index];
		$(".sticky .button:eq(" + index + ")").attr("id", "button2");
		
        if (sidebarTop < scrollTop) {
            stickySidebar.css('top', scrollTop - sidebarTop);

            // stop the sticky sidebar at the footer to avoid overlapping
            var sidebarBottom = stickySidebar.offset().top + stickyHeight,
                stickyStop = $('.mainContent').offset().top + $('.mainContent').height();
            if (stickyStop < sidebarBottom) {
                var stopPosition = $('.mainContent').height() - stickyHeight;
                stickySidebar.css('top', stopPosition);
            }
        }
        else {
            stickySidebar.css('top', '0');
        }
    }
});

$(window).resize(function () {
    if (stickySidebar.length > 0) {
        stickyHeight = stickySidebar.height();
    }
});