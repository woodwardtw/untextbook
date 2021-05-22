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
		    //console.log(button.dataset.tagid)
		    voiceForms(button.dataset.tagid)
		  });
		});
	}
}

function voiceForms(tagid){
	let form = document.getElementById('voice-form');
	//console.log(form)
	//form.classList.toggle('hide')
	 jQuery("#voice-form #acf-_post_title").focus();
	let tag = document.querySelectorAll("input[value='"+tagid+"']")[0];
	console.log(tag)
	tag.checked = true;
}


// function getTagValues(){
// 	//http://multisitetwo.local/untextbook/wp-json/wp/v2/tags?slug=rant,remix,recast,reflection
// 	var getUrl = window.location;
// 	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
	
// 	const tagData = baseUrl+'/wp-json/wp/v2/tags?slug=rant,remix,recast,reflection'
// 	fetch(tagData).then(function(response) {
// 	  const contentType = response.headers.get("content-type");
// 	  if (contentType && contentType.indexOf("application/json") !== -1) {
// 	    return response.json().then(function(json) {
// 	      // now that you've got the data let's do something with it per item
// 	      console.log(json)
// 	    });
// 	  } 
// 	});
// }

