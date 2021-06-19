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
	hideDirections();
	jQuery(function () {
	  jQuery('[data-toggle="tooltip"]').tooltip()
	})
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
		    voiceForms(button.dataset.tagid, button.dataset.descid)
		  });
		});
	}
}

function voiceForms(tagid, descid){
	descid = parseInt(descid)+1;
	let form = document.getElementById('voice-form');
	let desc = document.getElementById('vd-'+descid);
	console.log(desc)
	console.log(form)
	let isHiddenForm = form.classList.contains('hide');
	let isDescriptionHidden = desc.classList.contains('hide');
	if(isDescriptionHidden && isHiddenForm){
		form.classList.toggle('hide');//hide/show form field
		desc.classList.toggle('hide');//hide/show lens description
		jQuery('html, body').animate({ scrollTop: jQuery("#acf-_post_title").offset().top-120 }, 500);
	} else {
		jQuery(".voice-description").addClass("hide")
		desc.classList.toggle('hide')
	}	
	jQuery("#voice-form #acf-_post_title").focus();//select form field for input
	let tag = document.querySelectorAll("input[value='"+tagid+"']")[0];//set tag for voice type
	tag.checked = true;
}


function hideDirections(){
	if(document.querySelectorAll('.hide-prompt')){
		let buttons = document.querySelectorAll('.hide-prompt')
		buttons.forEach((button) => {
		  button.addEventListener('click', () => {
		    button.parentNode.classList.toggle('small');
		    const current = button.innerHTML;
		    console.log(current)
		    if (current == 'Hide prompt') {
		    	button.innerHTML = '+'
		    } else {
		    	button.innerHTML = 'Hide prompt'
		    }
		  });
		});
	}
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

