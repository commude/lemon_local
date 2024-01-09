/*window.onload = function () {*/
window.addEventListener('DOMContentLoaded', function() {
	
var suntoryCommonHd_submenu_btn = document.querySelector('#suntoryCommonHd_submenu_btn');
var suntoryCommonHd_submenu_btn_rect = suntoryCommonHd_submenu_btn.getBoundingClientRect();
var suntoryCommonHd_submenu_btn_position = suntoryCommonHd_submenu_btn_rect.top; 
function scroll_suntoryCommonHd_submenu_btn() {
  scrollTo(0, suntoryCommonHd_submenu_btn_position);
 }

	
	
 /*var bdy = document.getElementsByTagName("body");*/	
	
/*=== menu page open close ===*/	
/*open --gnavi menu-button click*/
document.querySelector("#suntoryCommonHd_submenu_btn").onclick = function() {

  	/*submenu status initialize*/
  	let suntoryCommonHd_submenu_list1_li = document.querySelectorAll('ul#suntoryCommonHd_submenu_list1 li');
	suntoryCommonHd_submenu_list1_li.forEach(function(element) {
  		element.classList.remove('suntoryCommonHd_submenu_sublist_opened');
  		element.classList.add('suntoryCommonHd_submenu_sublist_notopen');
	});
	let suntoryCommonHd_submenu_list1_li_ul = document.querySelectorAll('ul#suntoryCommonHd_submenu_list1 li ul.suntoryCommonHd_submenu_sublist');
	suntoryCommonHd_submenu_list1_li_ul.forEach(function(element) {
  		element.style.display = "none";
	});
	
  /* menu open   --be careful! suntoryCommonHd_02_wrap position status change   */
  document.querySelector("#suntoryCommonHd_02_wrap").style.position = "relative";
  document.querySelector("#suntoryCommonHd_02_overlay").style.display = "block";
  var wait_set_position = function(){
    document.querySelector("#suntoryCommonHd_02_wrap").style.position = "fixed";	
  }
  setTimeout(wait_set_position, 300);
	
  /*bdy[0].classList.add("modal_on");
  document.querySelector("#background_movie_container.sp_mainvisual").style.display = "none";*/
};
	
/*close --menu top close-button click*/
document.querySelector("#suntoryCommonHd_02_overlay #suntoryCommonHd_submenu_head .suntoryCommonHd_submenu_close").onclick = function() {
　scroll_suntoryCommonHd_submenu_btn();
  /*bdy[0].classList.remove("modal_on");
  document.querySelector("#background_movie_container.sp_mainvisual").style.display = "block";*/		
  document.querySelector("#suntoryCommonHd_02_overlay").style.display = "none";
	
};
	
/*close --menu bottom close-button click*/
document.querySelector("#suntoryCommonHd_02_overlay #suntoryCommonHd_submenu_foot_sp").onclick = function() {
  scroll_suntoryCommonHd_submenu_btn();
  /*bdy[0].classList.remove("modal_on");
  document.querySelector("#background_movie_container.sp_mainvisual").style.display = "block";*/	
  document.querySelector("#suntoryCommonHd_02_overlay").style.display = "none";
 
	
	
	
};
	

	
/*=== every menu open close ===*/		
/*open function*/	
function suntoryCommonHd_submenu_list1_open(parm) {
	document.getElementById("suntoryCommonHd_submenu_"+parm).className = "suntoryCommonHd_submenu_sublist_opened";
	document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_"+parm+" ul").style.display = "block";
}

/*close function*/	
function suntoryCommonHd_submenu_list1_close(parm) {
  document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_"+parm+" ul").style.display = "none";
  document.getElementById("suntoryCommonHd_submenu_"+parm).className = "suntoryCommonHd_submenu_sublist_notopen";
}

var wk;
/*products*/		
document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_products .suntoryCommonHd_submenu_list1_title").onclick = function() {
  wk = document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_products");
  if (wk.classList.contains("suntoryCommonHd_submenu_sublist_notopen")) {
	suntoryCommonHd_submenu_list1_open("products");  
  } else if (wk.classList.contains("suntoryCommonHd_submenu_sublist_opened")) {
	suntoryCommonHd_submenu_list1_close("products");  
  }
};

/*enjoy*/		
document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_enjoy .suntoryCommonHd_submenu_list1_title").onclick = function() {
  wk = document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_enjoy");
  if (wk.classList.contains("suntoryCommonHd_submenu_sublist_notopen")) {
	suntoryCommonHd_submenu_list1_open("enjoy");  
  } else if (wk.classList.contains("suntoryCommonHd_submenu_sublist_opened")) {
	suntoryCommonHd_submenu_list1_close("enjoy");  
  }
};

/*events*/		
document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_events .suntoryCommonHd_submenu_list1_title").onclick = function() {
  wk = document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_events");
  if (wk.classList.contains("suntoryCommonHd_submenu_sublist_notopen")) {
	suntoryCommonHd_submenu_list1_open("events");  
  } else if (wk.classList.contains("suntoryCommonHd_submenu_sublist_opened")) {
	suntoryCommonHd_submenu_list1_close("events");  
  }
};

/*recipe-gourmet*/		
document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_recipe-gourmet .suntoryCommonHd_submenu_list1_title").onclick = function() {
  wk = document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_recipe-gourmet");
  if (wk.classList.contains("suntoryCommonHd_submenu_sublist_notopen")) {
	suntoryCommonHd_submenu_list1_open("recipe-gourmet");  
  } else if (wk.classList.contains("suntoryCommonHd_submenu_sublist_opened")) {
	suntoryCommonHd_submenu_list1_close("recipe-gourmet");  
  }
};

/*eco*/		
document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_eco .suntoryCommonHd_submenu_list1_title").onclick = function() {
  wk = document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_eco");
  if (wk.classList.contains("suntoryCommonHd_submenu_sublist_notopen")) {
	suntoryCommonHd_submenu_list1_open("eco");  
  } else if (wk.classList.contains("suntoryCommonHd_submenu_sublist_opened")) {
	suntoryCommonHd_submenu_list1_close("eco");  
  }
};

/*culture-sports*/		
document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_culture-sports .suntoryCommonHd_submenu_list1_title").onclick = function() {
  wk = document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_culture-sports");
  if (wk.classList.contains("suntoryCommonHd_submenu_sublist_notopen")) {
	suntoryCommonHd_submenu_list1_open("culture-sports");  
  } else if (wk.classList.contains("suntoryCommonHd_submenu_sublist_opened")) {
	suntoryCommonHd_submenu_list1_close("culture-sports");  
  }
};
		
	
	

	
	
	
});