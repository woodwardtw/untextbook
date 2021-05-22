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
	voiceButtons();
});


function showHomeModal(){
	if(document.querySelector('#home-page-wrapper')){
		if (document.cookie.indexOf('modal_shown=') >= 0) {
		 //do nothing if modal_shown cookie is present
		} else {
		  jQuery("#homeModal").modal()
		 document.cookie = 'modal_shown=seen'; //set cookie modal_shown cookie will expire when browser is closed 
		 }
	}
}

function voiceButtons(){
	if(document.querySelectorAll('.btn-voice')){
		let buttons = document.querySelectorAll('.btn-voice')
		buttons.forEach((button) => {
		  button.addEventListener('click', () => {
		    //console.log(button.dataset.voice)
		    voiceForms(button.dataset.voice)
		  });
		});
	}
}

function voiceForms(type){
	let form = document.getElementById(type+'-form');
	console.log(form)
	form.classList.toggle('hide')
	console.log('toggle')
	 jQuery("#" + type + "-form #acf-_post_title").focus();

}