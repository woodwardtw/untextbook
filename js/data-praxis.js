//full size the videos
window.addEventListener('load', function(event) {
    var videos = document.querySelectorAll('iframe[src^="https://www.youtube.com/"], iframe[src^="https://player.vimeo.com"], iframe[src^="https://www.youtube-nocookie.com/"], iframe[src^="https://www.nytimes.com/"]'); //get video iframes for regular youtube, privacy+ youtube, and vimeo

	videos.forEach(function(video) {
	   let wrapper = document.createElement('div'); //create wrapper 
	      wrapper.classList.add("video-responsive"); //give wrapper the class      
	      video.parentNode.insertBefore(wrapper, video); //insert wrapper      
	      wrapper.appendChild(video); // move video into wrapper
	});
	showHomeModal();
});


function showHomeModal(){
	if(document.querySelector('#home-page-wrapper')){
		if (document.cookie.indexOf('modal_shown=') >= 0) {
		 //do nothing if modal_shown cookie is present
		} else {
		  jQuery("#homeModal").modal()
		  document.cookie = 'modal_shown=seen'; //set cookie modal_shown
		  //cookie will expire when browser is closed 
		}
	}
}

